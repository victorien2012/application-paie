<?php

namespace App\Helpers;
//namespace App\Facades;
//use App\Models\Configuration;
//use Illuminate\Support\Facades\Facade;
class ConfigHelper
{
    public static function getAppName()
    {
   $appName = Configuration::where('type', 'APP_NAME')->value('value');
//   config(['appName' => $appName]);
   return $appName;
    }

}



