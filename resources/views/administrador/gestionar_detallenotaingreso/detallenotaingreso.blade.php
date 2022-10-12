@yield('contend')
<div class="row">
    <div class="col-md-12">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message')}}</div>
    @endif

<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-110">
            <div class="card">
<div class="card-body">
<table class="table table-bordered border-primary align-middle">

								<div class="m-sm-4">
                                <h1 class="h2">Detalle de Nota</h1>
  <thead>
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Costo $</th>
	  <th scope="col">Total $</th>
	  <th scope="col">Observacion</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
 
                    <tr>
                    <td >0001</td>
                        <td>Bateria Dell</td>
                        <td>20</td>
                        <td>100</td>
						<td>2000</td>
						<td>En mal estado, bateria inchada</td>
   
    </tr>
 
  </tbody>
</table>
</div>
            </div>