<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Patients') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-16 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 stripe" id="tab">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Mobile Number
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                User Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @if(auth()->user()->id == 1)
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @endif
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                            @if(auth()->user()->role->id == 1)
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            @endif
                                        </tr>
                                        </thead>

                                        <tbody class="text-center bg-white divide-y divide-gray-200">
                                        @foreach($user as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                    <div class="flex items-center">
                                                        <div class="text-base flex-shrink-0 h-10 w-10 py-2">
                                                            {{$user->id}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-base font-bold text-gray-500">
                                                        <a href="{{route('user.edit',[$user->id])}}">
                                                            {{$user !=null ? $user->name: ' '}}
                                                        </a>
                                                    </div>
                                                    <div class="text-base text-gray-500">
                                                        {{$user !=null ? $user->email: ' '}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-base whitespace-nowrap text-sm text-gray-500">
                                                    {{$user->userDetail != null ? $user->userDetail->mobile_number: ' '}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                                    {{$user->role->role}}
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-3 inline-flex text-s leading-6 font-semibold rounded bg-green-500 hover:bg-green-600 text-white">
                                                        <a href="{{'/treatment/'.$user->id}}">View Treatment</a>
                                                    </span>
                                                </td>
                                                @if(auth()->user()->id == 1)
                                                <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-3 inline-flex text-s leading-6 font-semibold rounded bg-green-500 hover:bg-green-600 text-white">
                                                        <a href="{{'/treatment/create/'.$user->id}}">Add Treatment</a>
                                                    </span>
                                                </td>
                                                @endif
                                                <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                    <span class="px-3 inline-flex text-s leading-6 font-semibold rounded bg-green-500 hover:bg-green-600 text-white">
                                                        <a href="{{'/payment/'.$user->id}}">View Payment</a>
                                                    </span>
                                                </td>
                                                @if(auth()->user()->role->id == 1)
                                                    <td class="px-2 py-2 whitespace-nowrap {{--text-right--}} text-sm font-medium">
                                                        <span class="px-3 inline-flex text-s leading-6 font-semibold rounded bg-red-500 hover:bg-red-600 text-white">
                                                            <a href="{{'/user/delete/'.$user->id}}" onclick="return confirm('Are you sure?')">Delete</a>
                                                        </span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('#tab').DataTable({
                language: {
                    searchPlaceholder: "Search",
                    search: "",
                }
            });
        })
    </script>
    <style>
        .dataTables_wrapper .dataTables_filter input{
            border-radius: 0.25rem;
            margin: 10px 10px 10px 10px;
            --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }
        .dataTables_wrapper .dataTables_length select{
            width: 4rem;
        }
        .text-left{
            text-align: center;
        }
    </style>
</x-app-layout>
