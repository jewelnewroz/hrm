<?php
use App\Services\SettingService;

function getOption($key, $default = null)
{
    $option = new SettingService();
    return $option->get($key, $default);
}
