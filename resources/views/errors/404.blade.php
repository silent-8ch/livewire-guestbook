<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Page Not Found') }} - {{ config('app.name', 'Laravel') }}</title>

        @if (! app()->runningUnitTests())
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            html,
            body {
                margin: 0;
                padding: 0;
            }

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

        <main class="relative z-10 mx-auto flex min-h-screen w-full max-w-3xl flex-col items-center justify-center gap-6 p-6 text-center md:p-10">
            <div class="rounded-xl border border-zinc-700/60 bg-zinc-900/85 p-8 shadow-xl backdrop-blur-sm md:p-10">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-zinc-400">404</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white md:text-4xl">ಠ_ಠ</h1>
                <p class="mt-4 text-sm text-zinc-300 md:text-base">
                    How did you get here?
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                    <a
                        href="javascript:history.back()"
                        class="rounded-md border border-zinc-500 px-4 py-2 text-sm text-zinc-100 transition hover:border-zinc-300 hover:text-white"
                    >
                        Go back
                    </a>
                    <a
                        href="{{ Route::has('guestbook') ? route('guestbook') : url('/guestbook') }}"
                        class="rounded-md bg-zinc-100 px-4 py-2 text-sm font-medium text-zinc-900 transition hover:bg-white"
                    >
                        Visit guestbook
                    </a>
                </div>
            </div>
        </main>

        @if (! app()->runningUnitTests())
            <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
            <script src="{{ asset('js/p4u1/water-bg.js') }}"></script>
        @endif
    </body>
</html>
