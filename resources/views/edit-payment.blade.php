<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form method="POST" action="{{route('payment.update')}}">
                    @csrf
                    <!-- ID -->
                            <x-input type="hidden" name="id" value="{{$payment->id}}" />
                        <!--Paid -->
                        <div class="mt-4">
                            <x-label for="paid" :value="__('Paid')" />
{{--                            <x-input id="remaining" type="text" value="{{$payment->paid}}"/>--}}
                            <x-input id="paid" class="block mt-1 w-full" type="text" name="paid" value="{{$payment->paid}}" required autofocus />
                        </div>

                        <!--Balance -->
                        <div class="mt-4">
                            <x-label for="balance" :value="__('Balance')" />

                            <x-input id="balance" class="block mt-1 w-full" type="text" name="balance" value="{{$payment->balance}}" required autofocus />
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
