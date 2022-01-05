<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface {
    /**
     * get major list
     *
     * @return Object majors
     */
    public function create()
    {
        $majors = Major::all();
        return $majors;
    }
}