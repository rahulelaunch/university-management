<?php

namespace App\Interfaces;

interface CollegeCourseInterface
{  
    public function collegeCourseStore(array $data);

    public function collegeCourseEdit($id);
    
    public function collegeCourseUpdate(array $data,$id);

    public function collegeCourseDelete($id);

}

?>