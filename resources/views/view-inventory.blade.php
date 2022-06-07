<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Inventory') }}
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
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Item Name
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Buying Date
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Expiry Date
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Quantity
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

                                        @foreach($inventory as $inventory)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$inventory->id}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-500">
                                                        {{$inventory->item_name}}
                                                    </div>
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full bg-green-100 text-gray-500">
                                                        {{date('d-M-Y',strtotime($inventory->buying_date))}}
                                                    </span>
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-base leading-5 font-semibold rounded-full bg-green-100 text-gray-500">
                                                        {{date('d-M-Y',strtotime($inventory->expiry_date))}}
                                                    </span>
                                                </td>
                                                <td class="px-10 py-3 whitespace-nowrap text-base font-bold text-gray-500">
                                                    {{$inventory->quantity}}
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-6 inline-flex text-base leading-6 font-semibold rounded hover:bg-green-600 bg-green-500 text-white">
                                                    <a href="{{'/inventory/'.$inventory->id.'/edit'}}">Edit</a>
                                                    </span>
                                                </td>
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-3 inline-flex text-base leading-6 font-semibold rounded hover:bg-red-600 bg-red-500 text-white">
                                                    <a href="{{'/inventory/delete/'.$inventory->id}}">Delete</a>
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
