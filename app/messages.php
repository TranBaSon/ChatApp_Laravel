<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id_messages';

    protected $fillable = [
        'id_room',
        'id_user',
        'content',
        'created_at',
        'updated_at'
    ];
}
