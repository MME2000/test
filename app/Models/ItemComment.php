<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemComment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'fk_i_item_id',
        'dt_pub_date',
        's_title',
        's_author_name',
        's_author_email',
        's_body',
        'b_enabled',
        'b_active',
        'b_spam',
        'fk_i_user_id',
    ];

    public $timestamps = false;
    protected $primaryKey = 'pk_i_id';

    public function item()
    {
        return $this->belongsTo(Item::class,'fk_i_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'fk_i_user_id');
    }
}
