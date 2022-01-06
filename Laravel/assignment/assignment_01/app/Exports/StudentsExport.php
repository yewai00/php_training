<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentsExport implements FromCollection, WithHeadings, WithMapping
{

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
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->studentDao->getlist();
    }
    
    public function map($students) : array {
        return [
            $students->id,
            $students->first_name,
            $students->last_name,
            $students->email,
            $students->phone,
            $students->address,
            $students->major->name,
            $students->major_id     
        ] ;
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'Id',
            'First Name',
            'Last Name',
            'email',
            'phone',
            'Address',
            'Major', 
            'Major-id'  
        ];
    }  
}
