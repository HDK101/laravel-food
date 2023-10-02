<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_in_cents'];

    public function formattedPrice() {
        return $this->price_in_cents / 100;
    }
}
