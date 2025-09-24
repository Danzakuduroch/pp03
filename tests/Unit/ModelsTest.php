<?php

namespace Tests\Unit;

use App\Models\Promotion;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_is_hashed_by_cast(): void
    {
        $user = User::factory()->create(['password' => 'secret123']);
        $this->assertNotSame('secret123', $user->getAttributes()['password']);
    }

    public function test_user_has_many_reviews_relation(): void
    {
        $user = User::factory()->create();
        Review::factory()->count(2)->create(['user_id' => $user->id]);
        $this->assertSame(2, $user->reviews()->count());
    }

    public function test_promotion_fillable_create(): void
    {
        $promotion = Promotion::create([
            'title' => 'Test',
            'description' => 'desc',
            'image' => '/img.png',
        ]);
        $this->assertTrue($promotion->exists);
    }
}


