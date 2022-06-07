<x-guest-layout>
    {{--    <x-auth-card>--}}
    {{--        <x-slot name="logo">--}}
    {{--            --}}{{--            <a href="/">--}}
    {{--            --}}{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
    {{--            --}}{{--            </a>--}}
    {{--        </x-slot>--}}

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="w-screen h-screen grid grid-cols-2">
        <div class="flex justify-center items-center">
            <lottie-player class="h-10/12 w-10/12 px-4 py-4 flex justify-center items-center " src="https://assets9.lottiefiles.com/packages/lf20_iXKIMU.json"
                           background="transparent" speed=".5" loop autoplay>
            </lottie-player>
        </div>
        <div class="grid grid-cols-2 items-center">
            <div>
                <form method="POST" action="{{ route('register')}}">
                @csrf
                <!-- Name -->
                    <div>
{{--                        <x-label for="name" class="font-bold" :value="__('Name')" />--}}

                        <x-input id="name" class="block mt-1 w-full tracking-widest text-base" type="text" placeholder="Username" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
{{--                        <x-label for="email" class="font-bold" :value="__('Email')" />--}}

                        <x-input id="email" class="block mt-8 w-full tracking-widest text-base" placeholder="Email" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
{{--                        <x-label for="password" class="font-bold" :value="__('Password')" />--}}

                        <x-input id="password" class="block mt-8 w-full tracking-widest text-base" placeholder="Password"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
{{--                        <x-label for="password_confirmation" class="font-bold" :value="__('Confirm Password')" />--}}

                        <x-input id="password_confirmation" class="block mt-8 w-full tracking-widest text-base" placeholder="Confirm Password"
                                 type="password"
                                 name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a class="underline text-sm font-bold text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-guest-layout>
