<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="gap-4 mt-2">
                        <div>
                            @if(session()->has('message'))
                                <div class="bg-red-500">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        <form method="post"  action="{{route('appointment.store')}}">
                            @csrf
                            <div class="grid grid-cols-3 gap-6 mt-4" >
                                <div>
                                    <x-label for="select_user"  :value="__('Select User')" />

                                    <select placeholder="Enter Patient Name" class="mt-1" id="userselection" name="userselection" >
                                        <option selected hidden></option>
                                        <option value="new">Create New User</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--Appointment Date -->
                                <div>
                                    <x-label for="appointment_date" :value="__('Appointment Date')" />

                                    <x-input id="appointment_date" class="block mt-1 w-full" type="date" name="appointment_date" :value="old('appointment_date')" required/>
                                </div>
                                <!--Appointment Type -->
                                <div>
                                    <x-label for="appointment_type"  :value="__('Appointment Type')" />

                                    <select name="appointment_type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="appointment_type" type="text" >
                                        <option selected hidden></option>
                                        <option value="Routine">Routine</option>
                                        <option value="Consult">Consult</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6 mt-6" id="newuser">
                                <div >
                                    <!-- Name -->
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>

                                </div>
                                <div>
                                    <!-- Email Address -->
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
                                </div>
                                <div>
                                    <x-label for="care_of" :value="__('Care-Of')" />
                                    <x-input id="care_of" class="block mt-1 w-full" type="text" name="care_of" :value="old('care_of')" required/>
                                </div>
                                <!-- Age -->
                                <div>
                                    <x-label for="age" :value="__('Age')" />
                                    <x-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required/>
                                </div>
                                <!--Mobile Number -->
                                <div>
                                    <x-label for="mobile_number" :value="__('Mobile Number')" />
                                    <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" required/>
                                </div>
                                <!-- Age -->
                                <div>
                                    <x-label for="address" :value="__('Address')" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                                </div>
                                <!-- Gender -->
                                <div>
                                    <x-label for="gender" :value="__('Gender')" />
                                    <select name="gender" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="gender" type="text" >
                                        <option selected hidden>-- Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button  class="ml-3" >
                                    {{ __('Set') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#userselection").change(function() {
                if ($(this).val() == "new") {
                    $('#newuser').show();
                    $('#newuser').children().each(function () {
                        $(this).children()[1].required = true;
                    });
                } else {
                    $('#newuser').hide();
                    $('#newuser').children().each(function () {
                        $(this).children()[1].required = false;
                    });
                }
            });
            $("#userselection").trigger("change");
            $("#userselection").selectize();
        });
    </script>
    <style>
        .selectize-input.items.not-full.has-options{

            --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            appearance: none;
            background-color: #fff;
            border-radius: 0.375rem;
            padding-top: 0.5rem;
            padding-right: 0.75rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5rem;

        }
    </style>
</x-app-layout>

