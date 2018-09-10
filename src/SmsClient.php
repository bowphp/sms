<?php

namespace Bow\Sms;

class SmsClient implements Driver\DriverContrats
{
    /**
     * @var mixed
     */
    private $client;

    /**
     * @var array
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
        'osms' => \Papac\Sms\Driver\OrangeDriver::Class,
        'montexto' => \Papac\Sms\Driver\MontextoDriver::Class,
    ];

    /**
     * Sms constructor.
     *
     * @param array $config
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
     * @inheritdoc
     */
    public function send($to, $text, callable $callable = null)
    {
        return $this->client->send($to, $text, $callable);
    }

    /**
     * @inheritdoc
     */
    public function verify($number, $brand = null)
    {
        return $this->client->verify($number, $brand);
    }

    /**
     * Make configuration
     *
     * @param array $config
     * @return self
     */
    public static function configure(array $config)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($config);
        }

        return static::$instance;
    }

    /**
     * Get SmsClient instance
     *
     * @return SmsClient
     */
    public static function getInstance()
    {
        return static::$instance;
    }
}
