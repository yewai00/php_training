<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentService implements StudentServiceInterface {

    /**
     * student dao
     */
    private $studentDao;
    /**
     * Class Constructor
     * @param StudentDaoInterface $studentDao
     * @return void
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * index page show students list
     *
     * @return Object $students
     */
    public function index()
    {
        return $this->studentDao->index();
    }

    /**
     * show create page
     *
     * @return Object majors
     */
    public function create()
    {
        return $this->studentDao->create();
    }

    /**
     * Store a student record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->studentDao->store($request);
    }

    /**
     * show update page
     *
     * @param  int  $id
     * @return  array
     */
    public function edit($id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->studentDao->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->studentDao->destroy($id);
    }
}   