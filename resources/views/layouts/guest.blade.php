<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "IKM") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])

        <!-- Styles -->
        @livewireStyles

        <style>
            body {
                background: url('/bejoyaki.png') no-repeat center center/cover;
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
                min-height: 100vh;
            }

            .page-container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                width: 100%;
            }

            .auth-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                max-width: 500px;
                padding: 2rem;
            }

            .logo-container {
                margin-bottom: 1.5rem;
            }

            .content-container {
                width: 100%;
                background-color: rgba(255, 255, 255, 0.9);
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .input-field {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .submit-btn {
                background-color: #4caf50;
                color: white;
                padding: 10px;
                width: 100%;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .submit-btn:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="page-container">{{ $slot }}</div>
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
