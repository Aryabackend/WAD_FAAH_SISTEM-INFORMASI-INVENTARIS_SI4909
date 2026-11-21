<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_opening_supplier_page(): void
    {
        $response = $this->get('/supplier');

        $response->assertRedirect(route('login'));
    }

    public function test_user_can_register_and_is_authenticated(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Pengguna Gudang',
            'email' => 'gudang@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ]);

        $response->assertRedirect(route('supplier.index'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Pengguna Gudang',
            'email' => 'gudang@example.com',
        ]);
        $storedPassword = User::where('email', 'gudang@example.com')->value('password');
        $this->assertNotSame('Password123', $storedPassword);
        $this->assertTrue(password_verify('Password123', $storedPassword));
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'Password123',
        ]);

        $response = $this->post(route('login.store'), [
            'email' => 'USER@example.com',
            'password' => 'Password123',
        ]);

        $response->assertRedirect(route('supplier.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'Password123',
        ]);

        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => 'user@example.com',
            'password' => 'password-salah',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
