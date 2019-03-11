<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AutomotiveParts extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'manufacturer',
        'name',
        'description',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
