<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
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
    public function __construct(StudentServiceInterface $studentServiceInterface, MajorServiceInterface $majorInerface)
    {
        $this->studentInterface = $studentServiceInterface;
        $this->majorInterface = $majorInerface;
    }

    /**
     * index page show students list
     *
     * @return url to index with Object $students
     */
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('student.index', compact('students'));
    }

    /**
     * get major list
     *
     * @return Object majors
     */
    public function create()
    {
        $majors = $this->majorInterface->create();
        return view('student.create', compact('majors'));
    }

    /**
     * Store a student record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect to index with message.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            'address' => 'required',
            'major_id' => 'required'
        ]);
        $this->studentInterface->store($request);
        return redirect('/students')->with('success', 'You have successfully created');
    }

    /**
     * show update page
     *
     * @param  int  $id
     * @return  Object student , majors
     */
    public function edit($id)
    {   
        $student = $this->studentInterface->edit($id);
        //get major list
        $majors = $this->majorInterface->create();
        return view('student.edit', compact('student', 'majors'));
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
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            'address' => 'required',
            'major_id' => 'required'
        ]);
        $this->studentInterface->update($request, $id);
        return redirect('/students')->with('success','You have successfully updated.');
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
        return redirect('/students')->with('success','You have successfully deleted.');
    }

    /**
     * download as excel file from student table
     * 
     */
    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    /**
     * import data to student table
     * @param Request $request
     * @return url to students page
     */
    public function import(Request $request) 
    {   
        $request->validate([
            'import_file' => 'required',
        ]);
        $this->studentInterface->import($request);
        return redirect('/students')->with('success','You have successfully imported.');;
    }
}
