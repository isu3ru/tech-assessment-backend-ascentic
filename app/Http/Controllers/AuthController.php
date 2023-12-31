<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignInRequest;
use App\Http\Requests\UserSignUpRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {
	public function __construct(public AuthService $authService) {
	}

	/**
	 * Process user sign in request and issue token
	 */
	function signIn(UserSignInRequest $request): JsonResponse | ValidationException {
		$token = $this->authService->signIn($request->validated());

		if (!$token && is_bool($token)) {
			return response()->json(['message' => 'Invalid credentials'], 401);
		}

		return response()->json(['token' => $token]);
	}

	/**
	 * Process user sign up request
	 */
	function signUp(UserSignUpRequest $request): JsonResponse | ValidationException {
		[$user, $token] = $this->authService->signUp($request->validated());

		if (!$user) {
			return response()->json(['message' => 'Failed to sign up user'], 500);
		}

		return response()->json(compact('user', 'token'), 201);
	}

	/**
	 * Process user sign out request
	 */
	function signOut(Request $request): JsonResponse {
		$this->authService->signOut($request->user());

		return response()->json(['message' => 'User signed out successfully']);
	}
}
