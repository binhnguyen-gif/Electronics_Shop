<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'alias',
        'avatar',
        'img',
        'sortDesc',
        'detail',
        'producer_id',
        'number',
        'number_buy',
        'sale',
        'price',
        'price_sale',
        'status',
        'created_by',
        'updated_by'
    ];

    public function getTrademarkAttribute() {
        $categoryName = Category::query()->findOrFail($this->category_id);
        return $categoryName['name'];
    }
}
