<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mantenedor de Vehículos</title>
        @vite(['resources/js/app.js', 'resources/css/app.scss'])
    </head>
    <body class="antialiased">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Editar Vehículo</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('cars.index') }}"> Volver</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-6 margin-tb">
                    <form action="{{ route('cars.update', $car->id) }}" method="post" class="mt-3">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="selectMarca" class="form-label">
                                Marca
                            </label>
                            <select name="selectMarca" class="form-control">
                                <option value="0">Seleccione una opción</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="selectModel" class="form-label">
                                Modelo
                            </label>
                            <option value="0">Seleccione una opción</option>
                        </div>
                        <div class="mb-3">
                            <label for="inputPrecio" class="form-label">
                                Precio
                            </label>
                            <input type="number" name="inputPrecio" id="inputPrecio" class="form-control" required value="{{ $car->precio }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputFechaIngreso" class="form-label">
                                Fecha de Ingreso
                            </label>
                            <input type="date" name="inputFechaIngreso" id="inputFechaIngreso" class="form-control" required value="{{ $car->fecha_ingreso }}">
                        </div>
                        <button type="submit" class="btn btn-success">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>