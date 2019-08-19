<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_room extends Model
{
    protected $table = 'user_room';

    protected $primaryKey = 'id_userRoom';

    protected $fillable = [
        'id_user',
        'id_room',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
