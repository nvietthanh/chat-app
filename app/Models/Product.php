<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'attributes' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function branch()
    {
        return $this->hasOne(ProductBranch::class, 'id', 'product_branch_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'product_category_id');
    }
}
