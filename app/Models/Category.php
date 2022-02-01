<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'description',
        'parent_id',
        'i_expiration_days',
        'i_position',
        'b_enabled',
        'b_price_enabled',
        's_icon',
    ];

    // protected $with = ['subCategory','items'];

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
