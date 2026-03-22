<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Guestbook') }} - {{ config('app.name', 'Laravel') }}</title>

        @if (! app()->runningUnitTests())
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        @livewireStyles
        <style>
            html, body { margin: 0; padding: 0; }
            .background-container {
                position: fixed;
                inset: 0;
                z-index: 0;
                overflow: hidden;
                background: #020818;
            }
        </style>
    </head>
    <body class="min-h-screen text-zinc-100" style="background:#020818;">

        <div class="background-container"></div>

        <main class="relative z-10 mx-auto flex w-full max-w-3xl flex-col gap-6 p-6 md:p-10">
            <header class="flex items-center justify-between gap-3">
                <div class="rounded-lg bg-zinc-900/80 px-4 py-2 shadow-lg backdrop-blur-sm">
                    <h1 class="text-2xl font-semibold tracking-tight text-white">Guestbook</h1>
                </div>
                <a href="http://p4u1.com" class="text-sm text-zinc-300 underline underline-offset-4 hover:text-white">Back home</a>
            </header>

            <section class="rounded-xl border border-zinc-700/60 bg-zinc-900/85 p-5 shadow-xl backdrop-blur-sm md:p-6">
                <p class="mb-5 text-sm text-zinc-400">
                    Leave us a message. Entries are private and reviewed by the admin team.
                </p>

                <livewire:guestbook-form />
            </section>
        </main>

        @livewireScripts
        @if (! app()->runningUnitTests())
            <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
            <script src="{{ asset('js/p4u1/water-bg.js') }}"></script>
        @endif
    </body>
</html>
