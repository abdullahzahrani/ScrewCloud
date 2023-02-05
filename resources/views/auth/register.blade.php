<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="flex flex-col text-sm font-bold" style="height: fit-content; width: 350px; border-radius: 5px; border: 1px solid lightgray; padding: 20px" >
            <form method="POST" action="{{ route('register') }}">
                <h1 class="text-3xl font-bold" style=" margin-bottom: 20px;" >Create account</h1>
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Your name') }}" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Re-enter Password') }}" />
                    <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="">
                    <x-jet-button class="flex w-full p-2 mt-2 text-sm font-semibold border border-black" style=" background: #f0c14b;">
                        {{ __('Create your Screw Cloud Account') }}
                    </x-jet-button>

                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                       Already have an account?  {{ __('Sign-in') }}
                    </a>

                </div>
            </form>
            <p style="margin-top: 15px; font-size: 12px; " >
                By creating an account, you agree to Screw Cloud's Conditions of Use & Privacy Notice.
            </p>

        </div>
    </x-jet-authentication-card>
</x-guest-layout>
