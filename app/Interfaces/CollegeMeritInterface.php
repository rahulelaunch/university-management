<?php

namespace App\Interfaces;

interface CollegeMeritInterface
{  
    public function collegeMeritStore(array $data);

    public function collegeMeritEdit($id);
    
    public function collegeMeritUpdate(array $data,$id);

    public function collegeMeritDelete($id);

}

?>