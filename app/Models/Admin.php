<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        's_name',
        's_username',
        's_password',
        'b_moderator'
    ];

    protected $primaryKey = 'pk_i_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
