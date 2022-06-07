<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('inventory.update')}}">
                    @csrf

                        <!-- Hidden ID -->
                        <x-input type="hidden" id="id" name="id" value="{{$inventory->id}}"></x-input>

                    <!-- Item Name -->
                        <div>
                            <x-label for="item_name" :value="__(' Item Name')" />

                            <x-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" value="{{$inventory->item_name}}" required autofocus />
                        </div>

                        <!-- Buying date -->
                        <div class="mt-4">
                            <x-label for="buying_date" :value="__('Buying Date')" />

                            <x-input id="buying_date" class="block mt-1 w-full" type="date" name="buying_date" value="{{date('Y-m-d',strtotime($inventory->buying_date))}}" required />
                        </div>

                        <!--Quantity -->
                        <div class="mt-4">
                            <x-label for="quantity" :value="__('Quantity')" />

                            <x-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" value="{{$inventory->quantity}}" required autofocus />
                        </div>


                        <!-- Expiry date -->
                        <div class="mt-4">
                            <x-label for="expiry_date" :value="__('Expiry Date')" />

                            <x-input id="expiry_date" class="block mt-1 w-full" type="date" name="expiry_date" value="{{date('Y-m-d',strtotime($inventory->expiry_date))}}" required />
                        </div>

                        <!--Amount -->
                        <div class="mt-4">
                            <x-label for="amount" :value="__('Amount')" />

                            <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" value="{{$inventory->expense->amount}}" required autofocus />
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
</x-app-layout>
