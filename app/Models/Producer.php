<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'producers';

    protected $fillable = ['name', 'code', 'keyword', 'status', 'created_by', 'updated_by'];

    public function getPosterAttribute() {
        $poster = User::query()->findOrFail($this->updated_by)->toArray();
        return $poster['name'];
    }
}
