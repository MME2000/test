<?php

namespace App\Models;

use App\Models\ItemLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    protected $fillable =
    [
        's_name',
        's_slug',
        'fk_c_country_code'
    ];

    protected  $primaryKey = 'pk_i_id';

    protected $with = ['itemLocations'];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany(City::class,'fk_i_region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'fk_c_country_code');
    }


    public function itemLocations()
    {
        return $this->hasMany(ItemLocation::class,'fk_i_region_id');
    }

}
