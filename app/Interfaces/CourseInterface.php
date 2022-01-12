<?php

namespace App\Interfaces;

interface CourseInterface
{  
    public function courseStore(array $data);

    public function courseEdit($id);
    
    public function courseUpdate(array $data,$id);

    public function courseDelete($id);

    public function changeStatus(array $data,$id);
}

?>