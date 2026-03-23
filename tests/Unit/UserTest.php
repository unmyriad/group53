<?php

use App\Models\User;
use App\enums\UserRole;

test('is User Admin?', function () {
    $user = new User();
    $user->role = UserRole::Admin;

    expect($user->role)->toBe(UserRole::Admin);
});

test('is User Customer?', function () {
    $user = new User();
    $user->role = UserRole::Customer;

    expect($user->role)->toBe(UserRole::Customer);
});
