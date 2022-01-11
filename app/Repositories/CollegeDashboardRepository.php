<?php
namespace App\Repositories;

use App\Interfaces\CollegeDashboardInterface;
use App\Models\College;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CollegeDashboardRepository implements CollegeDashboardInterface
{

    public function profile(){

        return College::where('id',Auth::user()->id)->first();
    }


    public function profileupdate(array $data)
    {
        return College::where('id',Auth::user()->id)->update([
            'contact_no'=>$data['contact_no'],
            'address'=>$data['address'],
               ]);

    }

    public function resetPassword(array $data)
    {
        $adminData = College::where('id', Auth::user()->id)->first();
        $data = Hash::check($data['oldpassword'], $adminData->password);
        return $data;

    }

                             
         
}

?>