<?php

namespace Bow\Sms\Driver;

use Bow\Sms\Contracts\SmsDriverContract;
use Bow\Sms\Exception\SmsConnexionException;
use Montexto\Montexto;

class MontextoDriver implements SmsDriverContract
{
    /**
     * Define the montexto instance
     * 
     * @var Montexto
     */
    private $montexto;

    /**
     * Define current instance of client
     * 
     * @var mixed
     */
    static $client;

    /**
     * Montexto Driver constructor
     * 
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->montexto = Montexto($config);
    }

    /**
     * Login
     * 
     * @return mixed
     */
    private function login()
    {
        if (is_null(static::$client)) {
            static::$client = $this->montexto->login();
        }

        if (!static::$client->isLogin()) {
            throw new SmsConnexionException("[montexto] Connection Failure", E_ERROR);
        }
    }

    /**
     * @inheritdoc
     */
    public function send(string $to, string $message, callable $callable = null)
    {
        $this->login();

        $response = static::$client->send($to, $message);

        return $response->get('status');
    }

    /**
     * @inheritDoc
     */
    public function sendMany(array $to, string $message)
    {
        $this->login();

        $response = static::$client->sendMany($to, $message);

        return $response->get('status');
    }

    /**
     * Get montexto credits
     *
     * @return int
     */
    public function credits()
    {
        $this->login();

        return static::$client->getCredits();
    }

    /**
     * Get message sended
     *
     * @return array
     */
    public function getMessages()
    {
        $this->login();

        return static::$client->getSendedMessages();
    }
}
