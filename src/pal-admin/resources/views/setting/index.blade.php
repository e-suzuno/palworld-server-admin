@php
    $buttonClass ="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700";
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            <form method="POST" action="{{ route("setting.update") }}">
                @csrf


                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">

                        @foreach( $setting['OptionSettings='] as $key => $value )
                            <div class="mb-4">
                                <label>
                                    {{ $key }} ( {{ App\GameSettings::label($key) }})
                                </label>
                                <div>
                                    <input type="text" name="{{ $key }}" value="{{ $value }}" class="w-full">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">

                        <button class="button  {{ $buttonClass }}">
                            保存
                        </button>

                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
