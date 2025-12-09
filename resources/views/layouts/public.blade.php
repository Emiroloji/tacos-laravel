<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ocakbaşı Lezzet Durağı') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav x-data="{ open: false }" class="bg-white shadow fixed w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <!-- Right Side (Logo & Brand) -->
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                                <img src="data:image/jpeg;base64,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" class="h-10 w-10 rounded-full border-2 border-orange-500 shadow-sm" alt="Logo">
                                <span class="text-2xl font-bold text-orange-600 tracking-tight">{{ config('app.name', 'Ocakbaşı Lezzet Durağı') }}</span>
                            </a>
                        </div>
                        <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-orange-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Anasayfa
                            </a>
                            <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'border-orange-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Menü
                            </a>
                        </div>
                    </div>

                    <!-- Right Side (Buttons) -->
                    <div class="flex items-center space-x-4">
                        <a href="#order-section" class="hidden sm:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full text-white bg-orange-600 hover:bg-orange-700 shadow-sm transition transform hover:scale-105">
                            Sipariş Ver
                        </a>
                        
                        @if(!empty($siteSettings['phone']))
                            <a href="tel:{{ $siteSettings['phone'] }}" class="hidden sm:inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition transform hover:scale-105 mr-2">
                                <svg class="h-4 w-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                {{ $siteSettings['phone'] }}
                            </a>
                        @endif

                        <!-- <div class="hidden sm:flex items-center">
                             <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Giriş</a>
                        </div> -->

                        @if(!empty($siteSettings['address']))
                            <a href="https://maps.google.com/?q={{ urlencode($siteSettings['address']) }}" target="_blank" class="hidden sm:inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition transform hover:scale-105 mr-2">
                                <svg class="h-4 w-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Adres
                            </a>
                        @endif

                        <!-- Hamburger Button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-orange-50 border-orange-500 text-orange-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out">
                        Anasayfa
                    </a>
                    <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'bg-orange-50 border-orange-500 text-orange-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out">
                        Menü
                    </a>
                    <a href="#order-section" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out">
                        Sipariş Ver
                    </a>
                    @if(!empty($siteSettings['phone']))
                        <a href="tel:{{ $siteSettings['phone'] }}" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out flex items-center">
                            <svg class="h-4 w-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Ara: {{ $siteSettings['phone'] }}
                        </a>
                    @endif
                    @if(!empty($siteSettings['address']))
                        <a href="https://maps.google.com/?q={{ urlencode($siteSettings['address']) }}" target="_blank" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out flex items-center">
                            <svg class="h-4 w-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Adres
                        </a>
                    @endif
                    
                    <!-- <a href="{{ route('login') }}" class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out">
                        Giriş Yap
                    </a> -->
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">İletişim</h3>
                    <p>{{ $siteSettings['address'] ?? '' }}</p>
                    <p class="mt-2">{{ $siteSettings['phone'] ?? '' }}</p>
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
