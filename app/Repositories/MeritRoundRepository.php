<?php
namespace App\Repositories;

use App\Interfaces\MeritRoundInterface;
use App\Models\MeritRound;

class MeritRoundRepository implements MeritRoundInterface
{

    public function meritRoundStore(array $data)
    {
        return  MeritRound::create($data);
    }  
    
    public function meritRoundEdit($id)
    {
        return MeritRound::findOrFail($id);
    }

    public function meritRoundUpdate(array $data,$id)
    {
        $round = MeritRound::findOrFail($id);
         return  $round->update($data);
    }

    public function meritRoundDelete($id)
    {
        $round = MeritRound::findOrFail($id);
        return $round->delete();
    }

    public function meritRoundchangeStatus(array $data,$id)
    {
        $round = MeritRound::findOrFail($id);
        $status = $data['status'];
        return $round->update(['status' =>$status]);
    }
}

?>