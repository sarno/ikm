<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IKM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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

        @stack('head')
        <!-- Scripts --> 
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles

        @stack('add-css')
        @yield('add-css')
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>
    <body class="font-fonarto bg-gray-100 antialiased">
        <x-banner />
        @include('components.sidebar')

        <div class="min-h-screen bg-gray-100 p-4 lg:ml-64">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="mt-20 bg-white shadow">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @if (isset($breadcrumbs))
                @include(
                'components.breadcrumbs', ['breadcrumbs' => $breadcrumbs]                )
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @stack('add-js')
        @yield('add-js')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
