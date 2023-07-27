<?php

use App\Models\Setting;

function getConfigFromSettingTabel($configkey)
{
    $setting = Setting::where('config_key', $configkey)->first();
    if (!empty($setting)) {
        return $setting->config_value;
    }
    return null;
}
