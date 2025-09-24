<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthAndReviewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_and_login(): void
    {
        $response = $this->post('/register', [
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertRedirect('/account');

        $this->post('/logout');

        $response = $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'password',
        ]);
        $response->assertRedirect('/account');
    }

    public function test_auth_user_can_post_review(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/reviews', [
            'text' => 'Отличное место!',
        ]);

        $response->assertRedirect(route('about'));
        $this->assertDatabaseHas('reviews', [
            'text' => 'Отличное место!',
            'user_id' => $user->id,
        ]);
    }
}


