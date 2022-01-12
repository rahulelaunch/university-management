<?php

namespace App\DataTables;

use App\Models\CollegeCourse;

class CollegeCourseDataTable
{
    public function get()
    {
        $query = CollegeCourse::with('course','college')->select('college_courses.*');
        return $query;
    }
}
