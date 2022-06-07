<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Expense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <form method="POST" action="{{ route('expense.store') }}">
                        @csrf

                        <!-- User ID -->
                            <div>
                                @if(auth()->user()->role->id == 2)
                                    <x-label for="user_id" :value="__('User ID')" />
                                    <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" value="{{auth()->user()->id}}" required readonly/>
                                @endif
                                @if(auth()->user()->role->id == 1)
                                    <select class="rounded-md shadow-sm border-gray-300  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="user_id" name="user_id" required autofocus>
                                        <option selected disabled>--Select User--</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <!--Amount -->
                            <div class="mt-4">
                                <x-label for="amount" :value="__('Amount')" />

                                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-label for="description" :value="__('Description')" />

                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
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
    @if(auth()->user()->role->id == 1)
        <script>
            $(document).ready(function(){
                $("#user_id").selectize();
            });
        </script>
    @endif
</x-app-layout>
