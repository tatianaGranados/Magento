<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\GiftMessage\Test\Unit\Observer;

use Magento\Framework\Event;
use Magento\GiftMessage\Observer\SalesEventQuoteSubmitBeforeObserver as Observer;
use Magento\Quote\Model\Quote;
use Magento\Sales\Model\Order;
use PHPUnit\Framework\TestCase;

class SalesEventQuoteSubmitBeforeObserverTest extends TestCase
{
    /**
     * @var \Magento\GiftMessage\Observer\SalesEventQuoteSubmitBeforeObserver
     */
    protected $salesEventQuoteSubmitBeforeObserver;

    protected function setUp(): void
    {
        $this->salesEventQuoteSubmitBeforeObserver = new Observer();
    }

    public function testSalesEventQuoteSubmitBefore()
    {
        $giftMessageId = 42;
        $observerMock = $this->createMock(\Magento\Framework\Event\Observer::class);
        $eventMock = $this->getMockBuilder(Event::class)
            ->addMethods(['getOrder', 'getQuote'])
            ->disableOriginalConstructor()
            ->getMock();
        $quoteMock = $this->getMockBuilder(Quote::class)
            ->addMethods(['getGiftMessageId'])
            ->disableOriginalConstructor()
            ->getMock();
        $orderMock = $this->getMockBuilder(Order::class)
            ->addMethods(['setGiftMessageId'])
            ->disableOriginalConstructor()
            ->getMock();
        $observerMock->expects($this->exactly(2))->method('getEvent')->willReturn($eventMock);
        $eventMock->expects($this->once())->method('getQuote')->willReturn($quoteMock);
        $quoteMock->expects($this->once())->method('getGiftMessageId')->willReturn($giftMessageId);
        $eventMock->expects($this->once())->method('getOrder')->willReturn($orderMock);
        $orderMock->expects($this->once())->method('setGiftMessageId')->with($giftMessageId);
        $this->assertEquals(
            $this->salesEventQuoteSubmitBeforeObserver,
            $this->salesEventQuoteSubmitBeforeObserver->execute($observerMock)
        );
    }
}
