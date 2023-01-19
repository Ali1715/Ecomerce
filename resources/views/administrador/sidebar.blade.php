<!-- ********************************SIDEBAR-PANEL************************************************************** -->
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/home') }}">
            <span class="align-middle"><img src="{{ asset('img/Logo.png') }}" width=200px></span>
        </a>
        <!-- *******************************USUARIOS*********************************************** -->
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                USUARIOS
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ url('administrador/empleados') }}">
                    <i class="fa fa-user-tie"></i> <span class="align-middle">Gestionar Empleados</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/clientes') }}">
                    <i class="fa fa-user"></i> <span class="align-middle">Gestionar Clientes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/roles') }}">
                    <i class="fa fa-user-lock"></i> <span class="align-middle">Roles</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/bitacoras') }}">
                    <i class="fa fa-clipboard"></i> <span class="align-middle">Bitácora</span>
                </a>
            </li>
            <!-- *******************************USUARIOS*********************************************** -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    INSUMOS
                </li>

                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ url('administrador/producto') }}">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Productos</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('categoria.index') }}">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Categorias</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link" href="{{ route('marca.index') }}">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Marcas</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/proveedor') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Proveedores</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/promociones') }}">
                        <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Promociones</span>
                    </a>
                </li>
                <!-- ***********************************ASISTENCIAS****************************************************************************** -->
                <li class="sidebar-header">
                    VENTAS
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/pedidos') }}">
                        <i class="align-middle" data-feather="shopping-bag"></i> <span
                            class="align-middle">Pedidos</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/carritosClientes') }}">
                        <i class="align-middle" data-feather="shopping-cart"></i> <span
                            class="align-middle">Carritos</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/tiposPagos') }}">
                        <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Metodo de
                            Pagos</span>
                    </a>
                </li>
                <!--
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/factura') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Facturas</span>
                </a>
            </li>-->
                <!-- *****************************ORDEN******************************************************************* -->
                <li class="sidebar-header">
                    CRM
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/spam') }}">
                        <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Spam</span>
                    </a>
                </li>
                <!--
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/chatBot') }}">
                        <i class="align-middle" data-feather="message-circle"></i> <span
                            class="align-middle">ChatBot</span>
                    </a>
                </li>
                -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/segmentos') }}">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span
                            class="align-middle">Segmentos</span>
                    </a>
                </li>
                <!--
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('administrador/reportes') }}">
                        <i class="align-middle" data-feather="bar-chart"></i> <span
                            class="align-middle">Reportes</span>
                    </a>
                </li>
                -->
            </ul>
            <div class="sidebar-cta">
            </div>
    </div>
</nav>
