<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class University extends Authenticatable
{
    use HasFactory;

    protected $table = 'universities';
    protected $guard = 'university';

    protected $fillable = [
        'name','email','password','contact_no','address'
    ];
}
