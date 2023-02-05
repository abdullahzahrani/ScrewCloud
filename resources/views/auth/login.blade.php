<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex flex-col" style="height: fit-content; width: 300px; border-radius: 5px; border: 1px solid lightgray; padding: 20px" >
            <form method="POST" action="{{ route('login') }}">
                <h1 class="" style="font-weight: 500; margin-bottom: 20px;" >Sign In</h1>
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" style="margin-bottom: 5px" />
                    <x-jet-input id="email" class="bg-white" type="email" name="email" :value="old('email')" required autofocus style="height: 30px; margin-bottom: 10px; width: 98%;" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" style="margin-bottom: 5px" />
                    <x-jet-input id="password" class="bg-white" type="password" name="password" required autocomplete="current-password" style="height: 30px; margin-bottom: 10px; width: 98%;" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="w-full" style="background: #f0c14b; border-radius: 2px; height: 30px; border: 1px solid; margin-top: 10px; border-color: #a88734 #9c7e31 #846a29  " >
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>

            <p style="margin-top: 15px; font-size: 12px; " >
                By signing-in your agree to the Screw Cloud FAKE CLONE Conditions of Use & Sale,
                Please see our Privacy Notice, our cookies Notice and our interest-Based Ads Notice.
            </p>

            <x-jet-button class="w-full border" style=" border-radius: 2px; height: 30px; border: 1px solid; margin-top: 10px; border: darkgray;  " >
                {{ __('Create your Screw Cloud Account') }}
            </x-jet-button>

        </div>
    </x-jet-authentication-card>
</x-guest-layout>
