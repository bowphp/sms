<?php

namespace Papac\Sms;

class SmsClient implements Driver\DriverContrats
{
    /**
     * @var mixed
     */
    private $client;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var SmsClient
     */
    private static $instance;

    /**
     * @var array
     */
    private $driver = [
        'nexmo' => \Papac\Sms\Driver\NexmoDriver::Class,
        'orange' => \Papac\Sms\Driver\OrangeDriver::Class,
    ];

    /**
     * Sms constructor.
     *
     * @param Config $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $driver = $config['driver'];

        $this->client = new $this->driver($config[$driver]);
    }

    /**
     * Get the define driver
     *
     * @return string
     */
    public function getDriver()
    {
        return $this->config['driver'];
    }

    /**
     * {@inheritdoc}
     */
    public function send($to, $text, callable $callable = null)
    {
        return $this->client->send($to, $text, $callable);
    }

    /**
     * {@inheritdoc}
     */
    public function verify($number, $brand = null)
    {
        return $this->client->verify($number, $brand);
    }

    /**
     * Make configuration
     *
     * @param array $config
     */
    public static function configure($config)
    {
        $this->instance = new static($config);

        return $instance;
    }

    /**
     * Get SmsClient instance
     *
     * @return SmsClient
     */
    public function getInstance()
    {
        return $this->instance;
    }
}
