<?php

namespace blog\blogsystem\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{


    protected $fillable = [
        'name',
        'original_name',
        'photostable_id',
        'photostable_type',
        'default',
    ];


}
