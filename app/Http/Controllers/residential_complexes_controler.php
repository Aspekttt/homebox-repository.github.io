<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\residential_complexes;
use App\Models\containers;

class residential_complexes_controler extends Controller
{
    public function Residential_Complexes_Application() {
        $app = residential_complexes::all();
        return view("complexes", compact("app"));
    }

    public function Complex_Card_Show($id) {
        $complex = residential_complexes::findOrFail($id);

        $per = containers::where('residential_complex_id', $id)->with('residentialComplex')->get();
        return view("complex_card", compact("complex", "per"));
    }

}
