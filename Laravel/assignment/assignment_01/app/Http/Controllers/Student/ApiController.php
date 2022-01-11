<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use \Illuminate\Validation\Rule;

class ApiController extends Controller
{
    /**
     * student interface
     */
    private $studentInterface;

    /**
     * major interface
     */
    private $majorInterface;

    /**
     * Class Contructor
     * @param StudentServiceInterface $studentServiceInterface,
     * @param MajorServiceInterface $majorInerface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface, MajorServiceInterface $majorInterface)
    {
        $this->studentInterface = $studentServiceInterface;
        $this->majorInterface = $majorInterface;
    }

    /**
     * show index page
     */
    public function showList() {
        return view('ajax.student.index');
    }

    /**
     * show create page
     */
    
    public function showCreate() {
        return view('ajax.student.create');
    }

    /**
     * show edit page
     */
    public function showEdit() {
        return view('ajax.student.edit');
    }

    /**
     * show selected id data
     */
    public function editAjax($id){
        $student = $this->studentInterface->edit($id);
        return $student;
    }

    /**
     * get student list with major
     */
    public function getList() {
        return $this->studentInterface->getStuList()->get();   
    }

    /**
     * get major list
     */
    public function getMajors() {
        return $this->majorInterface->create();
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email',Rule::unique('students')->ignore($id)],
            'phone' => 'required|min:11',
            'address' => 'required',
            'major_id' => 'required'
        ]);
        $this->studentInterface->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentInterface->destroy($id);
    }

}
