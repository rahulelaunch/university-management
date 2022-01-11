<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Interfaces\StudentInterface;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $studentRepo;

    public function __construct(StudentInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function registerForm()
    {
        return view('student.auth.register');
    }

    public function register(Request $request)
    {
         $input = $request->all();
         $this->studentRepo->register($input);
        return redirect()->route('student.login');
    }




}
