<?php

namespace App\DataTables;

use App\Models\College;

class CollegeDataTable
{
    public function get()
    {
        return College::query()->select('colleges.*');
    }
}
