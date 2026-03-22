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
    </head>
    <body class="min-h-screen bg-zinc-50 text-zinc-900">
        <main class="mx-auto flex w-full max-w-3xl flex-col gap-6 p-6 md:p-10">
            <header class="flex items-center justify-between gap-3">
                <h1 class="text-2xl font-semibold tracking-tight">Guestbook</h1>
                <a href="http://p4u1.com" class="text-sm text-zinc-600 underline underline-offset-4">Back home</a>
            </header>

            <section class="rounded-xl border border-zinc-200 bg-white p-5 shadow-sm md:p-6">
                <p class="mb-5 text-sm text-zinc-600">
                    Leave us a message. Entries are private and reviewed by the admin team.
                </p>

                <livewire:guestbook-form />
            </section>
        </main>

        @livewireScripts
    </body>
</html>
