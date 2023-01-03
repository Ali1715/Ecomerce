@extends('cliente.cliente')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ $producto->name }}</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li class="">Producto</li>
                        <li class="active">{{ $producto->name }}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{ asset('public/img/' . $producto->imagen) }}" alt="">
                        </div>
                        <!--
                                                                    <div class="product-preview">
                                                                        <img src="./img/product03.png" alt="">
                                                                    </div>
                                                                    -->
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{ asset('public/img/' . $producto->imagen) }}" alt="">
                        </div>
                        <!--
                                                                    <div class="product-preview">
                                                                        <img src="./img/product03.png" alt="">
                                                                    </div>
                                                                    -->
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $producto->name }}</h2>
                        <div>
                            @if ($producto->idpromocion != '')
                                @foreach ($promociones as $promocion)
                                    @if ($producto->idpromocion == $promocion->id)
                                        <?php $descuento = $promocion->descuento / 100; ?>
                                        <h3 class="product-price">Bs
                                            {{ $producto->precioUnitario - $producto->precioUnitario * $descuento }}
                                            <del class="product-old-price">Bs {{ $producto->precioUnitario }}</del>
                                        </h3>
                                    @endif
                                @endforeach
                            @else
                                <h3 class="product-price">Bs {{ $producto->precioUnitario }}
                            @endif
                            @if ($producto->stock != 0)
                                <span class="product-available">In Stock</span>
                            @else
                                <span class="product-available">Not Stock</span>
                            @endif
                        </div>
                        <p>{{ $producto->descripcion }}</p>

                        <div class="add-to-cart">
                            <form action="{{ route('detalleCarrito.store') }}" method="POST" enctype="multipart/form-data"
                                id="add">
                                @csrf
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
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input type="number" id="cantidad" name="cantidad" min="1" max="1000"
                                            value="1">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn" form="add"><i class="fa fa-shopping-cart"></i> add to
                                    cart</button>
                            </form>
                        </div>
                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Categoría:</li>
                            @foreach ($categorias as $categoria)
                                @if ($producto->idcategoria == $categoria->id)
                                    <li><a
                                            href="{{ route('categoriaShow.show', $categoria->id) }}">{{ $categoria->nombre }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li>Marca:</li>
                            @foreach ($marcas as $marca)
                                @if ($producto->idmarca == $marca->id)
                                    <li>{{ $marca->nombre }}</li>
                                @endif
                            @endforeach
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Others Products</h3>
                    </div>
                </div>
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php $a = 0; ?>
                                    @foreach ($productos as $producto)
                                        <?php $a = $a + 1; ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('public/img/' . $producto->imagen) }}" alt="">
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
                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id == $producto->idcategoria)
                                                        <p class="product-category">{{ $categoria->nombre }}</p>
                                                    @endif
                                                @endforeach
                                                <h3 class="product-name"><a href="#">{{ $producto->name }}</a></h3>
                                                @if ($producto->idpromocion != '')
                                                    <h4 class="product-price">Bs
                                                        {{ $producto->precioUnitario - $producto->precioUnitario * $descuento }}
                                                        <del class="product-old-price">Bs
                                                            {{ $producto->precioUnitario }}</del>
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
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">
                                                            <a href="{{ route('catalogo.show', $producto->id) }}"
                                                                style="color: white">
                                                                quick view</a> </span></button>
                                                    <form action="{{ route('detalleCarrito.store') }}" method="POST"
                                                        enctype="multipart/form-data" id="create{{ $a }}">
                                                        @csrf
                                                        <input type="number" id="cantidad" name="cantidad"
                                                            min="1" max="1000" value="1">
                                                        @if ($producto->idpromocion != '')
                                                            <input type="hidden" name="precio" id="precio"
                                                                value="{{ $producto->precioUnitario - $producto->precioUnitario * $descuento }}">
                                                        @else
                                                            <input type="hidden" name="precio" id="precio"
                                                                value="{{ $producto->precioUnitario }}">
                                                        @endif
                                                        <input type="hidden" name="idProducto" id="idProducto"
                                                            value="{{ $producto->id }}">
                                                        @auth
                                                            <input type="hidden" name="idCarrito" id="idCarrito"
                                                                value="{{ $carrito->id }}">
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
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->
@endsection
