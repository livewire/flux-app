<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Team Settings' }}</title>

        {{-- Inter font family... --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..600&display=swap" rel="stylesheet">

        {{-- Tailwind Play CDN + configuration... --}}
        <script src="//cdn.tailwindcss.com"></script>

        <script>
            tailwind.config = {
                theme: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui'],
                    }
                }
            }
        </script>

        @fluxStyles()
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
        {{ $slot }}

        @persist('hey')
            <flux:toast />
        @endpersist

        @fluxScripts
    </body>
</html>
