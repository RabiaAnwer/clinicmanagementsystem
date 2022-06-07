<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-center text-2xl text-gray-600 leading-tight tracking-widest">
            {{$role == 'Doctor' ? __('-- Doctor Dashboard --') : ''}} {{$role == 'Assistant' ? __('-- Assitant Dashboard --') :''}} {{$role == 'Patient' ? __('-- Patient Dashboard --') : ''}}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto px-8">
        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_9wj3pxax.json"
                       mode="bounce" background="transparent" speed=".7" loop  autoplay>
        </lottie-player>
    </div>

    <div class="px-12 bg-white grid place-items-stretch grid gap-4 {{($role == 'Doctor') ? 'grid-cols-5' : ''}} {{($role == 'Assistant') ? 'grid-cols-4' : ''}} {{($role == 'Patient') ? 'grid-cols-3' : ''}}">
        @if(isset($patients))
            <div class="transition duration-500 ease-in-out transform hover:-translate-y-8 hover:scale-100">
                <div class=" bg-gray-100 rounded overflow-hidden shadow-lg">
                    <a href="{{route('patient.view')}}">
                    <div class="text-center px-6 py-4 font-semibold text-2xl text-gray-700">
                        Total Patients
                    </div>
                    <div class="text-center mt-8 mb-6 font-semibold text-2xl text-gray-700">
                        {{$patients}}
                    </div>
                    </a>
                </div>
            </div>
        @endif

        @if(isset($total_treatments))
            <div class="transition duration-500 ease-in-out transform hover:-translate-y-8 hover:scale-100">
                <div class="bg-gray-100 rounded overflow-hidden shadow-lg">
                    <div class="text-center px-6 py-4 font-semibold text-2xl mb-2 text-gray-700">
                        Total Treatments
                    </div>
                    <div class="text-center mt-8 mb-6 font-semibold text-2xl mb-2 text-gray-700">
                        {{$total_treatments}}
                    </div>
                </div>
            </div>
        @endif

        <div class="transition duration-500 ease-in-out transform hover:-translate-y-8 hover:scale-100">
            <div class=" bg-gray-100  rounded overflow-hidden shadow-lg">
                <div class="text-center px-6 py-4 font-semibold text-2xl mb-2 text-gray-700">
                    Total Amount Paid
                </div>
                <div class="text-center mt-8 mb-6 font-semibold text-2xl mb-2 text-gray-700">
                    {{$paid}}
                </div>
            </div>
        </div>

        <div class="transition duration-500 ease-in-out transform hover:-translate-y-8 hover:scale-100">
            <div class=" bg-gray-100  rounded overflow-hidden shadow-lg">
                <div class="text-center px-6 py-4 font-semibold text-2xl mb-2 text-gray-700">
                    Remaining Amount
                </div>
                <div class="text-center mt-8 mb-6 font-semibold text-2xl mb-2 text-gray-700">
                    {{$balance}}
                </div>
            </div>
        </div>

        @if(isset($exp))
            <div class="transition duration-500 ease-in-out transform hover:-translate-y-8 hover:scale-100">
                <div class="bg-gray-100  rounded overflow-hidden shadow-lg">
                    <div class="text-center px-6 py-4 font-semibold text-2xl mb-2 text-gray-700">
                        Total Expenses
                    </div>
                    <div class="text-center mt-8 mb-6 font-semibold text-2xl mb-2 text-gray-700">
                        {{$exp}}
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
