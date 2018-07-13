<?php

namespace App\Requests;


use Illuminate\Support\Facades\Validator;

class CreateMoneyRequest
{

    private $currencyId;

    private $walletId;

    private $amount;

    public function __construct(int $currencyId, int $walletId, float $amount)
    {
        $this->validate($currencyId,$walletId);
        $this->currencyId = $currencyId;
        $this->walletId = $walletId;
        $this->amount = $amount;
    }

    public function getCurrencyId(): int
    {
        return $this->currencyId;
    }

    public function getWalletId(): int
    {
        return $this->walletId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    private function validate(int $currencyId, int $walletId)
    {
        $validator = Validator::make(['currency_id'=>$currencyId,'wallet_id'=>$walletId],
            ['currency_id'=>'required|integer|min:1','wallet_id'=>'required|integer|min:1']);
        if($validator->fails())
            throw new \LogicException($validator->errors());
    }
}