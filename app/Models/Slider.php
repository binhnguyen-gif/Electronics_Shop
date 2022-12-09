<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'img', 'trash', 'status'];
    // PostModel::withTrashed()->where('id', 1)->restore();
    // PostModel::withTrashed()->where('id', 1)->forceDelete();
}