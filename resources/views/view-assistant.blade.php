<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Assistants') }}
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
                                                Name
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Mobile Number
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                User Type
                                            </th>
                                            <th scope="col" class="px-2 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        @foreach($user as $user)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center text-base font-semibold text-gray-500">
                                                            {{$user->id}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-500">
                                                        <a href="{{'/user/edit/'.$user->id}}">
                                                            {{$user !=null ? $user->name: ' '}}
                                                        </a>
                                                    </div>
                                                    <div class="text-base text-gray-500">
                                                        {{$user !=null ? $user->email: ' '}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{$user->userDetail != null ? $user->userDetail->mobile_number: ' '}}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-base font-semibold text-gray-500">
                                                    {{$user->role->role}}
                                                </td>
                                                <td class="px-2 py-3 whitespace-nowrap">
                                                    <span class="px-3 inline-flex text-base leading-6 font-semibold rounded hover:bg-red-600 bg-red-500 text-white">
                                                        <a href="{{'/user/delete/'.$user->id}}" onclick="return confirm('Are you sure?')">Delete</a>
                                                    </span>
                                                </td>
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
