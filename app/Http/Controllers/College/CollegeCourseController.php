<?php

namespace App\Http\Controllers\College;

use App\DataTables\CollegeCourseDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\CollegeCourseInterface;
use App\Models\CollegeCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CollegeCourseController extends Controller
{

    protected $collegeCourseRepo;

    public function __construct(CollegeCourseInterface $collegeCourseRepo)
    {
        $this->collegeCourseRepo = $collegeCourseRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of((new CollegeCourseDataTable())->get())->make(true);
        }
    
        return view('college.college-course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $college = $this->collegeCourseRepo->collegeCourseStore($input);
        return $this->sendResponse($college,'College created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeCourse $collegeCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collegeCourse = $this->collegeCourseRepo->collegeCourseEdit($id); 
        return $this->sendResponse($collegeCourse,'Couser retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $collegeCourse = $this->collegeCourseRepo->collegeCourseUpdate($input,$id); 
        return $this->sendResponse($collegeCourse,'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->collegeCourseRepo->collegeCourseDelete($id); 
        return $this->sendSuccess('Course deleted successfully');
    }


}
