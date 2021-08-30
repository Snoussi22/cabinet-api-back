<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmaceutical extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function prescriptions()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function stocks()
    {
        return $this->belongsTo(Stock::class);
    }
}
