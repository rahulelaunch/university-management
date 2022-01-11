<?php

namespace App\Interfaces;

interface UniversityDashboardInterface
{ 
    public function index();

    public function profile();
    
    public function profileupdate(array $data);

    public function resetPassword(array $data);
}

?>