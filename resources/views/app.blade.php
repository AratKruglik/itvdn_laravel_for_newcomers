<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        @include('ui.header')
        @yield('content')
    </body>
    <script src="https://cdn.tailwindcss.com"></script>
</html>
