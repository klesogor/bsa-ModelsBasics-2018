<?php

namespace App\Requests;

class CreateCurrencyRequest
{
    private $name;

    function __construct(string $name)
    {
        if(empty($name))
            throw new \LogicException('Name can\'t be empty!');
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}