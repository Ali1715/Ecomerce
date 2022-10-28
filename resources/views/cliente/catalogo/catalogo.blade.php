@extends('cliente.cliente')
@section('content')
    <center>
        <h1>CATÁLOGO</h1>
    </center>
    <!-- store products -->
    <div class="pagination justify-content-end">
        {!! $productos->links() !!}
    </div>
    <div class="row">
        <?php
        $c = 0;
        $a = 0;
        ?>
        @foreach ($productos as $producto)
            <?php
            $c = $c + 1;
            $a = $a + 1;
            ?>
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
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                    wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                    compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                    view</span></button>
                            <form action="{{ route('detalleCarrito.store') }}" method="POST" enctype="multipart/form-data"
                                id="create{{$a}}">
                                @csrf
                                <input type="number" id="cantidad" name="cantidad" min="1" max="1000"
                                    value="1">
                                <input type="hidden" name="precio" id="precio" value="{{ $producto->precioUnitario }}">
                                <input type="hidden" name="idProducto" id="idProducto" value="{{ $producto->id }}">
                                @auth
                                <input type="hidden" name="idCarrito" id="idCarrito" value="{{ $carrito->id }}">
                                @endauth
                            </form>
                        </div>
                    </div>
                    @guest
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="/login"> add to
                                    cart </a> </button>
                        </div>
                    @else
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" form="create{{$a}}"><i class="fa fa-shopping-cart"></i> add to
                                cart</button>
                        </div>
                    @endguest
                </div>
            </div>
            @if ($c == 3)
                <div class="col-md-12 col-xs-6">
                    <div class="product">
                    </div>
                </div>
                <?php
                $c = 0;
                ?>
            @endif
        @endforeach
        <div class="col-md-12 col-xs-6">
            <div class="product">
            </div>
        </div>
    </div>
    <div class="pagination justify-content-end">
        {!! $productos->links() !!}
    </div>
@endsection
