@extends('layouts.public')
@section('title', 'Productos en Oferta - Mi Tienda')
@push('styles')
<style>
.product-grid {
display: grid;
grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
gap: 2rem;
}
</style>
@endpush
@section('content')
<div class="container mx-auto px-6 py-8">
<div class="mb-8">
<h1 class="text-3xl font-bold text-gray-900 mb-4">Productos en Oferta</h1>
<p class="text-gray-600">Aprovecha nuestros descuentos especiales por tiempo limitado.</p>
</div>
<div class="product-grid">
@forelse($productsOnSale as $product)
<x-product-card :product="$product" />
@empty
<div class="col-span-full text-center py-12">
<p class="text-gray-500 text-lg">No hay productos en oferta en este momento.</p>
</div>
@endforelse
</div>
</div>
@endsection
