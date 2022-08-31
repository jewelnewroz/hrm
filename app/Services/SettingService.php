<?php


namespace App\Services;


use App\Models\Option;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function get($key, $default_value = '')
    {
        $item = Cache::rememberForever('options', function() {
            return Option::all();
        })->first(function($item, $_k) use($key, $default_value) {
            return $item->label == $key;
        }, function() use($default_value) {
            return $default_value;
        });

        return (is_object($item)) ? $item->content : $default_value;
    }

    public function setup($data)
    {
        foreach($data as $key => $value) {
            Option::create(['label' => $key, 'content' => $value]);
        }
    }
}
