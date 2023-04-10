<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;

    public function wallets()
    {
        return $this->belongsTo(Wallet::class, 'wallet_name', 'name');
    }
}
