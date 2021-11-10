<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @livewireStyles
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script  src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval = "false" data-turbo-eval = "false" > </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->

    </head>
    <body class="antialiased">
        <div id="app">
            <div>
                <example></example>
            </div>
        </div>
    </body>
</html>
