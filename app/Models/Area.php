<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'pk_i_id',
        'fk_i_city_id',
        's_name'
    ];

    protected $primaryKey = 'pk_i_id';

    // protected $with = ['itemLocations'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class,'fk_i_city_id');
    }

    public function itemLocations()
    {
        return $this->hasMany(ItemLocation::class,'fk_i_city_area_id');
    }
}
