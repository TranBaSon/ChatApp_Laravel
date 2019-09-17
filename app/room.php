<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = 'room';

    protected $primaryKey = 'id_room';

    protected $fillable = [
        'name',
        'is_active',
        'password',
        'created_at',
        'updated_at'
    ];
}
