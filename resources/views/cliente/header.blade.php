 <!-- HEADER -->
 <header>
     <!-- TOP HEADER -->
     <div id="top-header">
         <div class="container">
             <ul class="header-links pull-right">
                 <!-- Authentication Links -->
                 @guest
                     @if (Route::has('login'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                         </li>
                     @endif
                     @if (Route::has('register'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                         </li>
                     @endif
                 @else
                     <li class="nav-item dropdown">
                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{ Auth::user()->email }}
                         </a>
                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="/cierreSesion">
                                 {{ __('Logout') }}
                             </a>
                             <a class="dropdown-item" href="{{ route('perfil.edit', auth()->user()->id) }}">
                                 {{ __('Configurar Perfil') }}
                             </a>
                             <a class="dropdown-item" href="{{ route('password.edit', auth()->user()->id) }}">
                                 {{ __('Cambiar Contraseña') }}
                             </a>
                         </div>
                     </li>
                 @endguest
             </ul>
         </div>
     </div>
     <!-- /TOP HEADER -->

     <!-- MAIN HEADER -->
     <div id="header">
         <!-- container -->
         <div class="container">
             <!-- row -->
             <div class="row">
                 <!-- LOGO -->
                 <div class="col-md-3">
                     <div class="header-logo">
                         <a href="/home" class="logo">
                             <img src="{{ asset('img/Ecomercelog.jpg') }}" width=190px>
                         </a>
                     </div>
                 </div>
                 <!-- /LOGO -->
                 <!-- SEARCH BAR -->
                 <div class="col-md-6">
                     <div class="header-search">
                         <form>
                             <select class="input-select">
                                 <option value="0">All Categories</option>
                                 <option value="1">Category 01</option>
                                 <option value="1">Category 02</option>
                             </select>
                             <input class="input" placeholder="Search here">
                             <button class="search-btn">Search</button>
                         </form>
                     </div>
                 </div>
                 <!-- /SEARCH BAR -->

                 <!-- ACCOUNT -->
                 <div class="col-md-3 clearfix">
                     <div class="header-ctn">
                         <!-- Wishlist -->
                         <div>
                             <a href="#">
                                 <i class="fa fa-heart-o"></i>
                                 <span>Your Wishlist</span>
                                 <div class="qty">2</div>
                             </a>
                         </div>
                         <!-- /Wishlist -->

                         <!-- Cart -->
                         <div class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                 <i class="fa fa-shopping-cart"></i>
                                 <span>Your Cart</span>
                                 <div class="qty">3</div>
                             </a>
                             <div class="cart-dropdown">
                                 <div class="cart-list">
                                     <div class="product-widget">
                                         <div class="product-img">
                                             <img src="./img/product01.png" alt="">
                                         </div>
                                         <div class="product-body">
                                             <h3 class="product-name"><a href="#">product name goes
                                                     here</a></h3>
                                             <h4 class="product-price"><span class="qty">1x</span>$980.00
                                             </h4>
                                         </div>
                                         <button class="delete"><i class="fa fa-close"></i></button>
                                     </div>

                                     <div class="product-widget">
                                         <div class="product-img">
                                             <img src="./img/product02.png" alt="">
                                         </div>
                                         <div class="product-body">
                                             <h3 class="product-name"><a href="#">product name goes
                                                     here</a></h3>
                                             <h4 class="product-price"><span class="qty">3x</span>$980.00
                                             </h4>
                                         </div>
                                         <button class="delete"><i class="fa fa-close"></i></button>
                                     </div>
                                 </div>
                                 <div class="cart-summary">
                                     <small>3 Item(s) selected</small>
                                     <h5>SUBTOTAL: $2940.00</h5>
                                 </div>
                                 <div class="cart-btns">
                                     <a href="#">View Cart</a>
                                     <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                 </div>
                             </div>
                         </div>
                         <!-- /Cart -->

                         <!-- Menu Toogle -->
                         <div class="menu-toggle">
                             <a href="#">
                                 <i class="fa fa-bars"></i>
                                 <span>Menu</span>
                             </a>
                         </div>
                         <!-- /Menu Toogle -->
                     </div>
                 </div>
                 <!-- /ACCOUNT -->
             </div>
             <!-- row -->
         </div>
         <!-- container -->
     </div>
     <!-- /MAIN HEADER -->
 </header>
 <!-- /HEADER -->

 <!-- NAVIGATION -->
 <nav id="navigation">
     <!-- container -->
     <div class="container">
         <!-- responsive-nav -->
         <div id="responsive-nav">
             <!-- NAV -->
             <ul class="main-nav nav navbar-nav">
                 <li class="{{ 'home' == Request::is('home*') ? 'active' : '' }}"><a href="/home">Home</a></li>
                 <li class="{{ 'cliente/catalogo' == Request::is('cliente/catalogo*') ? 'active' : '' }}"><a
                         href="cliente/catalogo">Productos</a></li>
                 <li><a href="#">Categorias</a></li>
                 <li><a href="#">Laptops</a></li>
                 <li><a href="#">Smartphones</a></li>
                 <li><a href="#">Cameras</a></li>
                 <li><a href="#">Accessories</a></li>
             </ul>
             <!-- /NAV -->
         </div>
         <!-- /responsive-nav -->
     </div>
     <!-- /container -->
 </nav>
 <!-- /NAVIGATION -->
