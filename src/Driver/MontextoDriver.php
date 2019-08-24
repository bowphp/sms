<?php

namespace Bow\Sms\Driver;

class MontextoDriver implements SmsDriverContrats
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var Montexto
     */
    private $montexto;

    /**
     * @var Mixed
     */
    static $client;

    /**
     * Montexto Driver constructor
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->montexto = Montexto($config);
    }

    /**
     * Login
     */
    private function login()
    {
        if (is_null(static::$client)) {
            static::$client = $this->montexto->login();
        }

        if (!static::$client->isLogin()) {
            throw new \Exception("Echec de connexion", E_ERROR);
        }
    }

    /**
     * @inheritdoc
     */
    public function send($to, $text, callable $callable = null)
    {
        $this->login();

        $response = static::$client->send($to, $text);

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
    public function messages()
    {
        $this->login();

        return static::$client->getSendedMessages();
    }
}
