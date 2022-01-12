<?php

namespace App\DataTables;

use App\Models\MeritRound;

class MeritRoundDataTable
{
    public function get()
    {
        $query = MeritRound::with('course')->select('merit_rounds.*');
        return $query;
    }
}
