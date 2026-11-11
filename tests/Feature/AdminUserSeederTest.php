<?php

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    config([
        'database.default' => 'sqlite',
        'database.connections.sqlite.database' => ':memory:',
    ]);
    DB::purge('sqlite');

    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('role')->default('user');
        $table->timestamps();
    });
});

it('can be run repeatedly without creating duplicate admin accounts', function () {
    $this->seed(AdminUserSeeder::class);
    $this->seed(AdminUserSeeder::class);

    $admin = User::query()->where('email', 'admin@example.com')->sole();

    expect($admin->name)->toBe('Admin')
        ->and($admin->role)->toBe('admin')
        ->and(Hash::check('password123', $admin->password))->toBeTrue();
});

it('does not overwrite an existing account with the admin email', function () {
    $existingUser = User::query()->create([
        'name' => 'Existing account',
        'email' => 'admin@example.com',
        'password' => Hash::make('existing-password'),
        'role' => 'user',
    ]);

    $this->seed(AdminUserSeeder::class);

    expect(User::query()->where('email', 'admin@example.com')->count())->toBe(1)
        ->and($existingUser->fresh()->name)->toBe('Existing account')
        ->and($existingUser->fresh()->role)->toBe('user')
        ->and(Hash::check('existing-password', $existingUser->fresh()->password))->toBeTrue();
});
