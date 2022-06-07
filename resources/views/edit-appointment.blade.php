<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('appointment.update')}}">
                        @csrf
                        <!-- User ID -->
                        <div class="mt-4">
                            <x-label for="user_id" :value="__('Patient Name')" />

                            <input readonly id="user_id"  class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="user_id" value="{{$appointment->user->name}}" />
                        </div>
                            <input type="hidden" name="id" value="{{$appointment->id}}">

                        <!--Appointment Type -->
                        <div class="mt-4">
                            <x-label for="appointment_type" :value="__('Appointment Type')" />

                            <select name="appointment_type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="appointment_type" type="text">
{{--                                <option >Select Appointment Type</option>--}}
                                <option value="Chit-Chat" {{ $appointment->appointment_type == "Chit-Chat" ? 'selected' : ''  }}>Chit-Chat</option>
                                <option value="Checkup" {{ $appointment->appointment_type == "Checkup" ? 'selected' : ''  }}>Checkup</option>
                            </select>
                        </div>

                        <!--Appointment Date -->
                        <div class="mt-4">
                            <x-label for="appointment_date" :value="__('Appointment Date')" />

                            <x-input id="appointment_date" class="block mt-1 w-full" type="date" name="appointment_date" value="{{date('Y-m-d',strtotime($appointment->appointment_date))}}" />
                        </div>
                        <div class="mt-4">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Set') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
