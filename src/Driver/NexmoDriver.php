<?php

namespace Bow\Sms\Driver;

use Nexmo\Client;
use Nexmo\Client\Credentials\Basic;

class NexmoDriver implements DriverContrats
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var Client
     */
    private $client;

    /**
     * Nexmo Driver constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        
        $basic = new Basic($config['key'], $config['secret']);

        $this->client = new Client($basic);
    }

    /**
     * @inheritdoc
     */
    public function send($to, $text, callable $callable = null)
    {
        $message = $this->client->message()->send([
            'to' => $to,
            'from' => $this->config['brand'],
            'text' => $text
        ]);

        if (is_callable($callable)) {
            return $callable($message);
        }

        return (array) $message;
    }

    /**
     * @inheritdoc
     */
    public function verify($number, $brand = null)
    {
        $params = ['number' => $number];

        if (is_null($brand)) {
            if (isset($this->config['brand'])) {
                $params['brand'] = $this->config['brand'];
            }
        } else {
            $params['brand'] = $brand;
        }

        $verification = $this->client->verify()->start($params);

        return $verification;
    }
}
