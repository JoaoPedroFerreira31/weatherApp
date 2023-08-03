<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @lang('dashboard')
        </h2>
    </x-slot> --}}

    <div x-data="data()" class="grid grid-cols-1 py-8 lg:grid-cols-6 lg:gap-y-4 lg:px-8">

        {{-- 1 ROW --}}
        {{-- Welcome card --}}
        <div class="py-2 mx-auto lg:col-span-2 lg:gap-3 lg:flex lg:w-full lg:flex-col lg:px-4">
            <div
                class="p-6 overflow-hidden font-medium bg-white divide-black shadow-lg lg:inline-flex lg:divide-x-2 rounded-2xl lg:gap-6 lg:p-10">
                <div class="hidden text-xl whitespace-nowrap lg:flex lg:flex-col">
                    <span x-text="clock"></span>
                    <span x-text="weekday"></span>
                </div>
                <div class="flex flex-col px-4 lg:px-5 lg:align-middle">
                    <span class="text-xl">@lang('welcome_back') <span>{{ Auth::user()->name }}</span></span>
                    <span class="pt-1 whitespace-nowrap">@lang('check_out_todays_weather_information')</span>
                </div>
            </div>
            {{-- Weather text information in large screens --}}
            <div class="hidden p-5 overflow-hidden bg-white shadow-lg lg:block rounded-2xl">
                <p class="font-medium text-gray-900">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        {{-- END Welcome card --}}

        {{-- Weather text information in mobile screen --}}
        <div class="py-2 mx-auto lg:hidden sm:block lg:px-4">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-24 rounded-2xl">
                <p class="text-sm font-medium text-gray-900">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
        {{-- END Weather text information in mobile screen --}}

        {{-- Humidity Card --}}
        <div class="w-full py-2 mx-auto lg:col-span-2 lg:px-4">
            <div class="flex flex-col bg-white shadow-lg rounded-2xl">
                <h1 class="pt-4 pl-6 font-medium">@lang('humidity')</h1>
                <div class="flex flex-col gap-0">
                    <span class="-mt-3 text-[75px] text-center">60 %</span>
                    <span class="-mt-5 -ml-20 text-center">Normal</span>
                </div>
                <div class="inline-flex justify-center w-full p-5 gap-x-4">
                    <div class="flex flex-col gap-y-0.5">
                        <span class="text-xs text-gray-400 pl-0.5">@lang('good')</span>
                        <span class="py-2 bg-gray-300 px-9 rounded-xl"></span>
                    </div>
                    <div class="flex flex-col gap-y-0.5">
                        <span class="text-xs text-gray-400 pl-0.5">@lang('normal')</span>
                        <span class="py-2 bg-gray-300 px-9 rounded-xl"></span>
                    </div>
                    <div class="flex flex-col gap-y-0.5">
                        <span class="text-xs text-gray-400 pl-0.5">@lang('bad')</span>
                        <span class="py-2 bg-gray-300 px-9 rounded-xl"></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Humidity Card --}}

        <div
            class="flex flex-col px-12 py-6 mx-5 bg-white shadow-lg rounded-2xl lg:p-6 lg:mt-2 lg:col-span-2 lg:row-span-2">
            <div class="flex flex-col mb-3">
                <h1 class="font-medium">@lang('forecast_of_the_week')</h1>
                <div class="inline-flex items-center text-xs text-gray-500 gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                        <path fill-rule="evenodd"
                            d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Lisboa, Portugal</span>
                </div>
            </div>

            <table class="justify-center w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="justify-center text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-2">

                        </th>
                        <th scope="col" class="px-2 py-3 text-xs text-center">
                            @lang('day')
                        </th>
                        <th scope="col" class="px-2 py-3 text-xs text-center">
                            @lang('night')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-lg bg-white dark:bg-gray-800">
                        <th
                            class="px-4 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                            Yesterday
                        </th>
                        <td class="px-2 py-2 text-center">
                            30°C
                        </td>
                        <td class="px-2 py-2 text-center">
                            22°C
                        </td>
                    </tr>
                    <tr class="text-lg font-semibold text-gray-900 bg-white dark:bg-gray-800">
                        <th scope="row"
                            class="px-4 py-2 whitespace-nowrap dark:text-white">
                            Today
                        </th>
                        <td class="px-2 py-2 text-center">
                            26°C
                        </td>
                        <td class="px-2 py-2 text-center">
                            17°C
                        </td>
                    </tr>
                    <tr class="text-lg text-gray-500 dark:text-white">
                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">Tuesday</th>
                        <td class="px-2 py-3 text-center">25°C</td>
                        <td class="px-2 py-3 text-center">16°C</td>
                    </tr>
                    <tr class="text-lg text-gray-500 dark:text-white">
                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">Wednesday</th>
                        <td class="px-2 py-3 text-center">32°C</td>
                        <td class="px-2 py-3 text-center">18°C</td>
                    </tr>
                    <tr class="text-lg text-gray-500 dark:text-white">
                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">Thursday</th>
                        <td class="px-2 py-3 text-center">29°C</td>
                        <td class="px-2 py-3 text-center">18°C</td>
                    </tr>
                    <tr class="text-lg text-gray-500 dark:text-white">
                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">Friday</th>
                        <td class="px-2 py-3 text-center">30°C</td>
                        <td class="px-2 py-3 text-center">19°C</td>
                    </tr>
                    <tr class="text-lg text-gray-500 dark:text-white">
                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">Saturday</th>
                        <td class="px-2 py-3 text-center">28°C</td>
                        <td class="px-2 py-3 text-center">19°C</td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- END Forecast of the week card --}}

        {{-- 2 ROW --}}
        {{-- Weather Info card --}}
        <div class="py-2 lg:col-span-2 lg:px-4 lg:w-full">
            <div class="p-12 overflow-hidden bg-white shadow-lg lg:p-10 rounded-2xl">
                <div class="grid grid-cols-2">
                    <img class="mx-auto w-[160px] h-[160px] object-fit" src="{{asset('weather_icon_pack/sun.gif')}}" alt="">
                    <div class="flex flex-col gap-0 align-middle">
                        <div class="inline-flex my-auto text-2xl gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 my-auto">
                                <path fill-rule="evenodd"
                                    d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Lisboa</span>
                        </div>
                        <span class="lg:text-[75px] text-[50px] font-medium">25 ° C</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Weather Info card --}}

        {{-- Sunrise Info Card --}}
        <div class="py-2 mx-auto lg:px-4 lg:col-span-2 lg:w-full">
            <div class="flex flex-col p-24 overflow-hidden bg-white shadow-lg lg:p-4 rounded-2xl">
                <img src="{{asset('weather_icon_pack/sunrise.gif')}}" class="mx-auto w-[155px] h-[155px]" alt="">
                <div class="inline-flex justify-between lg:px-6">
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-900">@lang('sunrise')</span>
                        <span class="text-gray-500">6:30</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-900">@lang('sunset')</span>
                        <span class="text-gray-500">20:55</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Sunrise Info Card --}}

        {{-- 3 ROW --}}
        <div class="grid grid-cols-3 py-2 mx-auto lg:px-4 lg:w-full lg:col-span-2 gap-x-2 lg:gap-x-6">
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-8 rounded-2xl">
                <div class="flex flex-col justify-center gap-y-1">
                    <span class="text-xl font-medium text-center text-gray-900">24 ° C</span>
                    <img src="{{asset('weather_icon_pack/sun.gif')}}" alt="">
                    <span class="text-xl font-medium text-center text-gray-900">15:00h</span>
                </div>
            </div>
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-8 rounded-2xl">
                <div class="flex flex-col justify-center gap-y-1">
                    <span class="text-xl font-medium text-center text-gray-900">24 ° C</span>
                    <img src="{{asset('weather_icon_pack/sun.gif')}}" alt="">
                    <span class="text-xl font-medium text-center text-gray-900">16:00h</span>
                </div>
            </div>
            <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-8 rounded-2xl">
                <div class="flex flex-col justify-center gap-y-1">
                    <span class="text-xl font-medium text-center text-gray-900">24 ° C</span>
                    <img src="{{asset('weather_icon_pack/sun.gif')}}" alt="">
                    <span class="text-xl font-medium text-center text-gray-900">17:00h</span>
                </div>
            </div>
        </div>

        {{-- Wind Card --}}
        <div class="py-2 mx-auto lg:px-4 lg:col-span-2 lg:w-full">
            <div class="flex flex-col p-24 overflow-hidden bg-white shadow-lg lg:p-4 rounded-2xl">
                <img src="{{asset('weather_icon_pack/wind.gif')}}" class="mx-auto w-[155px] h-[155px]" alt="">
                <div class="inline-flex justify-center lg:px-6">
                    <div class="flex flex-col text-center">
                        <span class="text-xl font-medium text-gray-900">@lang('wind')</span>
                        <span class="text-lg text-gray-500">32 km/h</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Wind Card --}}

        {{-- UV Card --}}
        <div class="py-2 mx-auto lg:px-4 lg:col-span-2 lg:w-full">
            <div class="flex flex-col p-24 overflow-hidden bg-white shadow-lg lg:p-4 rounded-2xl">
                <img src="{{asset('weather_icon_pack/uv-protection.gif')}}" class="mx-auto w-[155px] h-[155px]" alt="">
                <div class="inline-flex justify-center lg:px-6">
                    <div class="flex flex-col text-center">
                        <span class="text-xl font-medium text-gray-900">@lang('uv_index')</span>
                        <span class="text-lg text-gray-500">Low</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END UV Card --}}
    </div>
</x-app-layout>
<script>
    function data() {
        return {
            clock: null,
            weekday: null,
            init(){
                this.weekday = new Date().toLocaleDateString(locale, {weekday: 'long'});

                this.startClock();
                setInterval(() =>{
                    this.startClock();
                }, 1000);
            },
            fetchData() {

            },
            startClock() {
                let hours = null;
                if(locale === 'en') {
                    hours = new Date().toLocaleTimeString(locale, {hour: '2-digit', minute:'2-digit'});
                } else {
                    hours = new Date().toLocaleTimeString(locale);
                }
                this.clock = hours;
            },
        }
    }
</script>
