<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLocation extends Model
{
    use HasFactory;

    protected $fillable= [
        'fk_i_item_id',
        'fk_c_country_code',
        's_country',
        's_address',
        's_zip',
        'fk_i_region_id',
        's_region',
        'fk_i_city_id',
        's_city',
        'fk_i_city_area_id',
        's_city_area',
        'd_coord_lat',
        'd_coord_long'
    ];

    public $timestamps = false;

    // protected $with = ['item'];

    public function item()
    {
        return $this->belongsTo(Item::class,'fk_i_item_id','id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'fk_c_country_code','pk_c_code');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'fk_i_region_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'fk_i_city_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'fk_i_city_area_id');
    }
}
