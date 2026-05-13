<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\residential_complexes;
use App\Models\containers;

class residential_complexes_controler extends Controller
{
    public function Residential_Complexes_Data() {
        $app = residential_complexes::all();
        return view("complexes", compact("app"));
    }

    public function Complex_Card_Show(Request $request, $id) {
        $complex = residential_complexes::findOrFail($id);

        $per = containers::where('residential_complex_id', $id)->with('residentialComplex')->get();

        $query = containers::with('residentialComplex')->where('residential_complex_id', $id);
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
        $queryParams = $request->except('sort');

        return view("complex_card", compact("complex", "per", "currentSort", "queryParams"));
    }

}
