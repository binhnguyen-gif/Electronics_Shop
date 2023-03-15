<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'code',
        'discount',
        'limit_number',
        'payment_limit',
        'expiration_date',
        'description',
        'status'
    ];

    public function scopeExpirationDate($query, $param) {
        return $query->whereDate('expiration_date', '<=', $param);
    }
}
