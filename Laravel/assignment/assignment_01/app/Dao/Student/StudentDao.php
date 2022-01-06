<?php 

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Dao\Major\MajorDao;
use Illuminate\Support\Facades\DB;

class StudentDao implements StudentDaoInterface {
    
     /**
     * index page show students list
     *
     * @return Object $students
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $start = $request->start;
        $end = $request->end;

        $students = DB::table('students as student')
            ->join('majors as major', 'student.major_id', '=', 'major.id')
            ->select('student.*', 'major.name as major')
            ->orderBy('student.id', 'asc');

        if ($start) {
            $students->whereDate('student.created_at', '>=', $start);
        }

        if ($end) {
            $students->whereDate('student.created_at', '<=', $end);
        }
        
        if ($keyword) {
            $students->where('student.first_name', 'LIKE', '%' . $keyword . '%')
                ->orwhere('student.last_name', 'LIKE', '%' . $keyword . '%')
                ->orwhere('student.email', 'LIKE', '%' . $keyword . '%');
        }
        
        return $students->get();

    }

    /**
     * get students list
     */
    public function getlist() {
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

    public function export() 
    {
        return $this;
    }
    /**
     * import data to students table
     * @param Request $request
     * @return void
     */
    public function import(Request $request) {
        $students = Excel::toCollection(new StudentsImport(), $request->file('import_file'));
        $isfirstrow = 0;
        foreach($students[0] as $student) {
            if($isfirstrow) {
                if (DB::table('students')->where('id', $student[0])->doesntExist()) {
                    Student::insert([
                        'id' => $student[0],
                        'first_name' => $student[1],
                        'last_name' => $student[2],
                        'email' => $student[3],
                        'phone' => $student[4],
                        'address' => $student[5],
                        'major_id' => $student[7],
                        'created_at' => date('Y-m-d')." ". date("h:i:s")
                    ]);
                } else {
                    Student::where('id', $student[0])->update([
                        'first_name' => $student[1],
                        'last_name' => $student[2],
                        'email' => $student[3],
                        'phone' => $student[4],
                        'address' => $student[5],
                        'major_id' => $student[7]
                    ]);   
                }
            }
            $isfirstrow++;
        }
    }
}