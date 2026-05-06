<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-50 text-zinc-950 antialiased dark:bg-zinc-950 dark:text-white">
    <div class="min-h-screen overflow-hidden">
        <header class="mx-auto flex w-full max-w-7xl items-center gap-4 px-6 py-5 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3"
                aria-label="{{ config('app.name', 'CarLedger') }}">
                <img src="{{ asset('images/logo.png') }}" alt="CarLedger Logo" class="h-12 w-auto sm:h-14">
                <span class="hidden text-base font-semibold tracking-normal text-zinc-900 dark:text-white sm:block">
                    {{ config('app.name', 'CarLedger') }}
                </span>
            </a>

            <div class="flex-1"></div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-2 text-sm">
                    <a href="{{ route('home') }}"
                        class="hidden rounded-md px-3 py-2 font-medium text-zinc-700 transition hover:bg-zinc-200/70 hover:text-zinc-950 dark:text-zinc-300 dark:hover:bg-white/10 dark:hover:text-white sm:inline-flex">
                        {{ __('layout.home') }}
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center rounded-md bg-zinc-900 px-4 py-2 font-medium text-white transition hover:bg-zinc-700 dark:bg-white dark:text-zinc-950 dark:hover:bg-zinc-200">
                            {{ __('layout.dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center rounded-md px-3 py-2 font-medium text-zinc-700 transition hover:bg-zinc-200/70 hover:text-zinc-950 dark:text-zinc-300 dark:hover:bg-white/10 dark:hover:text-white">
                            {{ __('layout.login') }}
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center rounded-md bg-zinc-900 px-4 py-2 font-medium text-white transition hover:bg-zinc-700 dark:bg-white dark:text-zinc-950 dark:hover:bg-zinc-200">
                                {{ __('layout.register') }}
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main>
            <section
                class="mx-auto grid w-full max-w-7xl items-center gap-12 px-6 pb-16 pt-8 lg:grid-cols-[1.02fr_0.98fr] lg:px-8 lg:pb-24 lg:pt-14">
                <div class="max-w-3xl">
                    <p
                        class="mb-4 inline-flex rounded-md border border-violet-200 bg-violet-50 px-3 py-1 text-sm font-medium text-violet-700 dark:border-violet-400/30 dark:bg-violet-400/10 dark:text-violet-200">
                        Portafolio de evidencias · Laravel + Livewire + Flux
                    </p>

                    <h1
                        class="max-w-4xl text-4xl font-semibold tracking-normal text-zinc-950 dark:text-white sm:text-5xl lg:text-6xl">
                        Gestión vehicular con trazabilidad técnica y evidencias claras.
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-zinc-700 dark:text-zinc-300">
                        CarLedger centraliza vehículos, mantenimientos, combustible y gastos en una experiencia pensada
                        para demostrar arquitectura, autenticación, componentes reutilizables y buenas prácticas de
                        desarrollo.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center rounded-md bg-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 focus:ring-offset-zinc-50 dark:focus:ring-offset-zinc-950">
                                Ir al dashboard
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 focus:ring-offset-zinc-50 dark:focus:ring-offset-zinc-950">
                                    Crear cuenta de prueba
                                </a>
                            @endif

                            <a href="{{ route('login') }}"
                                class="inline-flex items-center justify-center rounded-md border border-zinc-300 bg-white px-5 py-3 text-sm font-semibold text-zinc-900 transition hover:border-zinc-400 hover:bg-zinc-100 dark:border-white/15 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
                                Iniciar sesión
                            </a>
                        @endauth
                    </div>

                    <div class="mt-10 grid max-w-2xl grid-cols-3 gap-3">
                        <div class="border-l border-zinc-300 pl-4 dark:border-white/20">
                            <p class="text-2xl font-semibold text-zinc-950 dark:text-white">4</p>
                            <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Módulos base</p>
                        </div>
                        <div class="border-l border-zinc-300 pl-4 dark:border-white/20">
                            <p class="text-2xl font-semibold text-zinc-950 dark:text-white">2FA</p>
                            <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Seguridad lista</p>
                        </div>
                        <div class="border-l border-zinc-300 pl-4 dark:border-white/20">
                            <p class="text-2xl font-semibold text-zinc-950 dark:text-white">UI</p>
                            <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Tema claro/oscuro</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="rounded-lg border border-zinc-200 bg-white shadow-xl shadow-zinc-200/60 dark:border-white/10 dark:bg-zinc-900 dark:shadow-black/40">
                        <div class="flex items-center gap-2 border-b border-zinc-200 px-4 py-3 dark:border-white/10">
                            <span class="size-3 rounded-full bg-red-400"></span>
                            <span class="size-3 rounded-full bg-amber-400"></span>
                            <span class="size-3 rounded-full bg-emerald-400"></span>
                            <span
                                class="ml-2 text-xs font-medium text-zinc-500 dark:text-zinc-400">evidence-dashboard.blade.php</span>
                        </div>

                        <div class="grid gap-4 p-5">
                            <div
                                class="rounded-md bg-zinc-950 p-4 font-mono text-xs leading-6 text-zinc-100 dark:bg-black">
                                <p><span class="text-violet-300">Route</span>::view('/', 'welcome')->name('home');</p>
                                <p><span class="text-emerald-300">Livewire</span> components + Flux UI</p>
                                <p><span class="text-sky-300">Tailwind</span> dark variant controlled by appearance</p>
                                <p><span class="text-amber-300">Auth</span> dashboard protected by middleware</p>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-2">
                                <div class="rounded-md border border-zinc-200 p-4 dark:border-white/10">
                                    <p class="text-sm font-semibold text-zinc-900 dark:text-white">Mantenimiento</p>
                                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Historial, costos, fechas y
                                        evidencia del servicio.</p>
                                </div>
                                <div class="rounded-md border border-zinc-200 p-4 dark:border-white/10">
                                    <p class="text-sm font-semibold text-zinc-900 dark:text-white">Combustible</p>
                                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Registro de consumo para
                                        análisis operativo.</p>
                                </div>
                                <div class="rounded-md border border-zinc-200 p-4 dark:border-white/10">
                                    <p class="text-sm font-semibold text-zinc-900 dark:text-white">Gastos</p>
                                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Control financiero por
                                        vehículo y categoría.</p>
                                </div>
                                <div class="rounded-md border border-zinc-200 p-4 dark:border-white/10">
                                    <p class="text-sm font-semibold text-zinc-900 dark:text-white">Usuarios</p>
                                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Autenticación, perfil,
                                        seguridad y apariencia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-y border-zinc-200 bg-white/70 py-10 dark:border-white/10 dark:bg-white/[0.03]">
                <div class="mx-auto grid w-full max-w-7xl gap-6 px-6 lg:grid-cols-3 lg:px-8">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-normal text-violet-600 dark:text-violet-300">
                            Evidencia técnica</p>
                        <h2 class="mt-2 text-2xl font-semibold text-zinc-950 dark:text-white">Lo que el proyecto deja
                            ver</h2>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 lg:col-span-2">
                        <div
                            class="rounded-lg border border-zinc-200 bg-zinc-50 p-5 dark:border-white/10 dark:bg-zinc-900/70">
                            <p class="font-semibold text-zinc-950 dark:text-white">Arquitectura Laravel</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-400">Rutas nombradas, layouts
                                Blade, configuración centralizada y separación de responsabilidades.</p>
                        </div>
                        <div
                            class="rounded-lg border border-zinc-200 bg-zinc-50 p-5 dark:border-white/10 dark:bg-zinc-900/70">
                            <p class="font-semibold text-zinc-950 dark:text-white">Interfaz reactiva</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-400">Livewire y Flux para
                                construir flujos de usuario consistentes, accesibles y mantenibles.</p>
                        </div>
                        <div
                            class="rounded-lg border border-zinc-200 bg-zinc-50 p-5 dark:border-white/10 dark:bg-zinc-900/70">
                            <p class="font-semibold text-zinc-950 dark:text-white">Seguridad de cuenta</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-400">Inicio de sesión,
                                registro, perfil, verificación y opciones de segundo factor.</p>
                        </div>
                        <div
                            class="rounded-lg border border-zinc-200 bg-zinc-50 p-5 dark:border-white/10 dark:bg-zinc-900/70">
                            <p class="font-semibold text-zinc-950 dark:text-white">Experiencia visual</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-400">Diseño responsive, modo
                                claro/oscuro y componentes pensados para crecer con el sistema.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    @fluxScripts
</body>

</html>
