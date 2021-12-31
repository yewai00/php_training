<?php

namespace App\Services\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Dao\Auth\AuthDaoInterface;


class AuthService implements AuthServiceInterface {


    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthDaoInterface $authDaoInterface)
    {
        $this->authInterface = $authDaoInterface;
    }
    
    public function create(array $data) {
        return $this->authInterface->create($data);
    }
}