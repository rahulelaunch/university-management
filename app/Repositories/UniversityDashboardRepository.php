<?php
namespace App\Repositories;

use App\Interfaces\UniversityDashboardInterface;
use App\Models\Area;
use App\Models\College;
use App\Models\University;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use UConverter;

class UniversityDashboardRepository implements UniversityDashboardInterface
{

    public function index()
    {
        return College::where('status', '1')->count();
    }


    public function profile(){

        return University::where('id',Auth::user()->id)->first();
    }


    public function profileupdate(array $data)
    {
        return University::where('id',Auth::user()->id)->update([
            'contact_no'=>$data['contact_no'],
            'address'=>$data['address'],
               ]);

    }

    public function resetPassword(array $data)
    {
        $adminData = University::where('id', Auth::user()->id)->first();
        $data = Hash::check($data['oldpassword'], $adminData->password);
        return $data;

    }

                             
         
}

?>