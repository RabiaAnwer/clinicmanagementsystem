<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Treatment') }}
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
                                    <div>@if(session()->has('success'))
                                        <div class="alert alert-success bg-green-300">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                    @endif
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
{{--                                            <th scope="col" class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                                Treatment ID--}}
{{--                                            </th>--}}
                                            <th scope="col" class=" px-12 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Patient Name
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Treatment Name
                                            </th>
                                            <th scope="col" class="px-10 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @if(auth()->user()->id == 1)
                                            <th scope="col" class="px-5 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @endif
                                        </tr>
                                        </thead>

                                        @foreach($treatments as $treatment)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{date('d-M-Y',strtotime($treatment->treatment_date))}}
                                                    </div>
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                            {{$treatment->user->name}}
                                                    </div>
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$treatment->type->typeof}}
                                                    </div>
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-4 inline-flex text-base leading-6 font-semibold rounded bg-green-500 hover:bg-green-600 text-white">
                                                        <a href="{{route('payment.specific',[$treatment->id])}}">Show Payment</a>
                                                    </span>
                                                </td>
                                                @if(auth()->user()->id == 1)
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-4 inline-flex text-base leading-6 font-semibold rounded bg-red-500 hover:bg-red-600 text-white">
                                                        <a href="{{'/treatment/delete/'.$treatment->id}}" onclick="return confirm('Are you sure?')">Delete</a>
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
