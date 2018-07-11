<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 10.07.2018
 * Time: 12:33
 */

namespace App\Services;


use App\Entity\Currency;
use App\Entity\User;
use App\Entity\Wallet;
use App\Requests\CreateWalletRequest;
use Illuminate\Support\Collection;

class WalletService implements WalletServiceInterface
{

    public function findByUser(int $userId): ?Wallet
    {
        //this one looks a bit faster, I guess
        /**
       $user = User::with('wallet')->find($userId);
       return $user->wallet ?? null;
        **/

        return Wallet::whereHas('user',function($query)use($userId){
            $query->where('id',$userId);
        })->first();
    }

    public function create(CreateWalletRequest $request): Wallet
    {
        return Wallet::create([
                'user_id' => $request->getUserId()
            ]);
    }

    public function findCurrencies(int $walletId): Collection
    {
        //TO DO: try to rewrite using hasManyThrough
        return Currency::whereHas('money',function($query) use ($walletId){
            $query->where('wallet_id',$walletId);
        })->get();
    }
}