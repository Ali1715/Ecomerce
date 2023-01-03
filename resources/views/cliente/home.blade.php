@extends('cliente.cliente')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop01.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop03.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Accessories<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop02.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Cameras<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class=""><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

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
                                                        <input type="number" id="cantidad" name="cantidad" min="1"
                                                            max="1000" value="1">
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
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3></h3>
                                    <span></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3></h3>
                                    <span></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3></h3>
                                    <span></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3></h3>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class=""><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
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
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
