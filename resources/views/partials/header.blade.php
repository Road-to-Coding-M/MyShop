<!-- Carrito de Compras -->
<header class="bg-white shadow-lg relative">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('welcome') }}" class="inline-flex items-center">
                    <img src="{{ asset('storage/products/logo.png') }}" alt="Mi Tienda Logo" class="h-10 w-auto">
                </a>
            </div>

            <!-- Navegacion escritorio -->
            @include('partials.navigation')

            <!-- Carrito + boton hamburguesa -->
            @php
                $cart = session('cart', []);
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
            @endphp
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart.index') }}"
                   class="text-gray-700 hover:text-primary-600 transition">
                    🛒 Carrito ({{ $totalQuantity }})
                </a>
                <button
                    id="mobile-menu-toggle"
                    type="button"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-primary-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                >
                    <span class="sr-only">Abrir menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 mt-4 pt-4 space-y-3" aria-label="Mobile navigation">
            <a href="{{ route('welcome') }}"
               class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('welcome') ? 'text-primary-600 font-semibold' : '' }}">
                Inicio
            </a>
            <a href="{{ route('products.index') }}"
               class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('products.*') ? 'text-primary-600 font-semibold' : '' }}">
                Productos
            </a>
            <a href="{{ route('categories.index') }}"
               class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('categories.*') ? 'text-primary-600 font-semibold' : '' }}">
                Categorias
            </a>
            <a href="{{ route('offers.index') }}"
               class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('offers.*') ? 'text-primary-600 font-semibold' : '' }}">
                Ofertas
            </a>
            <a href="{{ route('contact') }}"
               class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('contact') ? 'text-primary-600 font-semibold' : '' }}">
                Contacto
            </a>
            @auth
                <a href="{{ route('dashboard') }}"
                   class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('dashboard') ? 'text-primary-600 font-semibold' : '' }}">
                    Dashboard
                </a>
            @endauth
            @guest
                <a href="{{ route('login') }}"
                   class="block text-gray-700 hover:text-primary-600 transition {{ request()->routeIs('login') ? 'text-primary-600 font-semibold' : '' }}">
                    Login
                </a>
            @endguest
        </div>
    </div>
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('mobile-menu-toggle');
            const menu = document.getElementById('mobile-menu');

            if (!toggle || !menu) return;

            toggle.addEventListener('click', function () {
                const nowHidden = menu.classList.toggle('hidden');
                toggle.setAttribute('aria-expanded', String(!nowHidden));
            });
        });
    </script>
@endpush
