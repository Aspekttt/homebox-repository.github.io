<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class containers extends Model
{
    protected $fillable = [
        "residential_complex_id",
        "number",
        "size_category",
        "area",
        "volume",
        "floor_or_location",
        "description",
        "image",
        "daily_price",
        "status",
    ];
}
