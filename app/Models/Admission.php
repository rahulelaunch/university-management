<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = 'student_marks';

    protected $fillable = [
        'user_id','college_id','course_id','merit_round_id','addmission_date','addmission_code','status'
    ];
}
