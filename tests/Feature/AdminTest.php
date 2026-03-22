<?php

use App\Models\User;

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