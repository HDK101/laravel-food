<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_in_cents', 'quantity'];

    public function price() {
        return $this->price_in_cents / 100;
    }

    public function formattedPrice() {
        $formatted = number_format($this->price() / 100, 2, ',');
        return "R$ $formatted";
    }
}
