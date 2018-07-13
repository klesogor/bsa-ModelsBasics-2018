<?php

namespace App\Requests;

use Illuminate\Support\Facades\Validator;

class CreateCurrencyRequest
{

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
       $validator = Validator::make(['name'=>$name],
           ['name=>required|string']);
        if($validator->fails())
            throw new \LogicException($validator->errors());
    }
}