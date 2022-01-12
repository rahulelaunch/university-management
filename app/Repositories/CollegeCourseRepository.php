<?php
namespace App\Repositories;

use App\Interfaces\CollegeCourseInterface;
use App\Models\CollegeCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CollegeCourseRepository implements CollegeCourseInterface
{

    public function collegeCourseStore(array $data)
    {
        $total = $data['merit_seat']+$data['reserved_seat'];
        $data['seat_no']=$total;
        $data['college_id']=Auth::guard('college')->id();
        return  CollegeCourse::create($data);
    }  
    
    public function collegeCourseEdit($id)
    {
        return CollegeCourse::findOrFail($id);
    }

    public function collegeCourseUpdate(array $data,$id)
    {

         $course = CollegeCourse::findOrFail($id);
         $total = $data['merit_seat']+$data['reserved_seat'];
         $data['seat_no']=$total;
         return  $course->update($data);
    }

    public function collegeCourseDelete($id)
    {
        $course = CollegeCourse::findOrFail($id);
        return $course->delete();
    }

}

?>