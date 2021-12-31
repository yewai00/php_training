<?php

namespace App\Dao\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Contracts\Dao\Auth\AuthDaoInterface;

class AuthDao implements AuthDaoInterface {

    /**
     * create user
     * @param array $data
     * @return boolean
     */
    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
    }
}