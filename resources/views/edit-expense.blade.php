<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Expense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('expense.update')}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div>
                                <!-- Hidden ID -->
                                <x-input type="hidden" id="id" name="id" value="{{$expense->id}}"></x-input>
                                <!-- User ID -->
                                <div>
                                    <x-label for="user_name" class="text-lg font-semibold" :value="__('User Name')" />
                                    <x-input type="hidden" name="user_id" value="{{$expense->user != null ? $expense->user->id : ''}}"/>
                                    <x-input readonly id="user_name" class="block mt-1 w-full" type="text" name="user_name" value="{{$expense->user != null ? $expense->user->name : ''}}"/>
                                </div>

                                <!-- Inventory ID -->
                                <div class="mt-4">
                                    <x-label for="item_name" class="text-lg font-semibold" :value="__('Item Name')" />
                                    <x-input type="hidden" name="inventory_id" value="{{$expense->inventory != null ? $expense->inventory->id : ''}}"/>
                                    <x-input readonly id="item_name" class="block mt-1 w-full" type="text" name="item_name" value="{{$expense->inventory != null ? $expense->inventory->item_name : ''}}"/>
                                </div>

                                <!--Amount -->
                                <div class="mt-4">
                                    <x-label for="amount" class="text-lg font-semibold" :value="__('Amount')" />

                                    <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" value="{{$expense->amount}}" required autofocus />
                                </div>

                                <!-- Description -->
                                <div class="mt-4">
                                    <x-label for="description" class="text-lg font-semibold" :value="__('Description')" />

                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$expense->description}}" autofocus />
                                </div>
                            </div>
                            <div></div>
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
