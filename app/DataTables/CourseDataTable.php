<?php

namespace App\DataTables;

use App\Models\Course;

class CourseDataTable
{
    public function get()
    {
        return Course::query()->select('courses.*');
    }
}
