<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    /**
     * Create a new user
     */
    function create(array $data): User
    {
        return User::create($data);
    }


    /**
     * Find a user by email
     */
    function findByEmail(string $email): User|null
    {
        return User::where('email', $email)->first();
    }
}
