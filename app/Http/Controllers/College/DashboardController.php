<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Http\Requests\College\ResetPasswordRequest;
use App\Interfaces\CollegeDashboardInterface;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $dashboardRepo;

    public function __construct(CollegeDashboardInterface $dashboardRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
    }

    public function index()
    {
        return view('college.dashboard');
    }

    public function changePassword()
    {
        return view('college.auth.changepassword');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
         $input = $request->all();
         $data = $this->dashboardRepo->resetPassword($input);
           if($data)
           {
               $newPass=bcrypt($request->newpassword);
               $update=College::where('id',Auth::user()->id)->update(['password'=>$newPass]);
               if($update)
               {
                   Auth::guard('college')->logout();
                   return redirect()->route('college.login')->with('success','Password Update Successfully...');
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
        return view('college.auth.profile',compact('admin'));
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


