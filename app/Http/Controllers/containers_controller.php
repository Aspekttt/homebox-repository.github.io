<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\containers;
use App\Models\residential_complexes;
use Illuminate\Support\Facades\DB;

class containers_controller extends Controller
{
    public function Containers_Data(Request $request) {
        $query = containers::with('residentialComplex');

        // Фильтр по ЖК
        if ($request->has('complexes') && !in_array('all', $request->complexes)) {
            $query->whereIn('residential_complex_id', $request->complexes);
        }

        // Фильтр по площади
        if ($request->has('area_from') && $request->area_from !== null) {
            $query->where(DB::raw('CAST(area as DECIMAL(10,2))'), '>=', $request->area_from);
        }
        if ($request->has('area_to') && $request->area_to !== null) {
            $query->where(DB::raw('CAST(area as DECIMAL(10,2))'), '<=', $request->area_to);
        }

        // Фильтр по цене
        if ($request->has('price_from') && $request->price_from !== null) {
            $query->where(DB::raw('CAST(daily_price as DECIMAL(10,2))'), '>=', $request->price_from);
        }
        if ($request->has('price_to') && $request->price_to !== null) {
            $query->where(DB::raw('CAST(daily_price as DECIMAL(10,2))'), '<=', $request->price_to);
        }

        // Фильтр по статусу
        if ($request->has('statuses') && !in_array('any', $request->statuses)) {
            $query->whereIn('status', $request->statuses);
        }

        // Фильтр по доступности на даты
        if ($request->has('date_from') && $request->has('date_to') && $request->date_from && $request->date_to) {
        $bookedContainerIds = DB::table('bookings')->where(function($q) use ($request) {
                $q->whereBetween('start_date', [$request->date_from, $request->date_to])->orWhereBetween('end_date', [$request->date_from, $request->date_to])->orWhere(function($q2) use ($request) {
                    $q2->where('start_date', '<=', $request->date_from)->where('end_date', '>=', $request->date_to);
                });
            })->whereNotIn('status', ['Отменена', 'Завершена', 'Отклонена'])->pluck('container_id')->toArray();

        if (!empty($bookedContainerIds)) {
            $query->whereNotIn('id', $bookedContainerIds);
        }
}

        $sort = $request->get('sort', 'default');

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('daily_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('daily_price', 'desc');
                break;
            case 'area_asc':
                $query->orderBy('area', 'asc');
                break;
            case 'area_desc':
                $query->orderBy('area', 'desc');
                break;
            default:
                $query->latest();
                break;
    }

    $per = $query->get();
    $currentSort = $sort;

    $residentialComplexes = residential_complexes::all();

    $queryParams = $request->except('sort');

        return view("containers", compact("per", "currentSort", "queryParams", "residentialComplexes"));
    }

    public function Containers_Show($id) {
        $container = containers::with('residentialComplex')->findOrFail($id);
        return view("container_card", compact("container"));
    }

}
