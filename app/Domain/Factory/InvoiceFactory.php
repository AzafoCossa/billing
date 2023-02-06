<?php

namespace Billing\Invoicer\Domain\Factory;

use Billing\Invoicer\Domain\Model\Invoice;
use Billing\Invoicer\Domain\Model\Order;

class InvoiceFactory
{


    public function createFromOrder(Order $order)
    {
        $invoice = new Invoice();
        $invoice->setOrder($order);
        $invoice->setInvoiceDate(new \DateTime());
        $invoice->setTotal($order->getTotal());

        return $invoice;
    }
}
