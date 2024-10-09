<?php

use PHPUnit\Framework\TestCase;
use sandbox\OrderOne;

class OrderOneTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // not possible?
    // https://github.com/sebastianbergmann/phpunit/issues/3985
    public function testOrderIsProcessed()
    {
//        $gateway = $this->getMockBuilder('PaymentGateway')
//            ->onlyMethods(['charge'])
//            ->disableOriginalConstructor()
//            ->getMock();

//        $gateway->expects($this->once())
//            ->method('charge')
//            ->with($this->equalTo(200))
//            ->willReturn(true);

//        $order = new OrderOne($gateway);

//        $order->amount = 200;

//        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = Mockery::mock('sandbox\PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new OrderOne($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}