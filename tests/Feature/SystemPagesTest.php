<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_public_pages(): void
    {
        $this->get('/')->assertRedirect('/promotions');
        $this->get('/about')->assertOk();
        $this->get('/promotions')->assertOk();
    }

    public function test_protects_account_and_admin_routes(): void
    {
        $this->get('/account')->assertRedirect('/login');
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_allows_authenticated_access_to_account(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get('/account')->assertOk();
    }
}


