<?php

declare(strict_types=1);

use Billing\Invoicer\Domain\Factory\InvoiceFactory;
use Billing\Invoicer\Domain\Model\Invoice;
use Billing\Invoicer\Domain\Model\Order;
use PHPUnit\Framework\TestCase;

final class InvoiceFactoryTest extends TestCase
{
    public function testReturnType(): void
    {
        $order = new Order();
        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);

        $this->assertInstanceOf(Invoice::class, $invoice);
    }

    public function testTotalOrders(): void
    {
        $order = new Order();
        $order->setTotal(500);

        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);

        $this->assertEquals(500, $invoice->getTotal());
    }

    public function testAssotiateOrderToInvoice()
    {
        $order = new Order();

        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);

        $this->assertInstanceOf(\DateTime::class, $invoice->getInvoiceDate());
    }
}
