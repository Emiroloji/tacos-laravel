<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Hoş Geldiniz!</h3>
                    <p class="mb-6">Buradan sitenizin içeriğini yönetebilirsiniz.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('admin.categories.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                            <h4 class="font-bold text-blue-800">Kategoriler</h4>
                            <p class="text-sm text-blue-600">Menü kategorilerini düzenle.</p>
                        </a>
                        <a href="{{ route('admin.menu.index') }}" class="block p-6 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition">
                            <h4 class="font-bold text-orange-800">Menü Ürünleri</h4>
                            <p class="text-sm text-orange-600">Yemekleri, fiyatları ve resimleri yönet.</p>
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="block p-6 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition">
                            <h4 class="font-bold text-gray-800">Site Ayarları</h4>
                            <p class="text-sm text-gray-600">İletişim, sosyal medya ve linkler.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
