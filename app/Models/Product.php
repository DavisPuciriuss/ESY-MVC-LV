<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'count', 'price'];

    public function getTaxPriceAttribute()
    {
        return $this->count * $this->price * (1 + config('app.tax'));
    }
}
