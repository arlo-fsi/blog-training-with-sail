<?php

namespace Tests\Unit;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_list()
    {
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->make();

        $response = $this->actingAs($admin)->get(route('userList'));

        $response->assertStatus(200);
        $response->assertSee('Users');
    }

    public function test_create()
    {
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->make();
        $username = fake()->userName();
        $password = Str::random(6);
        $data = [
            'username' => $username,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'password' => $password,
            'password_confirmation' => $password,
            'role' => fake()->randomElement(UserRole::values()),
        ];

        $response = $this->actingAs($admin)->post(route('userCreate'), $data);

        $response->assertSessionHas('success');
    }

    public function test_update()
    {
        $this->assertTrue(true);
    }

    public function test_delete()
    {
        $this->assertTrue(true);
    }

    public function test_unauthorized_user_role()
    {
        $this->assertTrue(true);
    }
}
