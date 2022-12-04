@extends('cliente.cliente')
@section('content')
    <div class="card mt-4">
        @include('layouts.messages')
        <div class="card-body">
            <div class="card-header d-inline-flex">
                <a href="{{ route('pagos.index') }}" class="btn btn-primary ml-auto">
                    <i class="fa fa-arrow-left"></i>
                    Volver</a>
            </div><br>
            <form action="{{route('pagos.store')}}" method="POST" enctype="multipart/form-data" id="create">
                @include('cliente.metodoDePago.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="create">
                <i class="fa fa-plus"></i> Hecho
            </Button>
        </div>
    </div>
@endsection
