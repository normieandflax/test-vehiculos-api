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
                        <h2>Lista de Vehículos</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('cars.create') }}"> Agregar Vehículo</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Versión</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Fecha de Ingreso</th>
                    <th>Acciones</th>
                </tr>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->NombreMarca }}</td>
                    <td>{{ $car->NombreModelo }}</td>
                    <td>{{ $car->version }}</td>
                    <td>{{ $car->anho }}</td>
                    <td>${{ $car->precio }}</td>
                    <td>{{ $car->fecha_ingreso }}</td>
                    <td>
                        <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('cars.edit',$car->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
