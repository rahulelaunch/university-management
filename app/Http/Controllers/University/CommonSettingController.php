<?php

namespace App\Http\Controllers\University;

use App\DataTables\CommonSettingDataTable;
use App\Http\Controllers\Controller;
use App\Models\CommonSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommonSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of((new CommonSettingDataTable())->get())->make(true);
        }
    
        return view('admin.common-setting.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommonSetting  $commonSetting
     * @return \Illuminate\Http\Response
     */
    public function show(CommonSetting $commonSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommonSetting  $commonSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonSetting $commonSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommonSetting  $commonSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommonSetting $commonSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonSetting  $commonSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonSetting $commonSetting)
    {
        $commonSetting->delete();
        return $this->sendSuccess('College deleted successfully');
    }
}
