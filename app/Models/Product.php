<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    use ElasticquentTrait;

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

     protected $mappingProperties = array(
        'name' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'detail' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
      );

    public function getTrademarkAttribute() {
        $categoryName = Category::query()->findOrFail($this->category_id);
        return $categoryName['name'];
    }
}
