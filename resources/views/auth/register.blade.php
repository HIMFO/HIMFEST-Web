<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Team Name -->
            <div>
                <x-label for="name" :value="__(' Team Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Team Leader's Full Name -->
            <div>
                <x-label for="leader_name" :value="__('Team Leader\'s Full Name')" />

                <x-input id="leader_name" class="block mt-1 w-full" type="text" name="leader_name" :value="old('leader_name')" required autofocus />
            </div>

            <!-- Team Leader's Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Team Leader\'s Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Referrer -->
            <div class="mt-4">
                <x-label for="referrer" :value="__('From Whom Did You Find Out About HIMFEST?')" />

                <x-select id="referrer" class="block mt-1 w-full" type="referrer" name="referrer" :value="old('referrer')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
