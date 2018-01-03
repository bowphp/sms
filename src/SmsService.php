<?php

namespace Papac\Sms;

use Bow\Config\Config;
use Bow\Application\Services;

class SmsService extends Services
{
    /**
     * Start service
     */
    public function start()
    {
        //
    }

    /**
     * Make view setting
     *
     * @param Config $config
     */
    public function make(Config $config)
    {
        $sms = $config['sms'];
        
        if (is_null($sms)) {
            $sms = require __DIR__.'/../config/sms.php';
            $config['sms'] = $sms;
        }

        SmsClient::configure($sms);
    }
}
