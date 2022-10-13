@extends('administrador.admin')
@section('content')
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Roles</h1>
        </div>

        <div class="card-header d-inline-flex">
            <a href="{{ route('roles.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>

        <div class="card-body">

            <p class="h5">Nombre: </p>
            <p class="form-control"> {{ $user->name }}</p>

            <h2 class="h5"> Listado de roles</h2>

            {!! Form::model($user, ['route' => ['roles.update', $user], 'method' => 'PUT']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('AsignarRol', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}


        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
