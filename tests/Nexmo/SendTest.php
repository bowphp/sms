<?php

use Papac\Sms\SmsClient;

class SendTest extends \PHPUnit\Framework\TestCase
{
	public function testInstance()
	{
		$this->assertInstanceOf(SmsClient::getInstance(), SmsClient::class);
	}
} 