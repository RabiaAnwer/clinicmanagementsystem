<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
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
                                            <th scope="col" class="px-12 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Treatment
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th scope="col" class="px-2 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Paid Amount
                                            </th>
                                            @if(auth()->user()->role->id == 1)
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            @endif
                                        </tr>
                                        </thead>
                                        @php $havePayments = false ; @endphp

                                        @foreach($payments  as $key => $payment)

                                            @php $havePayments = true;
                                            $decs = explode(',', $payment->treatment->description);
                                            @endphp

                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{date('d-M-Y',strtotime($payment->date))}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$payment->treatment->user->name}}
                                                    </div>
                                                </td>
                                                <td class="px-8 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$payment->treatment->type->typeof}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="text-base font-semibold text-gray-500">
                                                        {{$key < count($decs) ? $decs[$key] : ''}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <span class="px-3 inline-flex text-base leading-5 font-bold rounded-full bg-green-100 text-gray-600">
                                                        {{$payment->paid}}
                                                    </span>
                                                </td>
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-3 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-3 inline-flex text-sm leading-6 font-semibold rounded bg-red-500 text-white">
                                                    <a href="{{route('payment.destroy',[$payment->id])}}" onclick="return confirm('Are you sure?')">Delete</a>
                                                    </span>
                                                    </td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    @if(auth()->user()->role->id !=3)
                                    <hr class="mb-8">
                                    <form method="POST" action="{{ route('payment.store') }}" class="mt-12">
                                        @csrf
                                        <div class="flex justify-between px-4 mb-2 items-center">
                                            <div class="text-sm font-bold text-gray-900">
                                                Treatment Cost =
                                            </div>
                                            <div>
                                                <x-input id="treatment_cost" type="text" class="text-sm font-bold text-gray-900" name="treatment_cost" value="{{ $havePayments ? $payment->treatment->type->amount : 0}}" readonly/>
                                            </div>
                                            <input id="treatment_id" type="hidden" name="treatment_id" value="{{$havePayments ? $payment->treatment->id : 0}}" required/>
                                            <div class="text-sm font-bold text-gray-900">
                                                Total Paid =
                                            </div>
                                            <div>
                                                <x-input id="total_paid" type="text" name="total_paid" class="text-sm font-bold text-gray-900" value="{{$sum}}" readonly/>
                                            </div>
                                            <div class="text-sm font-bold text-gray-900">
                                                Amount to be Paid =
                                            </div>
                                            <div>
                                                <x-input id="amount_paid"  type="text" class="text-sm font-bold text-gray-900" name="amount_paid" :value="old('amount_paid')" />
                                            </div>
                                        </div>
                                        <div class="flex justify-between px-4 mb-2 items-center">
                                            <div class="flex justify-between ">
                                                <div class="flex justify-start items-center">
                                                    <div class="pr-16 text-sm font-bold text-gray-900">
                                                        Description =
                                                    </div>
                                                    <div class="pl-1">
                                                        <x-input id="description"  type="text" class="text-sm font-bold text-gray-900" name="description" :value="old('description')" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex justify-end items-center">
                                                    <div class="pr-10 text-sm font-bold text-gray-900 ">
                                                        Remaining Balance =
                                                    </div>
                                                    <div>
                                                        <x-input id="balance"  type="text" class="text-sm font-bold text-gray-900" name="balance" value="{{$sub}}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-4 flex justify-end">
                                            <x-button class="ml-4">
                                                {{ __('Save') }}
                                            </x-button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->role->id !=3)
    <script>
        $(document).ready(function () {
            $('#amount_paid').on('keyup',function () {
                var total = $('#treatment_cost').val() - $('#total_paid').val() - $(this).val();
                $('#balance').val(total);
            });
        })
    </script>
    @endif
</x-app-layout>
