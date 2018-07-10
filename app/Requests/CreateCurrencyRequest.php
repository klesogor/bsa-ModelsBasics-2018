<?php

namespace App\Requests;

class CreateCurrencyRequest
{
    use ThrowsLogicException;

    private $name;

    function __construct(string $name)
    {
        $this->validate($name);
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function validate(string $name)
    {
        if(trim($name) == '') {
            throw $this->makeException('name', 'not empty string');
        }
    }
}