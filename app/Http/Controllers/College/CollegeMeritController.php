<?php

namespace App\Http\Controllers\College;

use App\DataTables\CollegeMeritDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\CollegeMeritInterface;
use App\Models\CollegeCourse;
use App\Models\CollegeMerit;
use App\Models\MeritRound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CollegeMeritController extends Controller
{

    protected $collegeMeritRepo;

    public function __construct(CollegeMeritInterface $collegeMeritRepo)
    {
        $this->collegeMeritRepo = $collegeMeritRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of((new CollegeMeritDataTable())->get())->make(true);
        }
        $course = CollegeCourse::with('course')->where('college_id', Auth::guard('college')->id())->get();
        return view('college.college-merit.index',compact('course'));
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
        $college = $this->collegeMeritRepo->collegeMeritStore($input);
        return $this->sendResponse($college,'College created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CollegeMerit  $collegeMerit
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeMerit $collegeMerit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollegeMerit  $collegeMerit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collegeMerit = $this->collegeMeritRepo->collegeMeritEdit($id); 
        return $this->sendResponse($collegeMerit,'Couser retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollegeMerit  $collegeMerit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $collegeMerit = $this->collegeMeritRepo->collegeMeritUpdate($input,$id); 
        return $this->sendResponse($collegeMerit,'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollegeMerit  $collegeMerit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->collegeMeritRepo->collegeMeritDelete($id); 
        return $this->sendSuccess('Course deleted successfully');
    }

    public function getCourse(Request $request,$id)
    {
        $rounds = MeritRound::where('course_id',$id)->select('round_no')->get();
        return response()->json($rounds);
    }
}
