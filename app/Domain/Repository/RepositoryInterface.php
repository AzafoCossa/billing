<?php

namespace Billing\Invoicer\Domain\Repository;

interface RepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function persist($entity);
    public function begin();
    public function comit();
}
