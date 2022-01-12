<?php

namespace App\Http\Controllers\University;

use App\DataTables\MeritRoundDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\MeritRoundInterface;
use App\Models\MeritRound;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MeritRoundController extends Controller
{

    protected $meritRoundRepo;

    public function __construct(MeritRoundInterface $meritRoundRepo)
    {
        $this->meritRoundRepo = $meritRoundRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of((new MeritRoundDataTable())->get())->make(true);
        }
        return view('admin.merit-round.index');
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
        $meritRound = $this->meritRoundRepo->meritRoundStore($input);
        return $this->sendResponse($meritRound,'Merit Round created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeritRound  $meritRound
     * @return \Illuminate\Http\Response
     */
    public function show(MeritRound $meritRound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeritRound  $meritRound
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meritRound = $this->meritRoundRepo->meritRoundEdit($id); 
        return $this->sendResponse($meritRound,'Merit Round retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeritRound  $meritRound
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $meritRound = $this->meritRoundRepo->meritRoundUpdate($input,$id); 
        return $this->sendResponse($meritRound,'Merit ound updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeritRound  $meritRound
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->meritRoundRepo->meritRoundDelete($id); 
        return $this->sendSuccess('Merit Round deleted successfully');
    }

    public function changeStatus(Request $request,$id)
    {
        $input = $request->all();
        $this->meritRoundRepo->meritRoundchangeStatus($input,$id); 
        return $this->sendSuccess('Status changed successfully.');
    }
}
