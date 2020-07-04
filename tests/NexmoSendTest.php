<?php

use Bow\Sms\Driver\NexmoDriver;

class NexmoSendTest extends \PHPUnit\Framework\TestCase
{
    public function testInstance()
    {
        $driver = $this->getMockBuilder(NexmoDriver::class)
            ->disableOriginalConstructor()->getMock();

        $this->assertInstanceOf($driver, NexmoDriver::class);
    }
    
    public function testSimpleSend()
    {
        $driver = $this->createMock(NexmoDriver::class);
        $driver->expects($this->once())->method('send')->willReturn(true);

        $this->assertTrue($driver->send('01234567', 'message'));
    }
}
