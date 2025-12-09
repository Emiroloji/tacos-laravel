<x-public-layout>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Menü</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Lezzet dolu menümüzü keşfedin.
                </p>
            </div>

            <div class="mt-12 space-y-16">
                @foreach($categories as $category)
                    @if($category->menuItems->count() > 0)
                        <section>
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-2">{{ $category->name }}</h3>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                @foreach($category->menuItems as $item)
                                    <div class="group relative flex flex-col">
                                        <div class="w-full min-h-60 bg-gray-200 rounded-lg overflow-hidden aspect-w-1 aspect-h-1 group-hover:opacity-75 lg:h-80">
                                            @if($item->image_path)
                                                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}" class="w-full h-full object-center object-cover">
                                            @else
                                                <div class="flex items-center justify-center h-full text-gray-400">
                                                    Resim Yok
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-4 flex justify-between">
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">
                                                    {{ $item->name }}
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->description }}</p>
                                            </div>
                                            <p class="text-lg font-medium text-gray-900">{{ number_format($item->price, 2) }} ₺</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-public-layout>
