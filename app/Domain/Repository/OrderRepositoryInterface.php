<?php

namespace Billing\Invoicer\Domain\Repository;

interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getUninvoicedOrders();
}
