@extends('cliente.cliente')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="store" class="col-md-12">
                    <!-- store products -->
                    <div class="row">
                        <div class="card-body">
                            <div class="pagination justify-content-end">
                                {!! $productos->links() !!}
                            </div>
                        </div>
                        @foreach ($productos as $producto)
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('public/img/' . $producto->imagen) }}" alt="...">
                                        <div class="product-label">
                                            <!--<span class="sale">-30%</span>
                                                <span class="new">NEW</span>-->
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        @foreach ($categorias as $categoria)
                                            @if ($categoria->id == $producto->idcategoria)
                                                <p class="product-category">{{ $categoria->nombre }}</p>
                                            @endif
                                        @endforeach
                                        <h3 class="product-name"><a href="#">{{ $producto->name }}</a></h3>
                                        <h4 class="product-price">Bs {{ $producto->precioUnitario }}
                                            <!--<del class="product-old-price">Bs {{ $producto->precioUnitario }}</del>-->
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                            cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 col-xs-6">
                            <div class="product">
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-6">
                            <div class="product">
                            </div>
                        </div>
                        <div class="pagination justify-content-end">
                            {!! $productos->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
