<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected  $primaryKey = 'pk_i_id';

    public $timestamps = false;

    protected $fillable =
    [
        's_name',
        's_slug',
        'fk_i_region_id',
        'fk_c_country_code'
    ];

    protected $with = ['itemLocations'];

    public function areas()
    {
        return $this->hasMany(Area::class,'fk_i_city_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'fk_i_region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'fk_c_country_code');
    }

    public function itemLocations()
    {
        return $this->hasMany(ItemLocation::class,'fk_i_city_id');
    }

}
