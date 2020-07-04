<?php

namespace Bow\Sms\Contracts;

interface SmsDriverContract
{
    /**
     * Send single message
     *
     * @param string $to
     * @param string $text
     * @param callable $callable
     * @throws \Exception
     * @return mixed
     */
    public function send(string $to, string $text, callable $callable = null);
    
    /**
     * Send Many message
     *
     * @param array $to
     * @param string $text
     * @param callable $callable
     * @throws \Exception
     * @return mixed
     */
    public function sendMany(array $to, string $text, callable $callable = null);

    /**
     * Get sms credits details
     * 
     * @return int
     */
    public function getCredits();

    /**
     * Get consumed credits details
     * 
     * @return int
     */
    public function getConsumedCredits();

    /**
     * Get sms message sended
     *
     * @return array
     */
    public function getMessages();
}
