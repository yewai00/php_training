<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface AuthServiceInterface {
    /**
     * create user
     * @param array $data
     * @return boolean
     */
    public function create(array $data);
}