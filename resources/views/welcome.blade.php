@extends('layouts.public')

@section('title', 'Bienvenido a Hygge')

@push('styles')
<style>
.hero-gradient {
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient text-blue-300 py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Bienvenido a Hygge
            </h2>
            <p class="text-xl md:text-2xl text-blue-300 mb-8 max-w-3xl mx-auto">
                Bienvenido a tu mejor momento de felicidad
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-white text-primary-600 font-bold py-4 px-8 rounded-full hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105">
                    Ver Productos
                </button>
                <button class="border-2 border-white text-white font-bold py-4 px-8 rounded-full hover:bg-white hover:text-primary-600 transition duration-300 ease-in-out">
                    Ofertas Especiales
                </button>
            </div>
        </div>
    </section>

            <!-- Categorías de Productos -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900 dark:text-white">
                Nuestras Categorías
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredCategories as $category)
                    <x-category-card :category="$category" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay categorías disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
<!-- Productos Destacados -->
    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-12 text-center text-gray-900 dark:text-white">
                Productos Destacados
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredProducts as $product)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden product-card">
                        <div class="h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl">📦</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">{{ $product->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $product->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    @if($product->offer)
                                        <span class="text-sm text-gray-400 line-through">€{{ number_format($product->price, 2) }}</span>
                                        <span class="text-2xl font-bold text-orange-600">€{{ number_format($product->final_price, 2) }}</span>
                                    @else
                                        <span class="text-2xl font-bold text-primary-600">€{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('products.show', $product->id) }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay productos destacados disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

    @push('scripts')
     <script>
         // Toggle dark mode functionality
         function toggleDarkMode() {
             document.documentElement.classList.toggle('dark');
             localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
             
             // Cambiar el icono según el modo para ambos botones
             const toggleButton = document.getElementById('darkModeToggle');
             const toggleButtonDesktop = document.getElementById('darkModeToggleDesktop');
             
             if (document.documentElement.classList.contains('dark')) {
                 if (toggleButton) toggleButton.innerHTML = '☀️';
                 if (toggleButtonDesktop) toggleButtonDesktop.innerHTML = '☀️';
             } else {
                 if (toggleButton) toggleButton.innerHTML = '🌙';
                 if (toggleButtonDesktop) toggleButtonDesktop.innerHTML = '🌙';
             }
         }

        // Toggle mobile menu functionality
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuToggle = document.getElementById('mobileMenuToggle');
            
            mobileMenu.classList.toggle('hidden');
            
            // Cambiar el icono del botón
            if (mobileMenu.classList.contains('hidden')) {
                menuToggle.innerHTML = `
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                `;
            } else {
                menuToggle.innerHTML = `
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                `;
            }
        }

         // Check for saved dark mode preference
         document.addEventListener('DOMContentLoaded', function() {
             if (localStorage.getItem('darkMode') === 'true') {
                 document.documentElement.classList.add('dark');
                 const toggleButton = document.getElementById('darkModeToggle');
                 const toggleButtonDesktop = document.getElementById('darkModeToggleDesktop');
                 if (toggleButton) toggleButton.innerHTML = '☀️';
                 if (toggleButtonDesktop) toggleButtonDesktop.innerHTML = '☀️';
             }
             
             // Configurar los botones
             const toggleButton = document.getElementById('darkModeToggle');
             const toggleButtonDesktop = document.getElementById('darkModeToggleDesktop');
             if (toggleButton) toggleButton.onclick = toggleDarkMode;
             if (toggleButtonDesktop) toggleButtonDesktop.onclick = toggleDarkMode;
             document.getElementById('mobileMenuToggle').onclick = toggleMobileMenu;
         });
    </script>
    @endpush
