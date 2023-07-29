<?php

namespace App\Http\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService {
	public function __construct(public UserRepository $userRepository) {
	}

	/**
	 * Sign in a user
	 */
	function signIn(array $data): string | bool {
		$user = $this->userRepository->findByEmail($data['email']);

		if (!$user || !Hash::check($data['password'], $user->password)) {
			return false;
		}

		return $user->createToken('auth_token')->plainTextToken;
	}

	/**
	 * Sign up a user
	 */
	function signUp(array $data): array
	{
		$user = $this->userRepository->create($data);
		$token = $user->createToken('auth_token')->plainTextToken;
		return [$user, $token];
	}

	/**
	 * Sign out a user
	 */
	function signOut(User $user): void {
		$user->currentAccessToken()->delete();
	}
}
