<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function parent()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'parent_id');
    }
}
