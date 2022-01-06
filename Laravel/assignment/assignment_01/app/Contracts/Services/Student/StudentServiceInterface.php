<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

interface StudentServiceInterface {

    /**
     * index page show students list
     *
     * @return Object $students
     */
    public function index(Request $request);

    /**
     * get students list
     */
    public function getlist();

    /**
     * Store a student record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id);

    /**
     * import data to students table
     * @param Request $request
     * @return void
     */
    public function import(Request $request);

    /**
     * download as excel file from student table
     * 
     */
    public function export();
}