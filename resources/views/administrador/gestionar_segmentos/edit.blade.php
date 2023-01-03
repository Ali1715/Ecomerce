@extends('administrador.admin')
@section('content')
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Segmento</h1>
        </div>

        <div class="card-header d-inline-flex">
            <a href="{{ route('segmentos.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>

        <div class="card-body">

            <p class="h5">Nombre: </p>
            <p class="form-control"> {{ $segmento->name }}</p>

            <h2 class="h5"> Listado de clientes</h2>

            {!! Form::model($segmento, ['route' => ['segmentos.update', $segmento], 'method' => 'PUT']) !!}
            @foreach ($personas as $persona)
                <div>
                    <label>
                        {!! Form::checkbox('personas[]', $persona->id, null, ['class' => 'mr-1']) !!}
                        {{ $persona->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Modificar segmento', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}


        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
