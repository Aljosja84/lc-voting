<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_check_if_user_is_an_administrator()
    {
        $user = User::factory()->make([
           'name' => 'Gabriel',
           'email' => 'gabriel@gressie.net'
        ]);

        $anotherUser = User::factory()->make([
            'name' => 'Gabriel',
            'email' => 'user@password.com'
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($anotherUser->isAdmin());
    }
}
