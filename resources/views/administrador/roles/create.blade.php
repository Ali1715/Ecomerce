@extends('administrador.admin')
@section('content')
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Crear Roles</h1>
        </div>

        <div class="card-header d-inline-flex">
            <a href="{{ route('roles.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>

        <div class="card-body">
            <form action="{{ route('roles.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <input type="text" placeholder="name" class="form-control" name="name"
                        value="{{ isset($role) ? $role->name : old('name') }}">
                    <label>Nombre</label>
                </div>
                @foreach ($permisos as $permiso)
                    <div>
                        <label>
                            {!! Form::checkbox('permisos[]', $permiso->id, null, ['class' => 'mr-1']) !!}
                            {{ $permiso->name }}
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
