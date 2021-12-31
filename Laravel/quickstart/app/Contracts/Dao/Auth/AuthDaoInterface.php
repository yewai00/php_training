<?php

namespace App\Contracts\Dao\Auth;

/**
 * Interface of Data Access Object for Authentication
 */
interface AuthDaoInterface
{
    /**
     * create user
     * @param array $data
     * @return boolean
     */
    public function create(array $data);
}