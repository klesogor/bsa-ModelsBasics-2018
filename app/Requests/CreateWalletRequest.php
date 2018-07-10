<?php

namespace App\Requests;

class CreateWalletRequest
{
    // todo implement

    private $userId;

    function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}

