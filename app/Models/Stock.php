<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pharmaceuticals()
    {
        return $this->hasMany(Pharmaceutical::class);
    }
}
