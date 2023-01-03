@extends('administrador.admin')
@section('content')
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Crear Segmento de Clientes</h1>
        </div>

        <div class="card-header d-inline-flex">
            <a href="{{ route('segmentos.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>

        <div class="card-body">
            <form action="{{ route('segmentos.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <input type="text" placeholder="name" class="form-control" name="name"
                        value="{{ isset($segmento) ? $segmento->name : old('name') }}">
                    <label>Nombre</label>
                </div>
                @foreach ($personas as $persona)
                    <div>
                        <label>
                            {!! Form::checkbox('personas[]', $persona->id, null, ['class' => 'mr-1']) !!}
                            {{ $persona->name }}
                        </label>
                    </div>
                @endforeach
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
