<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'can_manage_foods', 'can_manage_orders', 'can_order'];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
