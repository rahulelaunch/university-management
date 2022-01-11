<?php

namespace App\Interfaces;

interface CollegeDashboardInterface
{ 

    public function profile();
    
    public function profileupdate(array $data);

    public function resetPassword(array $data);
}

?>