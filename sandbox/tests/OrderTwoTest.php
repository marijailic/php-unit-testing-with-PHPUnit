<?php

use PHPUnit\Framework\TestCase;
use sandbox\OrderTwo;

class OrderTwoTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingMock()
    {
        $order = new OrderTwo(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gatewayMock = Mockery::mock('sandbox\PaymentGateway');
        $gatewayMock->shouldReceive('charge')->once()->with(5.97);

        $order->process($gatewayMock);
    }

    public function testOrderIsProcessedUsingSpy()
    {
        $order = new OrderTwo(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gatewaySpy = Mockery::spy('sandbox\PaymentGateway');

        $order->process($gatewaySpy);

        $gatewaySpy->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);
    }
}