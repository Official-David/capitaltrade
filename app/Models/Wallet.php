<?php

namespace App\Models;

use App\Enums\WalletStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    public function UserWallet()
    {
        return $this->hasMany(UserWallet::class);
    }
    protected $casts = [
        'status' => WalletStatus::class,
    ];
}
