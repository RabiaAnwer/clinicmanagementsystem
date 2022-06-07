<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mt-2">

                        <form method="POST" action="{{ route('inventory.store') }}">
                        @csrf

                        <!-- Item Name -->
                            <div>
                                <x-label for="item_name" :value="__(' Item Name')" />

                                <x-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Buying date -->
                            <div class="mt-4">
                                <x-label for="buying_date" :value="__('Buying Date')" />

                                <x-input id="buying_date" class="block mt-1 w-full" type="date" name="buying_date" :value="old('buying_date')" required />
                            </div>

                            <!--Quantity -->
                            <div class="mt-4">
                                <x-label for="quantity" :value="__('Quantity')" />

                                <x-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required autofocus />
                            </div>


                            <!-- Expiry date -->
                            <div class="mt-4">
                                <x-label for="expiry_date" :value="__('Expiry Date')" />

                                <x-input id="expiry_date" class="block mt-1 w-full" type="date" name="expiry_date"  :value="old('expiry_date')" required />
                            </div>

                            <!--Amount -->
                            <div class="mt-4">
                                <x-label for="amount" :value="__('Amount')" />

                                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
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
