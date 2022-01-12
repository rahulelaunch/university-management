<?php

namespace App\Interfaces;

interface MeritRoundInterface
{  
    public function meritRoundStore(array $data);

    public function meritRoundEdit($id);
    
    public function meritRoundUpdate(array $data,$id);

    public function meritRoundDelete($id);

    public function meritRoundchangeStatus(array $data,$id);
}

?>