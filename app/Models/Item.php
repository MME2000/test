<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        's_contact_email',
        'description',
        'dt_pub_date',
        'dt_expiration',
        'i_price'
    ];

    // protected $with = ['itemResources','itemLocation','comments'];

    public $timestamps = false;

    public function itemResources()
    {
        return $this->hasMany(ItemResource::class);
    }

    public function comments()
    {
        return $this->hasMany(ItemComment::class,'fk_i_item_id');
    }

    public function itemLocation()
    {
        return $this->hasOne(ItemLocation::class,'fk_i_item_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemStat()
    {
        return $this->hasOne(ItemState::class,'fk_i_item_id');
    }
}
