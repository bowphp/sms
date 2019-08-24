<?php

use Bow\Sms\Sms;

if (!function_exists('sms')) {
    /**
     * The SMS helper
     *
     * @param array $to
     * @param string $message
     * @return boolean
     */
    function sms(array $to, string $message)
    {
        return Sms::send($to, $message);
    }
}
