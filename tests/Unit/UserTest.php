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
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->make();
        $user = User::factory()->create();
        $data = [
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'role' => fake()->randomElement(UserRole::toArray()),
        ];

        $response = $this->actingAs($admin)->put(route('userUpdate', $user), $data);

        $response->assertSessionHas('success');
    }

    public function test_error_update_own_role()
    {
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->create();
        $data = [
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'role' => UserRole::USER()->getValue(),
        ];

        $response = $this->actingAs($admin)->put(route('userUpdate', $admin), $data);

        $response->assertSessionHas('error', 'Unable to change your own role!');
    }

    public function test_delete()
    {
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->make();
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->delete(route('userDelete', $user));

        $response->assertSessionHas('success');
        $this->assertSoftDeleted($user);
    }

    public function test_error_delete_own_account()
    {
        $admin = User::factory()->state([
            'role' => UserRole::ADMIN()->getValue(),
        ])->create();

        $response = $this->actingAs($admin)->delete(route('userDelete', $admin));

        $response->assertSessionHas('error', 'Unable to delete your own account!');
    }

    public function test_unauthorized_user_role()
    {
        $user = User::factory()->state([
            'role' => UserRole::USER()->getValue(),
        ])->make();

        $response = $this->actingAs($user)->get(route('userList'));

        $response->assertSessionHas('error', 'Permission denied!');
        $response->assertRedirect(route('articleList'));
    }
}
