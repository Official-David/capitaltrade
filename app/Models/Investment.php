<?php

namespace App\Models;

use App\Enums\InvestmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investment extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => InvestmentStatus::class,
        'next_run' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function packages()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}
