<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ URL::asset('messages.js') }}" ></script>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    </head>
    <body class="antialiased font-poppins">
        <div class="min-h-screen bg-[#E3F4FE]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<script>
    let locale = "{{ app()->getLocale() ?? 'en' }}";
    let key = "{{ env('API_KEY') }}";
</script>
