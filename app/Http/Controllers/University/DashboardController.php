<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\ResetPasswordRequest;
use App\Interfaces\UniversityDashboardInterface;
use App\Models\College;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    protected $dashboardRepo;

    public function __construct(UniversityDashboardInterface $dashboardRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
    }

    public function index()
    {
        $colleges = College::where('status', '1')->count();
        return view('admin.index', compact('colleges'));
    }

    public function changePassword()
    {
        return view('admin.auth.changepassword');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $adminData = University::where('id', Auth::user()->id)->first();
        if (Hash::check($request->oldpassword, $adminData->password)) {
            $newPass = bcrypt($request->newpassword);
            $update = University::where('id', Auth::user()->id)->update(['password' => $newPass]);
            if ($update) {
                Auth::guard('university')->logout();
                return redirect()->route('university.login')->with('success', 'Password Update Successfully...');
            }
        } else {
            return back()->with('danger', 'Old Password does not match');
        }
    }

    public function profile()
    {
        $admin = $this->dashboardRepo->profile();
        return view('admin.auth.profile', compact('admin'));
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
