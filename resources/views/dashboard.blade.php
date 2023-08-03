<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @lang('dashboard')
        </h2>
    </x-slot> --}}

    <div x-data="data()" class="grid grid-cols-1 py-8 lg:grid-cols-6 lg:gap-y-4 lg:px-8" x-cloak>
        {{-- 1 ROW --}}
        {{-- Welcome card --}}
        <div class="py-2 mx-auto lg:col-span-2 lg:gap-3 lg:flex lg:w-full lg:flex-col lg:px-4">
            <div
                class="p-6 overflow-hidden font-medium bg-white divide-black shadow-lg lg:inline-flex lg:divide-x-2 rounded-2xl lg:gap-6 lg:p-10">
                <div class="hidden text-xl whitespace-nowrap lg:flex lg:flex-col">
                    <span x-text="clock"></span>
                    <span x-text="weekday" class="capitalize"></span>
                </div>
                <div class="flex flex-col px-4 lg:px-5 lg:align-middle">
                    <span class="text-xl">@lang('welcome_back') <span>{{ Auth::user()->name }}</span></span>
                    <span class="pt-1 whitespace-nowrap">@lang('check_out_todays_weather_information')</span>
                    <span class="pt-1 text-xs whitespace-nowrap">Powered by <a href="https://www.weatherapi.com/" title="Free Weather API">WeatherAPI.com</a></span>
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
                    <span class="-mt-3 text-[75px] text-center" x-text="(weatherData?.humidity ?? 0) + ' %'  "></span>
                    <span class="-mt-5 -ml-20 text-center">Normal</span>
                </div>
                <div class="inline-flex justify-center w-full p-7 gap-x-4">
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
                    <span class="font-medium" x-text="location?.region + ', ' + location?.country"></span>
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
                            <span class="font-medium" x-text="location?.region"></span>
                        </div>
                        <span class="lg:text-[75px] text-[50px] font-medium" x-text="(Math.round(weatherData?.feelslike_c) ?? 0) + ' ° C'"></span>
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
                        <span class="text-gray-500" x-text="astroData?.sunrise"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-900">@lang('sunset')</span>
                        <span class="text-gray-500" x-text="astroData?.sunset">20:55</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Sunrise Info Card --}}

        {{-- 3 ROW --}}
        <div class="grid grid-cols-3 py-2 mx-auto lg:px-4 lg:w-full lg:col-span-2 gap-x-2 lg:gap-x-6">
            <template x-for="weatherData in nextThreeHours">
                <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-8 rounded-2xl">
                    <div class="flex flex-col justify-center gap-y-1">
                        <span class="text-xl font-medium text-center text-gray-900" x-text="weatherData.temp_c + ' ° C'"></span>
                        <img :src="weatherData.condition.icon" :alt="weatherData.condition.text">
                        <span class="text-xl font-medium text-center text-gray-900" x-text="weatherData.hour + (locale === 'pt' ? ':00h' : ':00pm') "></span>
                    </div>
                </div>
            </template>
        </div>

        {{-- Wind Card --}}
        <div class="py-2 mx-auto lg:px-4 lg:col-span-2 lg:w-full">
            <div class="flex flex-col p-24 overflow-hidden bg-white shadow-lg lg:p-4 rounded-2xl">
                <img src="{{asset('weather_icon_pack/wind.gif')}}" class="mx-auto w-[155px] h-[155px]" alt="">
                <div class="inline-flex justify-center lg:px-6">
                    <div class="flex flex-col text-center">
                        <span class="text-xl font-medium text-gray-900">@lang('wind')</span>
                        <span class="text-lg text-gray-500" x-text="weatherData?.wind_kph + ' km/h'"></span>
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
    let date = new Date();

    function data() {
        return {
            date: date,
            clock: null,
            weekday: null,
            weatherData: null,
            location: null,
            hour: null,
            astroData: null,
            nextThreeHours: [],
            init(){
                this.weekday = date.toLocaleDateString(locale, {weekday: 'long'});

                this.startClock();
                setInterval(() =>{
                    this.startClock();
                }, 1000);
                this.fetchData();
            },
            fetchData() {
                // Weather data
                axios.get(`http://api.weatherapi.com/v1/forecast.json?key=d2a0fd1aea8c4ff18d0133526230208&lang=${locale}&q=Lisbon&days=1&aqi=no&alerts=no`)
                .then((response) => {
                    console.log(response);
                    this.weatherData = response?.data?.current;
                    this.location = response?.data?.location;
                    this.astroData = response?.data?.forecast?.forecastday[0]?.astro;
                    // saveStorage('weather-data', response.data.data);
                    // saveStorage('weather-location', response.data.data);
                    this.processWeatherData();
                })
                .catch((error) => console.log(error.message));

                // Weather data
                // axios.get(`http://api.weatherapi.com/v1/current.json?key=d2a0fd1aea8c4ff18d0133526230208&q=Lisbon&lang=${locale}&hour=&aqi=no`)
                // .then((response) => {
                //     console.log(response);
                //     this.weatherData = response.data.current;
                //     this.location = response.data.location;
                //     // saveStorage('weather-data', response.data.data);
                //     // saveStorage('weather-location', response.data.data);
                // })
                // .catch((error) => console.log(error.message));

            },
            processWeatherData(){
                this.hour = date.getHours();

                if(this.hour){
                    let h = this.hour;
                    for (let index = 1; index < 4; index++) {
                        let hourToSearch = h + index;
                        axios.get(`http://api.weatherapi.com/v1/forecast.json?key=d2a0fd1aea8c4ff18d0133526230208&q=Lisbon?days=1&&hour=${hourToSearch}&lang=${locale}&aqi=no&alerts=no`)
                        .then((response) => {
                            // console.log(response);
                            console.log(response.data.forecast.forecastday[0]);
                            this.nextThreeHours.push({
                                hour: new Date((response.data.forecast.forecastday[0].hour[0].time_epoch * 1000)).getHours(),
                                temp_c: Math.round(response.data.forecast.forecastday[0].hour[0].feelslike_c),
                                condition: response.data.forecast.forecastday[0].hour[0].condition
                            });
                            this.nextThreeHours.sort((a, b) => {return a.hour - b.hour});
                        })
                        .catch((error) => console.log(error.message));
                    }
                }
            },
            startClock() {
                let hours = null;
                if(locale === 'en') {
                    hours = new Date().toLocaleTimeString(locale, {hour: '2-digit', minute:'2-digit'});
                } else {
                    hours = new Date().toLocaleTimeString(locale);
                }
                this.clock = hours;
                console.log(this.nextThreeHours);
            },
        }
    }
</script>
