<?php

namespace App\DataTables;

use App\Models\CollegeMerit;

class CollegeMeritDataTable
{
    public function get()
    {
        $query = CollegeMerit::with('course','college','merits')->select('college_merits.*');
        return $query;
    }
}
