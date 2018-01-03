<?php

namespace Papac\Sms\Driver;

interface DriverContrats
{
    /**
     * Send the message
     *
     * @param string $to
     * @param string $text
     * @param callable $callable
     *
     * @return mixed
     */
    public function send($to, $text, callable $callable = null);

    /**
     * Check number
     *
     * @param string $number
     * @param string $brand
     */
    public function verify($number, $brand = null);
}
