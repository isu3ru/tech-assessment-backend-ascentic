<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase {
	use RefreshDatabase;

	/**
	 * Create a new user for testing purposes.
	 */
	private function createUser(): User {
		return User::factory()->create([
			'email' => 'isu3ru@gmail.com',
			'password' => bcrypt('password'),
		]);
	}

	/**
	 * Test user sign-in with valid credentials.
	 */
	public function testSignInSuccess(): void {
		$user = $this->createUser();

		// Replace the route, payload, and expected response data with your actual implementation.
		$response = $this->postJson('/api/signin', [
			'email' => $user->email,
			'password' => 'password',
		]);

		$response->assertStatus(200)
			->assertJsonStructure(['token']);
	}

	/**
	 * Test user sign-in with invalid credentials.
	 */
	public function testSignInFailureOnInvalidCredentials(): void {
		// Replace the route with your actual implementation for invalid credentials.
		$response = $this->postJson('/api/signin', [
			'email' => 'invalid_email@example.com',
			'password' => 'wrong_password',
		]);

		$response->assertStatus(401)
			->assertJson([
				'message' => 'Invalid credentials',
			]);
	}

	/**
	 * Test user sign-up with valid credentials.
	 */
	public function testSignUpSuccess(): void {
		// Replace the route, payload, and expected response data with your actual implementation.
		$response = $this->postJson('/api/signup', [
			'name' => 'John Doe',
			'email' => 'john@doe.com',
			'password' => 'password',
		]);

		$response->assertStatus(201)
			->assertJsonStructure(['user']);

		// check if user from $response exists in database
		$this->assertDatabaseHas('users', [
			'email' => $response['user']['email'],
		]);
	}

	/**
	 * Test user sign-up with invalid/missing credentials.
	 */
	public function testSignUpFailureOnInvalidCredentials(): void {
		// Replace the route with your actual implementation for invalid credentials.
		$response = $this->postJson('/api/signup', [
			'name' => 'John Doe',
			'email' => '',
			'password' => 'password',
		]);

		$response->assertStatus(422)
			->assertJsonValidationErrors(['email']);
	}

	/**
	 * Test user sign-out.
	 */
	public function testSignOut(): void {
		$user = $this->createUser();

		// sign in the user
		$token = $this->postJson('/api/signin', [
			'email' => $user->email,
			'password' => 'password',
		])->json('token');

		// sign out
		$response = $this->withHeaders([
			'Authorization' => 'Bearer ' . $token,
		])->postJson('/api/signout');

		$response->assertStatus(200)
			->assertJson([
				'message' => 'User signed out successfully',
			]);
	}
}
