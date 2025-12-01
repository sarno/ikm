<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-g" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "JogloMart") }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />
        <style>
            [x-cloak] {
                display: none !important;
            }

            input[type='number']::-webkit-inner-spin-button,
            input[type='number']::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>
        @stack("head")
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @livewireStyles
        @stack("add-css")
        @yield("add-css")
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>

    <body class="font-fonarto bg-indigo-200 antialiased">
        <div class="min-h-screen bg-indigo-200 md:p-4">
            <main>{{ $slot }}</main>
        </div>

        @livewireScripts
        @stack("modals")
        @stack("add-js")
        @yield("add-js")
    </body>
</html>
