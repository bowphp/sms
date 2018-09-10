<?php

namespace Papac\Sms\Driver;

interface DriverContrats
{
    /**
     * Send the message
     *
     * @param array|string $to
     * @param string $text
     * @param callable $callable
     * @throws \Exception
     * @return mixed
     */
    public function send($to, $text, callable $callable = null);

    /**
     * Get sms credits
     */
    public function credits();

    /**
     * Get sms message sended
     *
     * @return array
     */
    public function messages();
}
