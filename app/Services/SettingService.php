<?php


namespace Larabill\Services;


use Larabill\Models\Option;

class SettingService
{
    public function setup($data)
    {
        foreach($data as $key => $value) {
            Option::create(['label' => $key, 'content' => $value]);
        }
    }
}
