<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'level', 'parent_id', 'orders', 'status', 'created_by', 'updated_by'];

    public function getCategoryNameAttribute() {
//        dd($this->name);
//        return $this->parent_id == $this->id ? $this->name : '';
//        return $this->name;
    }

    public function getCountParentIdAttribute() {
        $countParentId = Category::query()->whereParentId($this->id)->count();
        return $countParentId;
    }

    public function getPosterAttribute() {
        $poster = User::query()->findOrFail($this->updated_by)->toArray();
        return $poster['name'];
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
