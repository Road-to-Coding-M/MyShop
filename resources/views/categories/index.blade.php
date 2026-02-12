@extends('layouts.public')
@section('title', 'Categorías - Mi Tienda')
@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Nuestras Categorías</h1>
            <p class="text-gray-600">Explora nuestros productos por categoría.</p>
        </div>

        <div class="mb-6">
            <label for="category-search" class="block text-sm font-medium text-gray-700 mb-2">
                Buscar categoría
            </label>
            <input
                type="search"
                id="category-search"
                placeholder="Buscar categoría..."
                class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-primary-500 focus:outline-none focus:ring-1 focus:ring-primary-500"
            >
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="categories-grid">
            @forelse($categories as $category)
                <div class="category-item" data-category-name="{{ \Illuminate\Support\Str::lower($category->name) }}">
                    <x-category-card :category="$category" />
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No hay categorías disponibles.</p>
                </div>
            @endforelse
        </div>

        <div id="category-no-results" class="hidden text-center py-12">
            <p class="text-gray-500 text-lg">No se encontraron categorías con ese nombre.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('category-search');
            const categoryItems = Array.from(document.querySelectorAll('.category-item'));
            const noResults = document.getElementById('category-no-results');

            if (!searchInput || categoryItems.length === 0 || !noResults) {
                return;
            }

            searchInput.addEventListener('input', function (event) {
                const keyword = event.target.value.toLowerCase().trim();
                let visibleCount = 0;

                categoryItems.forEach(function (item) {
                    const categoryName = item.dataset.categoryName || '';
                    const isMatch = keyword === '' || categoryName.includes(keyword);

                    item.classList.toggle('hidden', !isMatch);

                    if (isMatch) {
                        visibleCount += 1;
                    }
                });

                noResults.classList.toggle('hidden', visibleCount !== 0);
            });
        });
    </script>
@endpush
