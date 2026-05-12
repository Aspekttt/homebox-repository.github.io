<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\containers;

class containers_controller extends Controller
{
    public function Containers_Application() {
        $per = containers::all();
        $per = containers::with('residentialComplex')->get();
        return view("containers", compact("per"));
    }

    public function Containers_Show($id) {
        $container = containers::findOrFail($id);
        return view("container_card", compact("container"));
    }

}
