<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_discount', // Adicionado à lista $fillable
    ];

    public function foods() {
        return $this->hasMany(FoodOrder::class);
    }

    public function client() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function totalPrice() {
        $discount = $this->attributes['coupon_discount'];
        return $this->foods()->get()->sum(fn($food) => ($food->price() * $food->quantity) * (1 - $discount/100));
    }

    public function totalPriceFormatted() {
        $calculatedPrice = number_format($this->totalPrice(), 2, ',');
        return "R$ $calculatedPrice";
    }
}
