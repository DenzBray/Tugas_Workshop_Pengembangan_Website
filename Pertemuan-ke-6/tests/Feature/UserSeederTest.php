<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_seeder_is_idempotent(): void
    {
        $seeder = new UserSeeder;

        $seeder->run();
        $seeder->run();

        $this->assertDatabaseCount('users', 2);
    }
}
