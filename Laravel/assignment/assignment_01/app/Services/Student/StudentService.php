<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Dao\Student\StudentDao;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

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
     * @param Request $request
     * @return Object $students
     */
    public function index(Request $request)
    {
        return $this->studentDao->index($request);
    }

    /**
     * get students list with major
     */
    public function getStuList(){
        return $this->studentDao->getStuList();
    }

     /**
     * get students list
     */
    public function getlist() 
    {
        return $this->studentDao->getlist();
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

    /**
     * download as excel file from student table
     * 
     */
    public function export() 
    {
       return Excel::download(new StudentsExport($this->studentDao->export()), 'students.xlsx');
    }

    /**
     * import data to students table
     * @param Request $request
     */
    public function import(Request $request)
    {
        return $this->studentDao->import($request);
    }

     /**
     * send mail
     * @param string $email 
     * @param object $mail
     */
    public function sendMail(string $email,object $mail) {
        Mail::to($email)->send($mail);
    }
}   