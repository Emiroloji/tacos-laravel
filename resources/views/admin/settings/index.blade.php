<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Site Ayarları
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- General Info -->
                            <div class="col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Genel Bilgiler</h3>
                            </div>
                            
                            <div>
                                <x-input-label for="restaurant_name" :value="__('Restoran Adı')" />
                                <x-text-input id="restaurant_name" class="block mt-1 w-full" type="text" name="restaurant_name" :value="$settings['restaurant_name'] ?? ''" required />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Telefon Numarası')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$settings['phone'] ?? ''" />
                            </div>

                            <div class="col-span-2">
                                <x-input-label for="address" :value="__('Adres')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$settings['address'] ?? ''" />
                            </div>

                            <div class="col-span-2">
                                <x-input-label for="about_us" :value="__('Hakkımızda')" />
                                <textarea id="about_us" name="about_us" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ $settings['about_us'] ?? '' }}</textarea>
                            </div>

                            <!-- Social Media -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Sosyal Medya</h3>
                            </div>

                            <div>
                                <x-input-label for="instagram" :value="__('Instagram URL')" />
                                <x-text-input id="instagram" class="block mt-1 w-full" type="url" name="instagram" :value="$settings['instagram'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="facebook" :value="__('Facebook URL')" />
                                <x-text-input id="facebook" class="block mt-1 w-full" type="url" name="facebook" :value="$settings['facebook'] ?? ''" />
                            </div>

                            <!-- Delivery Links -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Sipariş Linkleri</h3>
                            </div>

                            <div>
                                <x-input-label for="trendyol_yemek" :value="__('Trendyol Yemek URL')" />
                                <x-text-input id="trendyol_yemek" class="block mt-1 w-full" type="url" name="trendyol_yemek" :value="$settings['trendyol_yemek'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="migros_yemek" :value="__('Migros Yemek URL')" />
                                <x-text-input id="migros_yemek" class="block mt-1 w-full" type="url" name="migros_yemek" :value="$settings['migros_yemek'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="getir_yemek" :value="__('Getir Yemek URL')" />
                                <x-text-input id="getir_yemek" class="block mt-1 w-full" type="url" name="getir_yemek" :value="$settings['getir_yemek'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="yemeksepeti" :value="__('Yemeksepeti URL')" />
                                <x-text-input id="yemeksepeti" class="block mt-1 w-full" type="url" name="yemeksepeti" :value="$settings['yemeksepeti'] ?? ''" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Kaydet') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
