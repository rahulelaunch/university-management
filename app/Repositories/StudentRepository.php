<?php
namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentInterface
{

    public function register(array $data)
    {
        $data['password']=Hash::make($data['password']);
        return User::create($data);
    }                           
}

?>