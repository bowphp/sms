<?php

namespace Papac\Sms;

class Sms
{
    /**
     * __callStatic
     *
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public static function __callStatic($method, array $args)
    {
        $instance = SmsClient::getInstance();

        if (method_exists($instance, $method)) {
            return call_user_func_array([$instance, $method], $args);
        }

        throw new \BadMethodCallException(sprintf('%s method not exists', $method));
    }
}
