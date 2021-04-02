<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.upload-file') }}">
                        @csrf

                        Submit file here!
                        <div class="mt-4">
                            <x-label for="file" :value="__('Submission')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" required />
                        </div>
                        <input id="type" type="hidden" name="type" value="submission" />

                        
                        <x-button class="mt-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
