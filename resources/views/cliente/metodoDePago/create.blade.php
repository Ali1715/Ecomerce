@extends('cliente.cliente')
@section('content')
    <div class="card mt-4">
        @include('layouts.messages')
        <div class="card-body">
            <div class="card-header d-inline-flex">
                <a href="{{ route('pagos.index') }}" class="primary-btn order-submit">
                    <i class="fa fa-arrow-left"></i>
                    Volver</a>
            </div><br>
            <form action="{{route('pagos.store')}}" method="POST" enctype="multipart/form-data" id="create">
                @include('cliente.metodoDePago.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="primary-btn order-submit" form="create">
                <i class="fa fa-check"></i> Hecho
            </Button>
        </div>
    </div>
@endsection
