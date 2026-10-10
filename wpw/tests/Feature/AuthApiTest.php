<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_access_their_profile_and_logout(): void
    {
        $user = User::factory()->create([
            'password' => 'password',
        ]);

        $login = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
            ->assertOk()
            ->assertJsonStructure(['access_token', 'token_type']);

        $token = $login->json('access_token');
        $tokenId = $user->tokens()->firstOrFail()->getKey();

        $this->withToken($token)
            ->getJson('/api/user')
            ->assertOk()
            ->assertJsonPath('id', $user->id);

        $this->withToken($token)
            ->postJson('/api/logout')
            ->assertOk()
            ->assertJsonPath('message', 'Logged out');

        $this->assertDatabaseMissing('personal_access_tokens', ['id' => $tokenId]);

        Auth::forgetGuards();

        $this->withToken($token)
            ->getJson('/api/user')
            ->assertUnauthorized();
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->create([
            'password' => 'password',
        ]);

        $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'incorrect',
        ])
            ->assertUnauthorized()
            ->assertJsonPath('message', 'Invalid credentials');
    }

    public function test_user_profile_requires_authentication(): void
    {
        $this->getJson('/api/user')
            ->assertUnauthorized();
    }
}
