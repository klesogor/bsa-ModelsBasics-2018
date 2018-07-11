<?php

namespace App\Requests;


class CreateMoneyRequest
{
    use ThrowsLogicException;

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
        if($currencyId <= 0) {
            throw $this->makeException('currency_id', ' greater than zero');
        }
        if($walletId <= 0) {
            throw $this->makeException('wallet_id', ' greater than zero');
        }
    }
}