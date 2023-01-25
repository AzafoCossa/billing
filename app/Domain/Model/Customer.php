<?php

namespace Billing\Invoicer\Domain\Model;

class Customer extends AbstractModel
{
    protected $name;
    protected $email;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEnail($email)
    {
        $this->email = $email;
        return $this;
    }
}
