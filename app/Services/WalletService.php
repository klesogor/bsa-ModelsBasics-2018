<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 10.07.2018
 * Time: 12:33
 */

namespace App\Services;


use App\Entity\Wallet;
use App\Requests\CreateWalletRequest;
use Illuminate\Support\Collection;

class WalletService implements WalletServiceInterface
{

    public function findByUser(int $userId): ?Wallet
    {
        return Wallet::whereHas('user',function($query)use ($userId){
            $query->where('id',$userId);
        })
            ->first();
    }

    public function create(CreateWalletRequest $request): Wallet
    {
        return Wallet::create([
                'user_id' => $request->getUserId()
            ]);
    }

    public function findCurrencies(int $walletId): Collection
    {
        return Wallet::find($walletId)->currencies;
    }
}