<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-orange-600">
                                {{ $siteSettings['restaurant_name'] ?? config('app.name') }}
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-orange-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Anasayfa
                            </a>
                            <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'border-orange-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Menü
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Panel</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Giriş</a>
                        @endauth
                    </div>
                </div>
            </div>
            <!-- Mobile menu placeholder (optional) -->
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">İletişim</h3>
                    <p>{{ $siteSettings['address'] ?? '' }}</p>
                    <p class="mt-2">{{ $siteSettings['phone'] ?? '' }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Takip Edin</h3>
                    <div class="flex space-x-4">
                        @if(!empty($siteSettings['instagram']))
                            <a href="{{ $siteSettings['instagram'] ?? '#' }}" target="_blank" class="hover:text-orange-400">Instagram</a>
                        @endif
                        @if(!empty($siteSettings['facebook']))
                            <a href="{{ $siteSettings['facebook'] ?? '#' }}" target="_blank" class="hover:text-orange-400">Facebook</a>
                        @endif
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Hakkımızda</h3>
                    <p class="text-sm text-gray-400">{{ \Illuminate\Support\Str::limit($siteSettings['about_us'] ?? '', 100) }}</p>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-4 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ $siteSettings['restaurant_name'] ?? 'Restaurant' }}. Tüm hakları saklıdır.
            </div>
        </footer>
    </div>
</body>
</html>
