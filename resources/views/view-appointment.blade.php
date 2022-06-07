<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Appointments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Booking Date
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Appointment Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Appointment Date
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @if(auth()->user()->role->id == 1)
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @endif
                                        </tr>
                                        </thead>
                                        @foreach($appointments as $appointment)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$appointment->id}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-600">
                                                        {{$appointment->user->name}}
                                                    </div>
                                                </td>
                                                <td class="px-8 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{date('d-M-Y',strtotime($appointment->booking_date))}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <span class="px-12 inline-flex text-base leading-5 font-bold rounded-full bg-green-100 text-gray-600">
                                                        {{$appointment->appointment_type}}
                                                    </span>
                                                </td>
                                                <td class="px-12 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{date('d-M-Y',strtotime($appointment->appointment_date))}}
                                                </td>
                                                    <td class="px-4 py-3 whitespace-nowrap  text-sm font-medium">
                                                     <span class="px-4 inline-flex text-s leading-6 font-semibold rounded hover:bg-green-600 bg-green-500 text-white">
                                                    <a href="{{'/appointment/'.$appointment->id.'/edit'}}">Edit</a>
                                                     </span>
                                                </td>
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-4 py-3 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                     <span class="px-3 inline-flex text-s leading-6 font-semibold rounded hover:bg-red-600 bg-red-500 text-white">
                                                    <a href="{{'/appointment/delete/'.$appointment->id}}">Delete</a>
                                                     </span>
                                                    </td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

