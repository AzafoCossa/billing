<?php

use Billing\Invoicer\Domain\Factory\InvoiceFactory;
use Billing\Invoicer\Domain\Model\Invoice;
use Billing\Invoicer\Domain\Model\Order;
use Billing\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Billing\Invoicer\Domain\Services\InvoiceService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{

    public function testGenerateInvoices()
    {
        $orderRepository = $this->createMock(OrderRepositoryInterface::class);
        $factory = $this->createMock(InvoiceFactory::class);

        // $orderRepository->expects($this->once())
        //     ->method('getUninvoicedOrders');
        // $invoiceService = new InvoiceService($orderRepository);

        // $invoiceService->generateInvoices();

        $orders = [(new Order())->setTotal(400)];
        $invoices = [(new Invoice())->setTotal(400)];

        $orderRepository->expects($this->once())->method('getUninvoicedOrders')->willReturn($orders);
        $factory->expects($this->once())->method('createFromOrder')->with($orders[0])->willReturn($invoices[0]);

        $service = new InvoiceService(
            $orderRepository,
            $factory
        );

        $result = $service->generateInvoices();
    }
}
