<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class containers extends Model
{
    protected $table = 'containers';

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

    public function residentialComplex() {
        return $this->belongsTo(residential_complexes::class, 'residential_complex_id');
    }

    public function bookings() {
        return $this->hasMany(bookings::class, 'container_id');
    }

    public function isAvailable($start_date, $end_date) {
        $conflict = $this->bookings()->where(function($q) use ($start_date, $end_date) {
                $q->whereBetween('start_date', [$start_date, $end_date])->orWhereBetween('end_date', [$start_date, $end_date])->orWhere(function($q2) use ($start_date, $end_date) {
                      $q2->where('start_date', '<=', $start_date)->where('end_date', '>=', $end_date);
                  });
            })->whereIn('status', ['Новая', 'Подтверждена'])->exists();

        return !$conflict;
    }
}
