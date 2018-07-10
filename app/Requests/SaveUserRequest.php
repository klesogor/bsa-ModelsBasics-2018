<?php

namespace App\Requests;

use App\Entity\User;

class SaveUserRequest
{
    use ThrowsLogicException;

    private $id;

    private $name;

    private $email;

    public function __construct(?int $id, string  $name, string $email)
    {
        $this->validate($id,$name,$email);
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function validate(?int $id,string  $name, string $email)
    {
        if($id !== null && $id<=0) {
            throw $this->makeException('id', ' greater than zero');
        }
        if(trim($name) == '') {
            throw $this->makeException('name', 'not empty string');
        }
        if(trim($email) == '') {
            throw $this->makeException('email', 'not empty string');
        }
        if(User::where('email',$email)->first()) {
            throw $this->makeException('email', 'unique value');
        }
    }
}

