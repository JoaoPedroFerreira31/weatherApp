<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @lang('dashboard')
        </h2>
    </x-slot> --}}

    <div class="grid grid-cols-1 py-8 lg:grid-cols-4 lg:gap-y-4">

        <div class="py-2 mx-auto lg:col-span-2 lg:gap-3 lg:flex lg:w-full lg:flex-col lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg rounded-2xl lg:p-16">
                @lang('welcome_to_your_dashboard')!
            </div>
            {{-- Weather text information in large screens --}}
            <div class="hidden p-4 overflow-hidden bg-white shadow-lg lg:block rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        {{-- Weather text information in mobile screen --}}
        <div class="py-2 mx-auto lg:hidden sm:block lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>
        {{-- END Weather text information in mobile screen --}}

        <div class="py-2 mx-auto lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        <div class="py-2 mx-auto lg:px-4 lg:row-span-2">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        <div class="py-2 mx-auto lg:col-span-2 lg:px-4 lg:w-full">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        <div class="py-2 mx-auto lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        <div class="grid grid-cols-3 py-2 mx-auto lg:px-4 lg:w-full lg:col-span-2 gap-x-2 lg:gap-x-6">
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-24 rounded-2xl">
                {{-- @lang('welcome_to_your_dashboard')! --}}
                teste
            </div>
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-24 rounded-2xl">
                {{-- @lang('welcome_to_your_dashboard')! --}}
                teste
            </div>
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-24 rounded-2xl">
                {{-- @lang('welcome_to_your_dashboard')! --}}
                teste
            </div>
        </div>

        <div class="py-2 mx-auto lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

        <div class="py-2 mx-auto lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                @lang('welcome_to_your_dashboard')!
            </div>
        </div>

    </div>
</x-app-layout>
