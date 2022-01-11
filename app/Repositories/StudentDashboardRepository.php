<?php
namespace App\Repositories;

use App\Interfaces\StudentDashboardInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentDashboardRepository implements StudentDashboardInterface
{

    public function profile(){

        return User::where('id',Auth::user()->id)->first();
    }


    public function profileupdate(array $data)
    {
        return User::where('id',Auth::user()->id)->update([
            'contact_no'=>$data['contact_no'],
            'address'=>$data['address'],
               ]);

    }

    public function resetPassword(array $data)
    {
        $adminData = User::where('id', Auth::user()->id)->first();
        $data = Hash::check($data['oldpassword'], $adminData->password);
        return $data;

    }                          
         
}

?>