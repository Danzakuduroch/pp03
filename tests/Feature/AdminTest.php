<?php

namespace Tests\Feature;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_and_edit_promotion(): void
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $create = $this->post(route('admin.promotions.store'), [
            'title' => 'New Promo',
            'description' => 'Desc',
            'image' => '/img.png',
        ]);
        $create->assertRedirect(route('admin.promotions.index'));
        $promotion = Promotion::first();

        $update = $this->put(route('admin.promotions.update', $promotion), [
            'title' => 'Updated',
            'description' => 'Desc2',
            'image' => '/img2.png',
        ]);
        $update->assertRedirect(route('admin.promotions.index'));
    }

    public function test_admin_can_topup_user_balance(): void
    {
        $admin = User::factory()->create();
        $user = User::factory()->create(['balance' => 0]);
        $this->actingAs($admin);

        $resp = $this->post(route('admin.users.topup', $user), [
            'amount' => 150,
        ]);
        $resp->assertRedirect(route('admin.users.index'));

        $user->refresh();
        $this->assertSame(150, $user->balance);
    }
}


