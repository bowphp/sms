<?php

namespace Papac\Sms\Driver;

class OrangeDriver implements DriverContrats
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
