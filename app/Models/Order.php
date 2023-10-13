<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function foods() {
        return $this->hasMany(FoodOrder::class);
    }

    public function client() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function totalPrice() {
        return $this->foods()->get()->sum(fn($food) => $food->price());
    }

    public function totalPriceFormatted() {
        $calculatedPrice = number_format($this->totalPrice() / 100, 2, ',');
        return "R$ $calculatedPrice";
    }
}
