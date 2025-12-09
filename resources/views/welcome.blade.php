<x-public-layout>
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-40" src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Restaurant Background">
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                {{ $siteSettings['restaurant_name'] ?? 'Lezzet Durağı' }}
            </h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
                En taze malzemeler ve ustalıkla hazırlanan lezzetler.
            </p>
            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                <a href="{{ route('menu') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 md:py-4 md:text-lg md:px-10">
                    Menüyü İncele
                </a>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Biz Kimiz?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    {{ $siteSettings['about_us'] ?? 'Restoranımız hakkında bilgi...' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Delivery Links Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900">Sipariş Ver</h2>
                <p class="mt-4 text-lg text-gray-500">Favori uygulamanızdan hemen sipariş verin.</p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @if(!empty($siteSettings['trendyol_yemek']))
                    <a href="{{ $siteSettings['trendyol_yemek'] }}" target="_blank" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center flex flex-col items-center">
                         <span class="text-xl font-bold text-orange-600">Trendyol Yemek</span>
                         <span class="mt-2 text-sm text-gray-500">Sipariş ver &rarr;</span>
                    </a>
                @endif
                @if(!empty($siteSettings['migros_yemek']))
                    <a href="{{ $siteSettings['migros_yemek'] }}" target="_blank" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center flex flex-col items-center">
                         <span class="text-xl font-bold text-orange-500">Migros Yemek</span>
                         <span class="mt-2 text-sm text-gray-500">Sipariş ver &rarr;</span>
                    </a>
                @endif
                @if(!empty($siteSettings['getir_yemek']))
                    <a href="{{ $siteSettings['getir_yemek'] }}" target="_blank" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center flex flex-col items-center">
                         <span class="text-xl font-bold text-purple-600">Getir Yemek</span>
                         <span class="mt-2 text-sm text-gray-500">Sipariş ver &rarr;</span>
                    </a>
                @endif
                @if(!empty($siteSettings['yemeksepeti']))
                    <a href="{{ $siteSettings['yemeksepeti'] }}" target="_blank" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center flex flex-col items-center">
                         <span class="text-xl font-bold text-red-600">Yemeksepeti</span>
                         <span class="mt-2 text-sm text-gray-500">Sipariş ver &rarr;</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-public-layout>
