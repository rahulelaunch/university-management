<?php
namespace App\Repositories;

use App\Interfaces\UniversityDashboardInterface;
use App\Models\Area;
use App\Models\University;
use Illuminate\Support\Facades\Auth;
use UConverter;

class UniversityDashboardRepository implements UniversityDashboardInterface
{
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
                             
         
}

?>