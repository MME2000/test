<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemResource extends Model
{
    use HasFactory;

    protected $fillable = [
        's_path',
    ];

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
