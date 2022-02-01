<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'pk_c_code',
        's_name',
        's_slug',
    ];

    protected $with = ['itemLocations','cities'];

    // protected $primaryKey = 'pk_c_code';

    public $timestamps = false;

    public function regions()
    {
        return $this->hasMany(Country::class,'fk_c_country_code');
    }

    public function cities()
    {
        return $this->hasMany(City::class,'fk_c_country_code','pk_c_code');
    }

    public function itemLocations()
    {
        return $this->hasMany(ItemLocation::class,'fk_c_country_code','pk_c_code');
    }

}
