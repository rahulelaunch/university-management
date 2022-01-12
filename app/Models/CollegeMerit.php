<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeMerit extends Model
{
    use HasFactory;
    protected $table = 'college_merits';

    protected $fillable = [
        'college_id','course_id','merit_round_id','merit',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function merits()
    {
        return $this->belongsTo(MeritRound::class, 'merit_round_id', 'id');
    }

    public function college() {
		return $this->hasOne(College::class, 'id', 'college_id');
	}
}
