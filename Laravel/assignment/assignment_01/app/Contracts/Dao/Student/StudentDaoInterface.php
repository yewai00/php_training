<?php

namespace App\Contracts\Dao\Student;
use Illuminate\Http\Request;

interface StudentDaoInterface {

     /**
     * index page show students list
     *
     * @return Object $students
     */
    public function index();

    /**
     * show create page
     *
     * @return Object majors
     */
    public function create();

    /**
     * Store a student record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request);

    /**
     * show update page
     *
     * @param  int  $id
     * @return  array
     */
    public function edit($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id);
}
