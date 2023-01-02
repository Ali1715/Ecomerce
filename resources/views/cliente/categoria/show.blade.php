@extends('cliente.cliente')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ $categoria->nombre }}</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li class="active">Categorías</li>
                        <li class="active">{{ $categoria->nombre }}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- store products -->
    <div class="pagination justify-content-end">
        {!! $productosS->links() !!}
    </div>
    <div class="row">
        <?php
        $c = 0;
        $a = 0;
        ?>
        @foreach ($productosS as $producto)
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
                            @if ($producto->idpromocion != '')
                                @foreach ($promociones as $promocion)
                                    @if ($producto->idpromocion == $promocion->id)
                                        <span class="sale">-{{ $promocion->descuento }}%</span>
                                        <?php $descuento = $promocion->descuento / 100; ?>
                                    @endif
                                @endforeach
                            @endif
                            @if ($producto->stock == 0)
                                <span class="new">Sin Stock</span>
                            @endif
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $categoria->nombre }}</p>
                        <h3 class="product-name"><a href="#">{{ $producto->name }}</a></h3>
                        @if ($producto->idpromocion != '')
                            <h4 class="product-price">Bs
                                {{ $producto->precioUnitario - $producto->precioUnitario * $descuento }}
                                <del class="product-old-price">Bs {{ $producto->precioUnitario }}</del>
                            </h4>
                        @else
                            <h4 class="product-price">Bs {{ $producto->precioUnitario }}
                            </h4>
                        @endif
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
                                id="create{{ $a }}">
                                @csrf
                                <input type="number" id="cantidad" name="cantidad" min="1" max="1000"
                                    value="1">
                                @if ($producto->idpromocion != '')
                                    <input type="hidden" name="precio" id="precio"
                                        value="{{ $producto->precioUnitario - $producto->precioUnitario * $descuento }}">
                                @else
                                    <input type="hidden" name="precio" id="precio"
                                        value="{{ $producto->precioUnitario }}">
                                @endif
                                <input type="hidden" name="idProducto" id="idProducto" value="{{ $producto->id }}">
                                @auth
                                    <input type="hidden" name="idCarrito" id="idCarrito" value="{{ $carrito->id }}">
                                @endauth
                            </form>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn" form="create{{ $a }}"><i
                                class="fa fa-shopping-cart"></i> add to
                            cart</button>
                    </div>
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
        {!! $productosS->links() !!}
    </div>
@endsection
