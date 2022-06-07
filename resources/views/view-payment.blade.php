<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Payments') }}
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
                                        <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-12 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Treatment
                                            </th>
                                            <th scope="col" class="text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Paid Amount
                                            </th>
                                            <th scope="col" class="text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Balance Amount
                                            </th>
                                            @if(auth()->user()->role->id == 1)
                                                <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            @endif
                                            @if(auth()->user()->role->id == 1)
                                                <th scope="col" class="px-3 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            @endif
                                        </tr>
                                        </thead>

                                        @foreach($payments as $payment)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{date('d-M-Y',strtotime($payment->date))}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$payment->treatment->user->name}}
                                                    </div>
                                                </td>
                                                <td class="px-8 py-4 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$payment->treatment->type->typeof}}
                                                    </div>
                                                </td>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-600">
                                                        {{$payment->paid}}
                                                    </div>
                                                </td>

                                                <td class="px-10 py-4 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-600">
                                                        {{$payment->balance}}
                                                    </div>
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-4 inline-flex text-sm leading-6 font-semibold rounded hover:bg-green-600 bg-green-500 text-white">
                                                        <a href="{{'/payment/'.$payment->id.'/edit'}}">Edit</a>
                                                    </span>
                                                    </td>
                                                @endif
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-4 inline-flex text-sm leading-6 font-semibold rounded hover:bg-red-600 bg-red-500 text-white">
                                                    <a href="{{route('payment.destroy',[$payment->id])}}" onclick="return confirm('Are you sure?')">Delete</a>
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
