<x-app-layout>

    <div x-data="data()" class="grid grid-cols-1 py-8 lg:grid-cols-6 lg:gap-y-4 lg:px-8" >

        {{-- 1 ROW --}}
        {{-- Welcome card --}}
        <div class="py-2 mx-auto lg:col-span-2 lg:gap-3 lg:flex lg:w-full lg:flex-col lg:px-4">
            <div
            class="p-6 overflow-hidden font-medium bg-white divide-black shadow-lg lg:inline-flex lg:divide-x-2 rounded-2xl lg:gap-6 lg:p-10">
                <div class="hidden text-xl whitespace-nowrap lg:flex lg:flex-col">
                    <span x-text="clock"></span>
                    <span x-text="weekday" class="capitalize"></span>
                </div>
                <div class="flex flex-col w-full px-4 lg:px-5 lg:align-middle">
                    <span class="text-xl">@lang('welcome_back') <span>{{ Auth::user()->name }}</span></span>
                    <span class="pt-1 whitespace-nowrap">@lang('check_out_todays_weather_information')</span>
                    <span class="pt-1 text-xs whitespace-nowrap">@lang('powered_by') <a href="https://www.weatherapi.com/" title="Free Weather API">WeatherAPI.com</a></span>
                </div>
            </div>
            {{-- Weather text information in large screens --}}
            <div class="p-4 overflow-hidden align-middle bg-white shadow-lg lg:block rounded-2xl">
                <form class="inline-flex w-full gap-x-2" @submit.prevent="searchNewCity()">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">@lang('search')</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="default-search" class="block w-full pl-10 text-sm text-gray-900 border-none rounded-lg outline-none bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" :placeholder="Lang.get('strings.search_by_city')" x-model="city" required>
                    </div>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg right-1 bottom-1 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('search')</button>
                </form>
            </div>
        </div>
        {{-- END Welcome card --}}

        {{-- Humidity Card --}}
        <div class="w-full py-2 mx-auto lg:col-span-2 lg:px-4">
            <div class="flex flex-col bg-white shadow-lg rounded-2xl">
                <h1 class="pt-4 pl-6 font-medium">@lang('humidity')</h1>
                <div class="flex flex-col gap-0">
                    <span class="-mt-3 text-[75px] text-center" x-text="(weatherData?.humidity ?? 0) + ' %'  "></span>
                    <span class="-mt-5 -ml-20 text-center" x-text="humidityDescription"></span>
                </div>
                <div class="flex flex-col p-5 mb-1 ">
                    <div class="inline-flex justify-between lg:pb-2">
                        <span class="text-gray-900 dark:text-white" x-text="humidityDescription"></span>
                        <span class="text-gray-900 dark:text-white" x-text="(weatherData?.humidity ?? 0) + ' %'"></span>
                    </div>
                    <div class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700">
                        <div class="h-4 bg-blue-400 rounded-full" :style="`width: ${weatherData?.humidity}%;`"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Humidity Card --}}

        {{-- Forecast of the week card --}}
        <div class="w-full py-2 mx-auto lg:col-span-2 lg:px-4">
            <div class="flex flex-col bg-white shadow-lg rounded-2xl">
                <div class="flex flex-col p-4">
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
                <div class="px-4 shadow-lg rounded-2xl">
                    <table class="justify-center w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="justify-center text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-1 py-1">

                                </th>
                                <th scope="col" class="px-1 py-2 text-xs text-center">
                                    @lang('day')
                                </th>
                                <th scope="col" class="px-1 py-2 text-xs text-center">
                                    @lang('night')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="record in weatherWeekData" :key="record.date">
                            <tr class="text-lg text-gray-900 bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-1 py-2 whitespace-nowrap dark:text-white" :class="formatDate(date) === record.date ? 'font-semibold' : 'font-medium'" x-text="formatDate(date) === record.date ? Lang.get('strings.today') : record.date">
                                </th>
                                <td class="px-1 py-2 text-center" :class="formatDate(date) === record.date ? 'font-semibold' : 'font-medium'" x-text="Math.round(record?.day?.maxtemp_c) + ' °C'">
                                </td>
                                <td class="px-1 py-2 text-center" :class="formatDate(date) === record.date ? 'font-semibold' : 'font-medium'" x-text="Math.round(record?.day?.mintemp_c) + ' °C'">

                                </td>
                            </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
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
                        <span class="text-gray-500 " x-text="sunrise"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-medium text-gray-900">@lang('sunset')</span>
                        <span class="text-right text-gray-500" x-text="sunset"></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- END Sunrise Info Card --}}

        {{-- 3 ROW --}}
        <div :class="pastTenPm ? 'lg:grid-col-1' : 'lg:grid-cols-3'" class="grid py-2 mx-auto grid-col-1 lg:px-4 lg:w-full lg:col-span-2 gap-x-2 lg:gap-x-6" >
            <template x-for="weatherData in nextThreeHours">
                <div class="px-8 py-24 overflow-hidden bg-white shadow-lg lg:py-8 rounded-2xl">
                    <div class="flex flex-col justify-center gap-y-1">
                        <span class="text-xl font-medium text-center text-gray-900" x-text="weatherData.temp_c + ' ° C'"></span>
                        <img class="w-[110px] h-[110px] mx-auto" src="" :src="imagesFolder+'/'+weatherData?.condition" >
                        <span class="text-xl font-medium text-center text-gray-900" x-text="weatherData.hour + (locale === 'pt' ? ':00h' : (pastTwelvePm ? ':00 PM' : ':00 AM')) "></span>
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
                        <div class="inline-flex gap-x-1">
                            <span class="text-xl font-medium text-gray-900">@lang('wind')</span>
                            <span class="my-auto text-sm font-medium text-gray-900" x-text="'('+ weatherData?.wind_dir +')'"></span>
                        </div>
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
                        <span class="text-lg text-gray-500" x-text="uvIndex"></span>
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
            weatherWeekData: [],
            location: null,
            hour: null,
            sunset: null,
            sunrise: null,
            astroData: null,
            nextThreeHours: [],
            forecastData: null,
            imagesFolder: '{{ asset("weather_icon_pack/") }}',
            uvIndex: null,
            pastTenPm: false,
            pastTwelvePm: false,
            humidityDescription: Lang.get('strings.unknown_humidity'),
            city: null,
            init(){

                // load data from localStorage
                if (typeof Storage !== 'undefined') {
                    //Weather data
                    localForage.getItem('weather-data')
                    .then((value) => {
                        this.weatherData = value;
                    })
                    .catch((err) => { console.log(err) });

                    //Weather Week Data
                    localForage.getItem('weather-week-data')
                    .then((value) => {
                        this.weatherWeekData = value;
                    })
                    .catch((err) => { console.log(err) });

                    //Location data
                    localForage.getItem('weather-location')
                    .then((value) => {
                        this.location = value;
                    })
                    .catch((err) => { console.log(err) });

                    //Astro data
                    localForage.getItem('weather-astro-data')
                    .then((value) => {
                        this.astroData = value;
                    })
                    .catch((err) => { console.log(err) });

                    //Forecast data
                    localForage.getItem('weather-forecast-data')
                    .then((value) => {
                        this.forecastData = value;
                    })
                    .catch((err) => { console.log(err) });

                }

                console.log(locale);
                this.weekday = date.toLocaleDateString(locale, {weekday: 'long'});

                this.startClock();
                setInterval(() =>{
                    this.startClock();
                }, 1000);

                this.pastTenPm = isAfterTenPm(this.clock);
                this.pastTwelvePm = isAfterTwelvePm(this.clock);

                if(navigator.onLine) {
                    this.fetchData();
                }

            },
            fetchData() {
                if(this.city !== null) {
                    // Weather data
                    axios.get(`http://api.weatherapi.com/v1/forecast.json?key=${key}&lang=${locale}&q=${this.city}&days=1&aqi=no&alerts=no`)
                    .then((response) => {
                        // console.log('Weather Forecast', response?.data);
                        this.weatherData = response?.data?.current;
                        this.location = response?.data?.location;
                        this.astroData = response?.data?.forecast?.forecastday[0]?.astro;
                        this.forecastData = response?.data?.forecast?.forecastday[0]?.day;

                        saveStorage('weather-data', response?.data?.current);
                        saveStorage('weather-location', response?.data?.location);
                        saveStorage('weather-astro-data', response?.data?.forecast.forecastday[0]?.astro);
                        saveStorage('weather-forecast-data', response?.data?.forecast?.forecastday[0]?.day);
                        this.processWeatherData();
                    })
                    .catch((error) => console.log(error.message));

                    //Weather Week data
                    axios.get(`http://api.weatherapi.com/v1/forecast.json?key=${key}&q=${this.city}&days=7&lang=${locale}&aqi=no`)
                    .then((response) => {
                        this.weatherWeekData = response.data.forecast.forecastday;
                        saveStorage('weather-week-data', response.data.forecast.forecastday);
                    })
                    .catch((error) => console.log(error.message));

                } else {
                    // Weather data
                    axios.get(`http://api.weatherapi.com/v1/forecast.json?key=${key}&lang=${locale}&q=Lisboa%Portugal&days=1&aqi=no&alerts=no`)
                    .then((response) => {
                        // console.log('Weather Forecast', response?.data);
                        this.weatherData = response?.data?.current;
                        this.location = response?.data?.location;
                        this.astroData = response?.data?.forecast?.forecastday[0]?.astro;
                        this.forecastData = response?.data?.forecast?.forecastday[0]?.day;

                        saveStorage('weather-data', response?.data?.current);
                        saveStorage('weather-location', response?.data?.location);
                        saveStorage('weather-astro-data', response?.data?.forecast.forecastday[0]?.astro);
                        saveStorage('weather-forecast-data', response?.data?.forecast?.forecastday[0]?.day);
                        this.processWeatherData();
                    })
                    .catch((error) => console.log(error.message));

                    //Weather Week data
                    axios.get(`http://api.weatherapi.com/v1/forecast.json?key=${key}&q=Lisboa%Portugal&days=7&lang=${locale}&aqi=no`)
                    .then((response) => {
                        this.weatherWeekData = response.data.forecast.forecastday;
                        saveStorage('weather-week-data', response.data.forecast.forecastday);
                    })
                    .catch((error) => console.log(error.message));
                }
            },
            processWeatherData(){
                this.hour = date.getHours();
                this.nextThreeHoursForecast();

                /* Process sunset/sunrise time format*/
                if(locale === 'pt') {
                    this.sunrise = convertFrom12To24Format(this.astroData.sunrise);
                    this.sunset = convertFrom12To24Format(this.astroData.sunset);
                } else {
                    this.sunset = this.astroData.sunset;
                    this.sunrise = this.astroData.sunrise;
                }

                //UV index (Description)
                if(0 <= this.weatherData.uv && this.weatherData.uv <= 3){
                    this.uvIndex = Lang.get('strings.low');
                }
                else if (3 < this.weatherData.uv && this.weatherData.uv <= 7){
                    this.uvIndex = Lang.get('strings.moderate');
                }
                else if (7 < this.weatherData.uv && this.weatherData.uv <= 10){
                    this.uvIndex = Lang.get('strings.extreme');
                }

                //Humidity (Description)
                if(0 <= this.weatherData.humidity && this.weatherData.humidity <= 25){
                    this.humidityDescription = Lang.get('strings.low');
                }
                else if (25 < this.weatherData.humidity && this.weatherData.humidity <= 75){
                    this.humidityDescription = Lang.get('strings.normal');
                }
                else if (75 < this.weatherData.humidity && this.weatherData.humidity <= 100){
                    this.humidityDescription = Lang.get('strings.high');
                }

            },
            startClock() {
                let hours = null;
                if(locale === 'en') {
                    hours = new Date().toLocaleTimeString(locale, {hour: '2-digit', minute:'2-digit'});
                } else {
                    hours = new Date().toLocaleTimeString(locale, {hour: '2-digit', minute:'2-digit'});
                }
                this.clock = hours;
            },
            searchNewCity() {
                this.fetchData();
            },
            nextThreeHoursForecast() {
                this.nextThreeHours = [];

                /* Get the forecast for the next three hours */
                if(this.hour){
                    let h = this.hour;
                    let loopNumber = !this.pastTenPm ? 4 : 2;

                    for (let index = 1; index < loopNumber; index++) {
                        let hourToSearch = h + index;
                        axios.get(`http://api.weatherapi.com/v1/forecast.json?key=${key}&lang=${locale}&q=Santarem%Portugal?days=1&&hour=${hourToSearch}&aqi=no&alerts=no`)
                        .then((response) => {
                            let imgCondition = null;

                            switch (response?.data?.forecast?.forecastday[0]?.hour[0]?.condition?.code) {
                                case 1000:
                                imgCondition ='sun.gif';
                                break;
                                case 1003:
                                imgCondition ='cloudy.gif';
                                break;
                                case 1006:
                                imgCondition ='clouds.gif';
                                break;
                                case 1009:
                                imgCondition ='clouds.gif';
                                break;
                            };

                            this.nextThreeHours.push({
                                hour: new Date((response?.data?.forecast?.forecastday[0]?.hour[0]?.time_epoch * 1000)).getHours(),
                                temp_c: Math.round(response?.data?.forecast?.forecastday[0]?.hour[0]?.feelslike_c),
                                condition: imgCondition,
                            });

                            this.nextThreeHours.sort((a, b) => {return a.hour - b.hour});
                        })
                        .catch((error) => console.log(error.message));
                    }
                }
            }
        }
    }
</script>
