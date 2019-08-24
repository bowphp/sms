<?php

namespace Bow\Sms\Driver;

class OrangeDriver implements SmsDriverContrats
{
    /**
     * @var array
     */
    private $config;

    /**
     * Orange Driver constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
    }

    /**
     * @inheritdoc
     */
    public function send($to, $text, callable $callable = null)
    {
        // TODO: Implement send() method.
    }
}
