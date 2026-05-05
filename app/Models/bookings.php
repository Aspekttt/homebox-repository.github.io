<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $fillable = [
        "user_id",
        "container_id",
        "start_date",
        "end_date",
        "total_price",
        "status",
        "comment",
    ];
}
