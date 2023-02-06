<?php

namespace Billing\Invoicer\Domain\Services;

use Billing\Invoicer\Domain\Factory\InvoiceFactory;
use Billing\Invoicer\Domain\Repository\OrderRepositoryInterface;

class InvoiceService
{
    protected $orderRepository;
    protected $invoiceFactory;

    public function __construct(OrderRepositoryInterface $orderRepository, InvoiceFactory $invoiceFactory)
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceFactory = $invoiceFactory;
    }

    public function generateInvoices()
    {
        $orders = $this->orderRepository->getUninvoicedOrders();

        $invoices = [];

        foreach ($orders as $order) {
            $invoices[] = $this->invoiceFactory->createFromOrder($order);
        }

        return $invoices;
    }
}
