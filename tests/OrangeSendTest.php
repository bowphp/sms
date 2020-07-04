<?php

use Bow\Sms\Driver\OrangeDriver;

class OrangeSendTest extends \PHPUnit\Framework\TestCase
{
    public function testInstance()
    {
        $driver = $this->getMockBuilder(OrangeDriver::class)
            ->disableOriginalConstructor()->getMock();

        $this->assertInstanceOf($driver, OrangeDriver::class);
    }

    public function testSimpleSend()
    {
        $driver = $this->createMock(OrangeDriver::class);
        $driver->expects($this->once())->method('send')->willReturn(true);

        $this->assertTrue($driver->send('01234567', 'message'));
    }
}
