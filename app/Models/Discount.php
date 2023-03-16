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

    public function isValid($total)
    {
        if ($this->expiration_date && $this->expiration_date < now()) {
            return false;
        }

        if ($this->payment_limit && $this->payment_limit > $total) {
            return false;
        }

        if ($this->limit_number && $this->limit_number < $this->number_used) {
            return false;
        }

        return true;
    }
}
