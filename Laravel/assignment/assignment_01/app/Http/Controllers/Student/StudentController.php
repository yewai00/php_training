<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use \Illuminate\Validation\Rule;
use App\Mail\WelcomeMail;
use App\Mail\TopStudentsList;
use Illuminate\Support\Facades\Mail;

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
    public function __construct(StudentServiceInterface $studentServiceInterface, MajorServiceInterface $majorInterface)
    {
        $this->studentInterface = $studentServiceInterface;
        $this->majorInterface = $majorInterface;
    }

    /**
     * index page show students list
     * @param Request $request
     * @return url to index with Object $students
     */
    public function index(Request $request)
    {
        $students = $this->studentInterface->index($request);
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
            'email' => 'required|email|unique:students',
            'phone' => 'required|min:11',
            'address' => 'required',
            'major_id' => 'required'
        ]);
        $this->studentInterface->store($request);
        $this->sendMail($request->email);
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
            'email' => ['required', 'email',Rule::unique('students')->ignore($id)],
            'phone' => 'required|min:11',
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
        return $this->studentInterface->export();
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

    /**
     * send email to 
     * @param string $email
     * return Object
     */
    public function sendMail($email) {
        Mail::to($email)->send(new WelcomeMail());
        return new WelcomeMail();
    }
    
    /**
     *  get Students list
     *  @return object $students;
     */
    public function getStuList(){
        $students = $this->studentInterface->getStuList()->get();
        return $students;
    }

    /**
     * mail to incharge 
     * @param Request $request
     * return Object $topStudents;
     */
    public function toincharge(Request $request) {
        $email = $request->email;
        $students = $this->getStuList();    
        $topStudents = new TopStudentsList(collect($students));
        Mail::to($email)->send($topStudents);
        return $topStudents;
    }

    /**
     * show input email form 
     * @return view
     */
    public function viewToincharge() {
        return view('emails.toincharge');
    }
}
