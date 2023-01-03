<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h4>Reporte de Productos</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->precioUnitario }}</td>
                    @foreach ($marcas as $marca)
                        @if ($marca->id == $producto->idmarca)
                            <td>{{ $marca->nombre }}</td>
                        @endif
                    @endforeach
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == $producto->idcategoria)
                            <td>{{ $categoria->nombre }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
