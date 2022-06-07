<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('user.update')}}">
                        @csrf
                        <input id="id" type="hidden" name="id" value="{{auth()->user()->id}}"/>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="grid grid-rows-3 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{auth()->user()->name}}" required autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{auth()->user()->email}}" required />
                                </div>
                                <div>
                                    <x-label for="mobile_number" :value="__('Mobile Number')" />
                                    <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" value="{{auth()->user()->userDetail != null ? auth()->user()->userDetail->mobile_number : ''}}" required autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-3 gap-6">
                                <div>
                                    <x-label for="care_of" :value="__('Care-Of')" />
                                    <x-input id="care_of" class="block mt-1 w-full" type="text" name="care_of" value="{{auth()->user()->userDetail->care_of}}" required autofocus />
                                </div>
                                <div>
                                    <x-label for="age" :value="__('Age')" />
                                    <x-input id="age" class="block mt-1 w-full" type="text" name="age" value="{{auth()->user()->userDetail != null ? auth()->user()->userDetail->age : '' }}" required autofocus />
                                </div>
                                <div>
                                    <x-label for="user_type" :value="__('User Type')" />

                                    <select name="user_type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="user_type" type="text" name="user_type" required="required" autofocus="autofocus">
                                        <option {{ auth()->user()->role->role == 'Doctor' ? 'selected' :'' }} disabled>Doctor</option>
                                        <option {{ auth()->user()->role->role == 'Patient' ? 'selected' :'' }} disabled>Patient</option>
                                        <option {{ auth()->user()->role->role == 'Assistant' ? 'selected' :'' }} disabled>Assistant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-rows-3 gap-6">
                                <div>
                                    <x-label for="gender" :value="__('Gender')" />
                                    <select name="gender" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="age" type="text" name="age" required="required" autofocus="autofocus">
                                        <option {{auth()->user()->userDetail != null ? (auth()->user()->userDetail->gender == 'Male' ? 'selected': '') : ''}}>Male</option>
                                        <option {{auth()->user()->userDetail != null ? (auth()->user()->userDetail->gender == 'Female' ? 'selected': '') : ''}}>Female</option>
                                    </select>
                                </div>
                                <div>
                                    <x-label for="address" :value="__('Address')" />

                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{auth()->user()->userDetail != null ? auth()->user()->userDetail->address : ''}}" required autofocus />
                                </div>
                                <div>
                                    <x-label for="phone_number" :value="__('Phone Number')" />
                                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{auth()->user()->userDetail != null ? auth()->user()->userDetail->phone_number : ''}}" required autofocus />
                                </div>
                            </div>
                            <div></div>
                            <div></div>
                            <div class="flex items-end justify-end mt-4">
                                <x-button class="ml-3">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
