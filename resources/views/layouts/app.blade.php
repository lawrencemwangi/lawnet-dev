<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/assets/icons/icon.css') }}">
        <link rel="icon"  type="image" href="{{ asset('/assets/images/dell.jpg')}}">
        
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Scripts -->
        @vite(['resources/css/style.scss', 'resources/js/app.js'])
    </head>

    <body>
        <main>
            {{ $slot }}
        </main>
    </body>

    @include('partials.message')
    @include('partials.javascript')
</html>
