<?php

namespace App\Helper;

class SmsHelper
{
    public static function send(array $params): bool
    {
        if ($params['mobile'] && $params['message'] && getOption('sms_enabled', 0)) {
            $api_url = getOption('sms_api_url');
            $api_url .= '?' . getOption('sms_api_masking_key') . '=' . getOption('sms_api_masking');
            if (getOption('sms_api_user_key')) {
                $api_url .= '&' . getOption('sms_api_user_key') . '=' . getOption('sms_api_user');
            }
            if (getOption('sms_api_password_key')) {
                $api_url .= '&' . getOption('sms_api_password_key') . '=' . getOption('sms_api_password');
            }
            if (getOption('sms_api_secret_key')) {
                $api_url .= '&' . getOption('sms_api_secret_key') . '=' . getOption('sms_api_secret');
            }
            $api_url .= '&' . getOption('sms_api_format_key') . '=' . getOption('sms_api_format', 'TEXT');
            $api_url .= '&' . getOption('sms_api_number_key') . '=' . $params['mobile'];
            $api_url .= '&' . getOption('sms_api_message_key') . '=' . str_replace(' ', '+', $params['message']);

            $ch = curl_init();
            // "https://www.google.com/search?source=hp&ei=3jkDXeq7M8KSwgPC6o_AAg&q=test"

            // set the url
            curl_setopt($ch, CURLOPT_URL, $api_url);

            // Set the result output to be a string.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            //Timeout after 7 seconds
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);

            //curl set useragent
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");

            curl_setopt($ch, CURLOPT_HEADER, 0);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                return false;
            }

            curl_close($ch);
            return true;

        }

        return false;
    }
}
