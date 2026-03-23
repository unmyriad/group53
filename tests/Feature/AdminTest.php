<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

// Security - Authorisation

it('checks if only admin users can access restricted pages', function() {
    $user = User::factory()->create();
    $admin = User::factory() -> createAdminUser() -> create();

    // Route to admin dashboard - guest, user, admin
    $guest_response = $this
        ->get(route('admin.dashboard'));

    $user_response = $this->actingAs($user)
        ->get(route('admin.dashboard'));

    $admin_response = $this->actingAs($admin)
        ->get(route('admin.dashboard'));

    // Assertions - checks if only admin can access dashboard
    $guest_response -> assertRedirect('login'); // should be redirected to login
    $user_response -> assertStatus(403); // should be forbidden
    $admin_response -> assertOk();
});

// Integration Testing

it('checks if admin users can add product to inventory', function() {

    $admin = User::factory()->createAdminUser()->create();
    $product = Product::factory()->make();

    // Route to adding product to inventory

    $response = $this->actingAs($admin)
        -> post(route('admin.inventory.store', $product->toArray()));

    // Assertions - checks if recently added product exists (route call to inventory creates a product)
    
    $this->assertDatabaseHas('inventory_transactions', [
        'product_id' => Product::latest('product_id') -> first() -> product_id,
        'user_id' => $admin -> user_id
    ]);

});

// Security - Validation

it('checks if invalid data when creating products are rejected', function() {

    $admin = User::factory()->createAdminUser()->create();

    $product = [
        'category_id' => Category::factory() -> create() -> category_id,
        'product_name' => fake() -> words(3, true),
        'description' => fake() -> sentence(),
        'price' => -10.00,
        'stock_quantity' => fake() -> numberBetween(1,10),
        'image_url' => 'https://placehold.co/800x600?text=' . 'Fish+Item',
        'brand' => fake() -> word(),
        'pet_type' => 'Fish'
    ];

    // Route to adding product in inventory with price in negatives

    $response = $this->actingAs($admin)
        -> post(route('admin.inventory.store', $product));

    // Assertions - Checks if product creation in inventory was not created
    
    $this->assertDatabaseMissing('inventory_transactions', [
        'category_id' => $product['category_id'],
        'price' => $product['price'],
        'user_id' => $admin -> user_id
    ]);
});
