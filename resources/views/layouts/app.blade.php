<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <livewire:styles />
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="shortcut icon" href="icon.png">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-cosmos">
        <div class="flex flex-col md:flex-row w-full">
            <x-nav />

            <x-container>
                {{ $slot }}
            </x-container>
        </div>

        <livewire:delete-confirmation />

        <livewire:scripts />
    </body>
</html>
