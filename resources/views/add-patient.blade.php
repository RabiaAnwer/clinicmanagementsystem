<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mt-2">

                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <input type="hidden" name="role_id" value="3">
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <!--Care-Of -->
                            <div class="mt-4">
                                <x-label for="care_of" :value="__('Care-Of')" />

                                <x-input id="care_of" class="block mt-1 w-full" type="text" name="care_of" :value="old('care_of')" required autofocus />
                            </div>

                            <!--Age -->
                            <div class="mt-4">
                                <x-label for="age" :value="__('Age')" />

                                <x-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autofocus />
                            </div>

                            <!--Gender -->
                            <div class="mt-4">
                                <x-label for="gender" :value="__('Gender')" />

                                <select name="gender" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="age" type="text" name="age" required="required" autofocus="autofocus">
                                    <option selected hidden></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <!--Mobile Number -->
                            <div class="mt-4">
                                <x-label for="mobile_number" :value="__('Mobile Number')" />

                                <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" required autofocus />
                            </div>

                            <!--Address -->
                            <div class="mt-4">
                                <x-label for="address" :value="__('Address')" />

                                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
