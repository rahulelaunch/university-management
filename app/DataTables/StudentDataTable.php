<?php

namespace App\DataTables;

use App\Models\User;

class StudentDataTable
{
    public function get()
    {
        return User::query()->select('users.*');
    }
}
