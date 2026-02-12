<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class OfferController extends Controller
{
    /**
     * Show all offers.
     */
    public function index(): View
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show products with a specific offer.
     */
    public function show(string $id): View
    {
        if (!is_numeric($id) || $id < 1) {
            abort(404, 'ID de oferta inválido');
        }

        $offer = Offer::find($id);
        if (!$offer) {
            abort(404, 'Oferta no encontrada');
        }

        $offerProducts = $offer->products()->with(['category'])->get();
        return view('offers.show', compact('offer', 'offerProducts'));
    }

    /**
     * Display a listing of offers for the admin panel.
     */
    public function adminIndex(): View
    {
        $offers = Offer::withCount('products')->orderBy('id')->get();
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new offer.
     */
    public function create(): View
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created offer.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:offers,name',
            'discount_percentage' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = $this->buildUniqueSlug($validated['name']);
        Offer::create($validated);

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Oferta creada exitosamente.');
    }

    /**
     * Show the form for editing an offer.
     */
    public function edit(Offer $offer): View
    {
        return view('admin.offers.edit', compact('offer'));
    }

    /**
     * Update the specified offer.
     */
    public function update(Request $request, Offer $offer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:offers,name,' . $offer->id,
            'discount_percentage' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = $this->buildUniqueSlug($validated['name'], $offer->id);
        $offer->update($validated);

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Oferta actualizada exitosamente.');
    }

    /**
     * Remove the specified offer from storage.
     */
    public function destroy(Offer $offer): RedirectResponse
    {
        if ($offer->products()->exists()) {
            return redirect()
                ->route('admin.offers.index')
                ->with('error', 'No se puede eliminar esta oferta porque tiene productos asociados.');
        }

        $offer->delete();

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Oferta eliminada exitosamente.');
    }

    /**
     * Build a unique slug from the provided offer name.
     */
    private function buildUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $baseSlug = $baseSlug !== '' ? $baseSlug : 'oferta';
        $slug = $baseSlug;
        $counter = 2;

        while (Offer::query()
            ->when($ignoreId !== null, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
