<?php

namespace Bow\Sms\Driver;

use Bow\Sms\Contracts\SmsDriverContract;

class OrangeDriver implements SmsDriverContract
{
    /**
     * Define the driver configuration
     * 
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
        // TODO: implement __construct
    }

    /**
     * @inheritdoc
     */
    public function send($to, $text, callable $callable = null)
    {
        // TODO: Implement send() method.
    }
    
    /**
     * @inheritDoc
     */
    public function sendMany(array $to, string $text, callable $callable = null)
    {
        // TODO: Implement sendMant() method
    }
}
