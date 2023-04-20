<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    //
    public function index() {
        $brands = Marca::select('id', 'nombre')->get();

        return view('cars.create', compact('brands'));
    }
}
