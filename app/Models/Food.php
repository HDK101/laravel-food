<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_in_cents', 'filename'];

    public function price() {
        return $this->price_in_cents / 100;
    }

    public function formattedPrice() {
        $formatted = number_format($this->price(), 2, ',');
        return "R$ $formatted";
    }
}
