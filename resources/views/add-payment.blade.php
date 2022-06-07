<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mt-2">

                        <form method="POST" action="{{ route('payment.store') }}">
                        @csrf

                        <!-- Treatment ID -->
                            <x-input id="treatment_id" class="block mt-1 w-full" type="hidden" name="treatment_id" value="{{$treatment->id}}" required/>

                            <!-- Paid -->
                            <div class="mt-4">
                                <x-label for="paid" :value="__('Paid')" />

                                <x-input id="paid" class="block mt-1 w-full" type="text" name="paid" :value="old('paid')" />
                            </div>

                            <!-- Balance -->
                            <div class="mt-4">
                                <x-label for="balance" :value="__('Balance')" />

                                <x-input id="balance" class="block mt-1 w-full" type="text" name="balance" :value="old('balance')" />
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
