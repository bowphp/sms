<?php

namespace Bow\Sms;

use Bow\Configuration\Loader as Config;
use Bow\Application\Service;

class SmsConfiguration extends Service
{
    /**
     * @inheritDoc
     */
    public function create(Config $config)
    {
        $sms = (array) $config['sms'];
        
        $r = require __DIR__.'/../config/sms.php';

        $sms = array_merge($r, $sms);

        $config('sms', $sms);

        $this->app->capsule('sms', function () use ($sms) {
            return SmsClient::configure($sms);
        });
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        return $this->app->capsule('sms');
    }
}
