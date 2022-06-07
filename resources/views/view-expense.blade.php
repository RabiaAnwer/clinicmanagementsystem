<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                User Name
                                            </th>
                                            <th scope="col" class="px- py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Inventory Name
                                            </th>
                                            <th scope="col" class="px-12 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Amount
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Description
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

                                        @foreach($expenses as $expense)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{$expense->user != null ?  $expense->user->name : ''}}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{$expense->inventory != null ? $expense->inventory->item_name: ''}}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{date('m-D-Y',strtotime($expense->date))}}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-600">
                                                        {{$expense->amount}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{$expense != null ? $expense->description: ''}}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-4 inline-flex text-s leading-6 rounded hover:bg-green-600 bg-green-500 text-white">
                                                    <a href="{{'/expense/edit/'.$expense->id}}">Edit</a>
                                                    </span>
                                                </td>

                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-4 inline-flex text-s leading-6 rounded hover:bg-red-600 bg-red-500 text-white">
                                                    <a href="{{'/expense/delete/'.$expense->id}}">Delete</a>
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
