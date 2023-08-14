<x-app-layout>
    <div x-data="data()" class="grid grid-cols-1 py-8 lg:px-8 ">
        <div class="p-4 bg-white shadow-md rounded-xl">
            <div class="flex flex-col p-4">
                <div class="inline-flex items-center gap-2 pb-6 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <span>@lang('back_to_dashboard')</span>
                </div>
                <h1 class="text-2xl font-semibold">@lang('account_settings')</h1>
                <span class="mt-1 text-sm text-gray-500">@lang('manage_your_account_information_and_settings')</span>
            </div>

        </div>
    </div>
</x-app-layout>
<script>
    function data() {
        return {
            init() {

            },
        }
    }
</script>
