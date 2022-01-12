<?php
namespace App\Repositories;

use App\Interfaces\CommonSettingInterface;
use App\Models\CommonSetting;

class CommonSettingRepository implements CommonSettingInterface
{

    public function commonSettingStore(array $data)
    {
        return  CommonSetting::create($data);
    }  
    
    public function commonSettingEdit($id)
    {
        return CommonSetting::findOrFail($id);
    }

    public function commonSettingUpdate(array $data,$id)
    {
        $setting = CommonSetting::findOrFail($id);
         return  $setting->update($data);
    }

    public function commonSettingDelete($id)
    {
        $setting = CommonSetting::findOrFail($id);
        return  $setting->delete();
    }


}

?>