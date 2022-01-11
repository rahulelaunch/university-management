<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Interfaces\StudentDashboardInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $dashboardRepo;

    public function __construct(StudentDashboardInterface $dashboardRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
    }

    public function index()
    {
        return view('student.dashboard');
    }

    public function changePassword()
    {
        return view('student.auth.changepassword');
    }

    public function resetPassword(Request $request)
    {
         $input = $request->all();
         $data = $this->dashboardRepo->resetPassword($input);
           if($data)
           {
               $newPass=bcrypt($request->newpassword);
               $update=User::where('id',Auth::user()->id)->update(['password'=>$newPass]);
               if($update)
               {
                   Auth::guard('student')->logout();
                   return redirect()->route('student.login')->with('success','Password Update Successfully...');
               }
           }
           else
           {
            return back()->with('danger','Old Password does not match');

           }
    }

    public function profile()
    {
        $admin = $this->dashboardRepo->profile();
        return view('student.auth.profile',compact('admin'));
    }

    public function profileupdate(Request $request)
    {
        $input = $request->all();
        $updateprofile = $this->dashboardRepo->profileupdate($input);

        if ($updateprofile) {
            return response()->json('1');
        } else {
            return response()->json('0');
        }
    }
}
