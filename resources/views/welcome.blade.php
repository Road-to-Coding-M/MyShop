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
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 product-card cursor-pointer">
                    <div class="text-4xl text-primary-500 mb-4">📦</div>
                    <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">VELA</h4>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Esta vela con su olor parecera que estás en una cabaña dentro de los Alpes.
                    </p>
                    <button class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        Ver Productos →
                    </button>s
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 product-card cursor-pointer">
                    <div class="text-4xl text-primary-500 mb-4">🛍️</div>
                    <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">TAZA</h4>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Con esta taza, podrás prepararte un chocolate caliente y se mantendrá caliente durante horas.
                    </p>
                    <button class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        Ver Productos →
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 product-card cursor-pointer">
                    <div class="text-4xl text-primary-500 mb-4">⭐</div>
                    <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">MANTA</h4>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Esta manta a cuadro y pelito te mantiene caliente.
                    </p>
                    <button class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        Ver Productos →
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 product-card cursor-pointer">
                    <div class="text-4xl text-primary-500 mb-4">🎯</div>
                    <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">TOCADISCO</h4>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Con este tocadisco podrás escuchar canciónes que te haga relajarte.
                    </p>
                    <button class="text-primary-600 font-semibold hover:text-primary-700 transition">
                        Ver Productos →
                    </button>
                </div>

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
                
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden product-card">
                    <div class="h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <span class="text-4xl">📦</span>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Producto 1</h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Descripción del primer producto</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-primary-600">€XX</span>
                            <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                                Añadir al Carrito
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden product-card">
                    <div class="h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <span class="text-4xl">🛍️</span>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Producto 2</h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Descripción del segundo producto</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-primary-600">€XX</span>
                            <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                                Añadir al Carrito
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden product-card">
                    <div class="h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <span class="text-4xl">⭐</span>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Producto 3</h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Descripción del tercer producto</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-primary-600">€XX</span>
                            <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                                Añadir al Carrito
                            </button>
                        </div>
                    </div>
                </div>

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
