<?php 

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentDao implements StudentDaoInterface {
    
     /**
     * index page show students list
     *
     * @return Object $students
     */
    public function index()
    {
        $students = Student::with('major')->get();
        return $students;
    }

    /**
     * Store a student record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major_id,
        ]);
    }

    /**
     * show update page
     *
     * @param  int  $id
     * @return  array
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        Student::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
    }

    /**
     * import data to students table
     * @param Request $request
     * @return void
     */
    public function import(Request $request) {
        $students = Excel::toCollection(new StudentsImport(), $request->file('import_file'));
        foreach($students[0] as $student) {
            Student::where('id', $student[0])->update([
                'first_name' => $student[1],
                'last_name' => $student[2],
                'email' => $student[3],
                'phone' => $student[4],
                'address' => $student[5],
                'major_id' => $student[6]
            ]);
        }
    }
}