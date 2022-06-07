<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Treatment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4 mt-2">

                        <form method="post" action="{{route('treatment.store')}}">
                        @csrf

                        <!-- Treatment ID -->
                            <div>
                                <x-label for="user_id" :value="__('Patient Name')" />

                                <x-input type="hidden" name="user_id" value="{{$user->id}}"/>
                                <x-input readonly class="block mt-1 w-full" type="text" value="{{$user->name}}" required autofocus/>
                            </div>

                            <!-- Treatment Name -->
                            <div class="mt-4">
                                <x-label for="treatment_type" :value="__('Treatment Name')" />

                                <select name="typeof_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="treatment_type" type="text">
                                    <option value=" " selected hidden>Select Treatment</option>

                                    @foreach($treatment as $tr)
                                        <option id="opt" value="{{$tr->id}}">{{$tr->typeof}}</option>
                                    @endforeach
                                </select>
                                <div id="treatment">
                                    <!-- Total Cost -->
                                    <div class="mt-4">
                                        <x-label for="total_cost" :value="__('Total Cost')" />

                                        <x-input id="total_cost" class="block mt-1 w-full" type="number" name="total_cost" value="0" readonly/>
                                    </div>

                                    <!-- Paid -->
                                    <div class="mt-4">
                                        <x-label for="paid" :value="__('Paid')" />

                                        <x-input id="paid" class="block mt-1 w-full" type="number" name="paid" value="" />
                                    </div>

                                    <!-- Balance -->
                                    <div class="mt-4">
                                        <x-label for="balance" :value="__('Balance')" />

                                        <x-input id="balance" class="block mt-1 w-full" type="number" name="balance" value="0" readonly/>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-label for="description" :value="__('Description')" />

                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                            </div>

                            <div class="mt-4">
                                <x-button class="ml-4">
                                    {{ __('Add') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#treatment_type").change(function() {
                var token = $('meta[name="csrf-token"]').attr('content');
                // alert(token);
                if ($(this).val() != ' ') {
                    $.ajax({
                        type: "POST",
                        url: "/getTreatmentAmount",
                        data: {id: $(this).val()},
                        headers:{
                            'X-CSRF-TOKEN': token,
                        },
                        success: function (response) {
                            $('#total_cost').val(response);
                            $('#balance').val(response);
                        }
                    });
                    $('#treatment').show();
                    // alert($(this).val());
                } else {
                    $('#treatment').hide();
                }
            });
            $("#treatment_type").trigger("change");
            $("#paid").on("keyup", function () {
                var total = $("#total_cost").val() - $(this).val() ;
                $('#balance').val(total);
            });
        });
    </script>
</x-app-layout>
