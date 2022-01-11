<?php

namespace App\DataTables;

use App\Models\CommonSetting;

class CommonSettingDataTable
{
    public function get()
    {
        $query = CommonSetting::with('subject')->select('common_settings.*');
        return $query;
    }
}
