@extends('administrador.admin')



@section('content')





            
<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-110">
				
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
				<div class="text-center mt-3">
                                          
										 
										</div>
										
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							
							<h1 class="h2">Modificar Producto</h1>
							<p class="lead">
								Asegurese de ingresar los datos correctos
								
							</p>
							
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
                                    <!--route de form -->
									<form action="{{ url('administrador/detallenotaingreso/'.$dato->id)}}" method="POST" enctype="multipart/form-data" >
										@csrf
										@method('PUT')
                                <!--  {{csrf_field()}}  -->
                                        <!--  -->
										<div class="mb-3">
											<label class="form-label">Nombre</label>
											<input class="form-control form-control-lg" type="text" name="nombre" value="{{$dato->name}}" placeholder="Ingrese el nombre del producto" />
										@error('nombre')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Descripcion</label>
											<input class="form-control form-control-lg" type="text" name="descripcion" value="{{$dato->descripcion}}" placeholder="Ingrese una descripcion" />
										@error('descripcion')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Costo</label>
											<input class="form-control form-control-lg" type="decimal" name="costo" value="{{$dato->precioStock}}" placeholder="00.00" />
										@error('costo')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Precio</label>
											<input class="form-control form-control-lg" type="decimal" name="precio" value="{{$dato->precioUnitario}}" placeholder="00.00" />
										@error('precio')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Categoria</label>
											<input class="form-control form-control-lg" type="text" name="categoria" value="{{$dato->idcategoria}}" placeholder="" />
										@error('categoria')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Marca</label>
											<input class="form-control form-control-lg" type="text" name="marca" value="{{$dato->idmarca}}" placeholder="" />
										@error('marca')
										<small class="text-danger">{{$message}}</small>
										@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Imagen</label>
											<input class="form-control" type="file" name="imagen"  />
									
										</div>
										
										
										
										<div class="text-center mt-3">
											
											<button type="submit" class="btn btn-lg btn-primary">Guardar</button>
											<a href="{{ url('administrador/detallenotaingreso/producto')}}" class="btn btn-primary float-end">Volver</a>
                                        
										 
										</div>
										
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

</div>





@endsection
   