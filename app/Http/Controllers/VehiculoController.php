<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    //
    public function index() {
        $cars = Vehiculo::join('modelos', 'modelos.id', '=', 'vehiculos.id_modelo')
        ->join('marcas', 'marcas.id', '=', 'modelos.id_marca')
        ->select('vehiculos.id as id', 'marcas.nombre as NombreMarca', 'modelos.nombre as NombreModelo', 'modelos.version', 
        'modelos.anho', 'vehiculos.precio', 'vehiculos.fecha_ingreso')
        ->get();

        return view('cars.index', compact('cars'));
    }

    public function show($id) {
        return Vehiculo::join('modelos', 'modelos.id', '=', 'vehiculos.id_modelo')
        ->join('marcas', 'marcas.id', '=', 'modelos.id_marca')
        ->select('marcas.nombre', 'modelos.nombre', 'modelos.version', 
        'modelos.anho', 'vehiculos.precio', 'vehiculos.fecha_ingreso')
        ->where('vehiculos.id', $id)
        ->get();
    }

    public function create() {
        return view('cars.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_modelo' => 'required',
            'precio' => 'required',
            'fecha_ingreso' => 'required',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('cars.index')->with('success', 'El Vehículo ha sido ingresado exitosamente');
    }

    public function edit(Vehiculo $vehiculo) {
        return view('cars.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo) {
        $request->validate([
            'id_modelo' => 'required',
            'precio' => 'required',
            'fecha_ingreso' => 'required',
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('cars.index')->with('success', 'El Vehículo ha sido modificado exitosamente');
    }

    public function destroy(Vehiculo $vehiculo) {
        $vehiculo->delete();
        
        return redirect()->route('cars.index')->with('success', 'El Vehículo seleccionado ha sido eliminado');
    }
}
