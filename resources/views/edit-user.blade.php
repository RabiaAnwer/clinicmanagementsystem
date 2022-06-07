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

                    <form method="post" action="{{route('user.update')}}">
                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input type="hidden" name="id" value="{{$user->id}}"/>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
                                </div>
                            <div>
                                <x-label for="care_of" :value="__('Care-Of')" />
                                <x-input id="care_of" class="block mt-1 w-full" type="text" name="care_of" value="{{$user->userDetail != null ? $user->userDetail->care_of : ''}}" required autofocus />
                            </div>
                            <div>
                                <x-label for="age" :value="__('Age')" />
                                <x-input id="age" class="block mt-1 w-full" type="text" name="age" value="{{$user->userDetail != null ? $user->userDetail->age : ''}}" required autofocus />
                            </div>
                            <div>
                                <x-label for="gender" :value="__('Gender')" />
                                <select name="gender" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="age" type="text" name="age" required="required" autofocus="autofocus">
                                    <option {{ $user->userDetail != null ? ($user->userDetail->gender == 'Male' ? 'selected':'') : '' }}>Male</option>
                                    <option {{ $user->userDetail != null ? ($user->userDetail->gender == 'Female' ? 'selected':'') : '' }}>Female</option>
                                </select>
                            </div>
                            <div>
                                <x-label for="mobile_number" :value="__('Mobile Number')" />
                                <x-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" value="{{$user->userDetail != null ? $user->userDetail->mobile_number : ' '}}" required autofocus />
                            </div>
                            <div>
                                <x-label for="phone_number" :value="__('Phone Number')" />
                                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{$user->userDetail != null ? $user->userDetail->phone_number : ''}}" required autofocus />
                            </div>
                            <div>
                                <x-label for="address" :value="__('Address')" />

                                <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$user->userDetail != null ? $user->userDetail->address : ''}}" required autofocus />
                            </div>
                            <div>
                                <x-label for="role_id" :value="__('User Type')" />
                                <select name="role_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="role_id" type="text" required="required" autofocus="autofocus">
                                    <option {{ $user->role_id == 1 ? 'selected' : '' }} disabled>Doctor</option>
                                    <option {{ $user->role_id == 2 ? 'selected' : '' }} disabled>Assistant</option>
                                    <option {{ $user->role_id == 3 ? 'selected' : '' }} disabled>Patient</option>
                                </select>
                            </div>
                        </div>
                            <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
