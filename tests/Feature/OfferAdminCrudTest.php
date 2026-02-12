<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OfferAdminCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_when_accessing_admin_offers_routes(): void
    {
        $offer = Offer::create([
            'name' => 'Oferta Inicial',
            'slug' => 'oferta-inicial',
            'discount_percentage' => 10,
            'description' => 'Oferta base',
        ]);

        $this->get(route('admin.offers.index'))
            ->assertRedirect(route('login'));

        $this->get(route('admin.offers.create'))
            ->assertRedirect(route('login'));

        $this->get(route('admin.offers.edit', $offer))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_admin_offers_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.offers.index'))
            ->assertOk();
    }

    public function test_authenticated_user_can_create_offer_with_auto_slug(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.offers.store'), [
                'name' => 'Mega Oferta de Invierno',
                'discount_percentage' => 25,
                'description' => 'Descuentos por temporada',
            ])
            ->assertRedirect(route('admin.offers.index'));

        $this->assertDatabaseHas('offers', [
            'name' => 'Mega Oferta de Invierno',
            'slug' => 'mega-oferta-de-invierno',
            'discount_percentage' => 25,
        ]);
    }

    public function test_slug_is_uniquely_generated_when_slug_base_collides(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.offers.store'), [
                'name' => 'Oferta Especial',
                'discount_percentage' => 15,
                'description' => null,
            ])
            ->assertRedirect(route('admin.offers.index'));

        $this->actingAs($user)
            ->post(route('admin.offers.store'), [
                'name' => 'Oferta Especial!!!',
                'discount_percentage' => 20,
                'description' => null,
            ])
            ->assertRedirect(route('admin.offers.index'));

        $this->assertDatabaseHas('offers', ['slug' => 'oferta-especial']);
        $this->assertDatabaseHas('offers', ['slug' => 'oferta-especial-2']);
    }

    public function test_offer_update_regenerates_slug_and_keeps_it_unique(): void
    {
        $user = User::factory()->create();

        $primaryOffer = Offer::create([
            'name' => 'Oferta Estrella',
            'slug' => 'oferta-estrella',
            'discount_percentage' => 10,
            'description' => null,
        ]);

        $offerToUpdate = Offer::create([
            'name' => 'Oferta Secundaria',
            'slug' => 'oferta-secundaria',
            'discount_percentage' => 8,
            'description' => null,
        ]);

        $this->actingAs($user)
            ->put(route('admin.offers.update', $offerToUpdate), [
                'name' => 'Oferta Estrella!!!',
                'discount_percentage' => 18,
                'description' => 'Actualizada',
            ])
            ->assertRedirect(route('admin.offers.index'));

        $this->assertDatabaseHas('offers', [
            'id' => $primaryOffer->id,
            'slug' => 'oferta-estrella',
        ]);

        $this->assertDatabaseHas('offers', [
            'id' => $offerToUpdate->id,
            'slug' => 'oferta-estrella-2',
            'discount_percentage' => 18,
        ]);
    }

    public function test_offer_with_related_products_cannot_be_deleted(): void
    {
        $user = User::factory()->create();

        $offer = Offer::create([
            'name' => 'Oferta en Uso',
            'slug' => 'oferta-en-uso',
            'discount_percentage' => 30,
            'description' => null,
        ]);

        $category = Category::create([
            'name' => 'Categoría de Prueba',
            'slug' => 'categoria-de-prueba',
            'description' => null,
        ]);

        Product::create([
            'name' => 'Producto Asociado',
            'description' => 'Producto para prueba de borrado',
            'image' => null,
            'price' => 99.99,
            'category_id' => $category->id,
            'offer_id' => $offer->id,
        ]);

        $this->actingAs($user)
            ->delete(route('admin.offers.destroy', $offer))
            ->assertRedirect(route('admin.offers.index'))
            ->assertSessionHas('error');

        $this->assertDatabaseHas('offers', ['id' => $offer->id]);
    }

    public function test_offer_without_related_products_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $offer = Offer::create([
            'name' => 'Oferta Eliminable',
            'slug' => 'oferta-eliminable',
            'discount_percentage' => 5,
            'description' => null,
        ]);

        $this->actingAs($user)
            ->delete(route('admin.offers.destroy', $offer))
            ->assertRedirect(route('admin.offers.index'));

        $this->assertDatabaseMissing('offers', ['id' => $offer->id]);
    }
}
