@extends('cliente.cliente')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Categorias</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Categorias</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <div class="pagination justify-content-end">
        {!! $categoriasShow->links() !!}
    </div>
    <div class="d-table-cell align-middle">
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($categoriasShow as $categoriaShow)
                                    <tr>
                                        <td><b>{{ $categoriaShow->nombre }}</b></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('categoriaShow.show', $categoriaShow->id) }}"
                                                    class="primary-btn order-submit">Ir <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination justify-content-end">
        {!! $categoriasShow->links() !!}
    </div>
@endsection
