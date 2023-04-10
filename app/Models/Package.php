<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function investments()
    {
        return $this->hasMany(Investment::class, 'package_id', 'id');
    }
}
