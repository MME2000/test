<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestSearches extends Model
{
    use HasFactory;

    protected $fillable = [
        'd_date',
        's_search'
    ];

    public $timestamps = false;
}
