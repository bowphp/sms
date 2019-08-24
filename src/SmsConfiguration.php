<?php

namespace Bow\Sms;

use Bow\Config\Config;
use Bow\Application\Service;

class SmsConfiguration extends Service
{
    /**
     * Make view setting
     *
     * @param Config $config
     */
    public function create(Config $config)
    {
        $sms_cf = (array) $config['sms'];
        
        $r = require __DIR__.'/../config/sms.php';

        $sms_cf = array_merge($r, $sms_cf);

        $config('sms', $sms_cf);

        $this->app->capsule('sms', function () use ($sms_cf) {
            return SmsClient::configure($sms_cf);
        });
    }

    /**
     * Start service
     *
     * @return mixed
     */
    public function run()
    {
        return $this->app->capsule('sms');
    }
}