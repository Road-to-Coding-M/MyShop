@php
    // Edit this map to change category images later.
    $categoryImageMap = [
        1 => 'vela3.png',
        2 => 'taza3.png',
        3 => 'manta2.png',
        4 => 'tocadisco3.png',
    ];

    $fallbackImages = ['manta1.png', 'vela1.png', 'tocadisco2.png', 'taza2.png'];
    $imageFile = $categoryImageMap[$category->id] ?? $fallbackImages[array_rand($fallbackImages)];
@endphp

<div class="bg-white rounded-lg shadow-lg p-6 product-card cursor-pointer {{ $class }}">
    <div class="h-40 mb-4 overflow-hidden rounded-md bg-gray-100">
        <img
            src="{{ asset('storage/products/' . $imageFile) }}"
            alt="{{ $category->name }}"
            class="h-full w-full object-cover"
        >
    </div>

    <h4 class="text-xl font-bold mb-2 text-gray-900">{{ $category->name }}</h4>
    <p class="text-gray-600 mb-4">{{ $category->description }}</p>

    <a href="{{ route('categories.show', $category->id) }}"
       class="text-primary-600 font-semibold hover:text-primary-700 transition">
        Ver Productos ->
    </a>
</div>
