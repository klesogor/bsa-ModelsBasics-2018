<?php

namespace App\Requests;

use App\Entity\Wallet;

class CreateWalletRequest
{
    use ThrowsLogicException;

    private $userId;

    function __construct(int $userId)
    {
        $this->validate($userId);
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    private function validate(int $userId){
        if($userId <= 0) {
            throw $this->makeException('user_id', ' greater than zero');
        }
        if(Wallet::where('user_id',$userId)->first()){
            throw $this->makeException('user_id', 'unique value');
        }
    }
}

