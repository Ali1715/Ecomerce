@yield('content')
<div class="card-body">
<table class="table table-bordered border-primary align-middle">

								<div class="m-sm-4">
                                <h1 class="h2">Nueva Nota de Ingreso</h1>
  <thead>
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">FechaHora</th>
      <th scope="col">Elaborado por</th>
      <th scope="col">Total</th>

   
    </tr>
  </thead>
  <tbody class="table-group-divider">

                    <tr>
                    <td >{{$dato->id}}</td>
                        <td>{{$dato->created_at}}</td>
                        <td>{{$dato->idempleado}}</td>
                        <td>{{$dato->total}}</td>
                       
               
 
    </tr>
  
  </tbody>
</table>


</div>



         
