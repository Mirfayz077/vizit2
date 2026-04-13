<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="silk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="color-scheme" content="light dark">

        <title>{{ $title ?? config('app.name', 'Vizitka') }}</title>

        @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        {{ $slot }}

        @livewireScriptConfig
    </body>
</html>
