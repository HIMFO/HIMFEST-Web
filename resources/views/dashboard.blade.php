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

                        <div class="flex items-center justify-start mt-3">
                            <x-button>
                                {{ __('Submit') }}                                
                            </x-button>

                            <a class="ml-3 underline text-sm text-blue-600 hover:text-gray-900" href="{{ route('dashboard.download-file') }}">
                                {{ __('Download File') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-row space-x-4">                
                <div class="mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    First Member (Team Leader)
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}" class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $team->members[0]->name)" required disabled="{{ $team->members[0]->verified }}" autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $team->members[0]->email)" required disabled="{{ $team->members[0]->verified }}" />
                        </div>
                        
                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid" :value="old('lineid', $team->members[0]->lineid ?? '')" required disabled="{{ $team->members[0]->verified }}" autofocus />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $team->members[0]->phone ?? '')" required disabled="{{ $team->members[0]->verified }}" autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" required disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <input id="type" type="hidden" name="type" value="submission" />
                        <x-input id='id' type="hidden" name='id' value='{{ $team->members[0]->id ?? null }}' /> 
                        <x-input id='type' type="hidden" name='type' value='student card' /> 
                        <x-button class="mt-4">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>

                <div class="mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    Second Member
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}" class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($team->members[1]) ? $team->members[1]->name : '')" required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : null }}" autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', isset($team->members[1]) ? $team->members[1]->email : '')" required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : null }}" />
                        </div>
                        
                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid" :value="old('lineid', isset($team->members[1]) ? $team->members[1]->lineid : '')" required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : null }}" autofocus />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', isset($team->members[1]) ? $team->members[1]->phone : '')" required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : null }}" autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : null }}" />
                        </div>

                        <input id="type" type="hidden" name="type" value="submission" />
                        <x-input id='id' type="hidden" name='id' value='{{ isset($team->members[1]) ? $team->members[1]->id : null }}' /> 
                        <x-input id='type' type="hidden" name='type' value='student card' /> 
                        <x-button class="mt-4">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>

                <div class="mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    Third Member
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}" class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($team->members[2]) ? $team->members[2]->name : '')" required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : null }}" autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', isset($team->members[2]) ? $team->members[2]->email : '')" required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : null }}" />
                        </div>
                        
                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid" :value="old('lineid', isset($team->members[2]) ? $team->members[2]->lineid : '')" required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : null }}" autofocus />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', isset($team->members[2]) ? $team->members[2]->phone : '')" required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : null }}" autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : null }}" />
                        </div>

                        <input id="type" type="hidden" name="type" value="submission" />
                        <x-input id='id' type="hidden" name='id' value='{{ isset($team->members[2]) ? $team->members[2]->id : null }}' /> 
                        <x-input id='type' type="hidden" name='type' value='student card' /> 
                        <x-button class="mt-4">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
