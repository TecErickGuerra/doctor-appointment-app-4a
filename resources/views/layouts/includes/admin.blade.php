@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => [],
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/694ed5701c.js" crossorigin="anonymous"></script>
        <!-- WireUI -->
        <wireui:scripts />
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-50">
        @include('layouts.includes.admin.navigation')
        @include('layouts.includes.admin.sidebar')
        
        <div class="p-4 sm:ml-64">
            {{-- Breadcrumb y botón de acción --}}
            <div class="mt-14 flex items-center justify-between w-full mb-6">
                @include('layouts.includes.admin.breadcrumb')
                
                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset
            </div>

            {{-- Mensajes Flash --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg flex items-center" role="alert">
                    <i class="fa-solid fa-check-circle text-xl mr-3"></i>
                    <div>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" class="ml-auto text-green-700 hover:text-green-900">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center" role="alert">
                    <i class="fa-solid fa-exclamation-circle text-xl mr-3"></i>
                    <div>
                        <p class="font-medium">{{ session('error') }}</p>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" class="ml-auto text-red-700 hover:text-red-900">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            @endif

            @if (session('warning'))
                <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-lg flex items-center" role="alert">
                    <i class="fa-solid fa-exclamation-triangle text-xl mr-3"></i>
                    <div>
                        <p class="font-medium">{{ session('warning') }}</p>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" class="ml-auto text-yellow-700 hover:text-yellow-900">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            @endif

            {{-- Contenido principal --}}
            {{ $slot }}
        </div>

        @stack('modals')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    </body>
</html>