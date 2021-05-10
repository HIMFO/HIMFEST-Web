<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-flash-message class="mb-4" :message="isset($message) ? $message : null" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


        </div>
    </div>
</x-app-layout>