<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe as FacadesStripe;
use Exception;
// use Cartalyst\Stripe\Stripe as Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

// use Stripe;

class CheckoutComponent extends Component
{
    // Billing Address
    public $firstname;

    public $lastname;

    public $email;

    public $mobile;

    public $line1;

    public $line2;

    public $province;

    public $city;

    public $zipcode;

    public $paymentmode;

    public $thankyou;

    public $card_no;

    public $exp_month;

    public $exp_year;

    public $cvc;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'province' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if ($this->paymentmode == 'card') {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'province' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if ($this->paymentmode == 'card') {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->province = $this->province;
        $order->city = $this->city;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
            $this->resetCart();
        } elseif ($this->paymentmode == 'card') {
            $stripe = FacadesStripe::make(env('STRIPE_SECRET'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc,
                    ],
                ]);

                if (! isset($token['id'])) {
                    session()->flash('stripe_error', 'The Stripe Token was not generated correctly');
                    $this->thankyou = false;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->firstname.' '.$this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                    ],
                    'source' => $token['id'],
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => Session::get('checkout')['total'],
                    'description' => 'Order no #'.$order->id,
                ]);

                if ($charge['status'] == 'succeeded') {
                    $transaction = new Transaction();
                    $transaction->user_id = Auth::user()->id;
                    $transaction->order_id = $order->id;
                    $transaction->mode = 'card';
                    $transaction->status = 'approved';
                    $transaction->save();
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Error in payment');
                    $this->thankyou = false;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = false;
            }
        }
    }

    public function resetCart()
    {
        $this->thankyou = true;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        } elseif (! session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();

        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
