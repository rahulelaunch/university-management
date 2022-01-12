<?php

namespace App\Interfaces;

interface CommonSettingInterface
{  
    public function commonSettingStore(array $data);

    public function commonSettingEdit($id);
    
    public function commonSettingUpdate(array $data,$id);

    public function commonSettingDelete($id);

}

?>