<?php
namespace App\Repositories;

use App\Interfaces\CollegeMeritInterface;
use App\Models\CollegeCourse;
use App\Models\CollegeMerit;
use App\Models\MeritRound;
use Illuminate\Support\Facades\Auth;

class CollegeMeritRepository implements CollegeMeritInterface
{

    public function collegeMeritStore(array $data)
    {
        $routeId = MeritRound::where('round_no',$data['round'])->where('course_id',$data['course_id'])->first();
        $data['merit_round_id']= $routeId->id;
        $data['college_id']=Auth::guard('college')->id();
        return  CollegeMerit::create($data);
    }  
    
    public function collegeMeritEdit($id)
    {
        return CollegeMerit::findOrFail($id);
    }

    public function collegeMeritUpdate(array $data,$id)
    {
         $course = CollegeMerit::findOrFail($id);
         $routeId = MeritRound::where('round_no',$data['round'])->where('course_id',$data['course_id'])->first();
         $data['merit_round_id']= $routeId->id;
         return  $course->update($data);
    }

    public function collegeMeritDelete($id)
    {
        $merit = CollegeMerit::findOrFail($id);
        return $merit->delete();
    }

}

?>