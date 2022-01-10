<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Http\Requests\College\ResetPasswordRequest;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
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
           $adminData= College::where('id',Auth::user()->id)->first();
           if(Hash::check($request->oldpassword, $adminData->password))
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
        $admin= College::where('id',Auth::user()->id)->first();
        return view('college.auth.profile',compact('admin'));
    }

    public function profileupdate(Request $request)
    {
        $updateprofile=College::where('id',Auth::user()->id)->update([
                'contact_no'=>$request->contact_no,
                'address'=>$request->address,
            ]);

        if ($updateprofile) {
            return response()->json('1');
        } else {
            return response()->json('0');
        }
    }
}


