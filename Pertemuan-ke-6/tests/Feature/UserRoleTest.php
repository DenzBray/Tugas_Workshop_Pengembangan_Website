<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_role_can_be_saved_during_creation(): void
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@minimarket.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->assertSame('admin', $user->role);
        $this->assertDatabaseHas('users', [
            'email' => 'admin@minimarket.test',
            'role' => 'admin',
        ]);
    }
}
