<?php 

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;

class MajorService implements MajorServiceInterface {

    /**
     * major dao
     */
    private $majorDao;
    /**
     * Class Constructor
     * @param MajorDaoInterface $majorDao
     * @return void
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }
    /**
     * get major list
     *
     * @return Object majors
     */
    public function create()
    {
        return $this->majorDao->create();
    }

}