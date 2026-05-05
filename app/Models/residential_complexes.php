<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class residential_complexes extends Model
{
    protected $fillable = [
        "title",
        "address",
        "description",
        "image",
        "is_active",
    ];
}
