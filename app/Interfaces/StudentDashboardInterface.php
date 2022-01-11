<?php

namespace App\Interfaces;

interface StudentDashboardInterface
{ 

    public function profile();
    
    public function profileupdate(array $data);

    public function resetPassword(array $data);
}

?>