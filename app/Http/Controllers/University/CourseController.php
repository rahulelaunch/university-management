<?php

namespace App\Http\Controllers\University;

use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Models\Course;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{

    protected $courseRepo;

    public function __construct(CourseInterface $courseRepo)
    {
        $this->courseRepo = $courseRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of((new CourseDataTable())->get())->make(true);
        }
        return view('admin.course.index');
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
        $course = $this->courseRepo->courseStore($input);
        return $this->sendResponse($course,'College created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->courseRepo->courseEdit($id); 
        return $this->sendResponse($course,'Course retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = $this->courseRepo->courseUpdate($input,$id); 
        return $this->sendResponse($course,'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courseRepo->courseDelete($id); 
        return $this->sendSuccess('Course deleted successfully');
    }

    public function changeStatus(Request $request,$id)
    {
        $input = $request->all();
        $this->courseRepo->changeStatus($input,$id); 
        return $this->sendSuccess('Status changed successfully.');
    }
}
