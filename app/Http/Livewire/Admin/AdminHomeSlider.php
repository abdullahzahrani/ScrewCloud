<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSlider extends Component
{
    public function deleteSlide($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $slider->delete();

        return redirect('/admin/slider')->with('message', 'Slider Successfully Deleted.');
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        // dd($sliders);
        return view('livewire.admin.admin-home-slider', ['sliders' => $sliders]);
    }
}
