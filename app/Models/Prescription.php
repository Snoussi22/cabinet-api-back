<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    public function pharmaceuticals()
    {
        return $this->belongsToMany(Pharmaceutical::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
