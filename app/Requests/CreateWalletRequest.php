<?php

namespace App\Requests;

use App\Entity\Wallet;
use Illuminate\Support\Facades\Validator;

class CreateWalletRequest
{

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
        $validator = Validator::make(['user_id'=>$userId],
            ['user_id'=>'required|integer|min:1|unique:wallet']);
        if($validator->fails())
            throw new \LogicException($validator->errors());
    }
}

