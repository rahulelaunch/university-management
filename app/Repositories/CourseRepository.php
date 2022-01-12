<?php
namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CourseRepository implements CourseInterface
{

    public function courseStore(array $data)
    {
        $data['status']=1;
        return  Course::create($data);
    }  
    
    public function courseEdit($id)
    {
        return Course::findOrFail($id);
    }

    public function courseUpdate(array $data,$id)
    {
        $course = Course::findOrFail($id);
         return  $course->update($data);
    }

    public function courseDelete($id)
    {
        $course = Course::findOrFail($id);
        return $course->delete();
    }

    public function changeStatus(array $data,$id)
    {
        $course = Course::findOrFail($id);
        $status = $data['status'];
        return $course->update(['status' =>$status]);
    }



}

?>