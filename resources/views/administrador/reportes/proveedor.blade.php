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
    <h4>Reporte de Proveedores</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td> {{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->celular }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
