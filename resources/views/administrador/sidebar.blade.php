<!-- ********************************SIDEBAR-PANEL************************************************************** -->
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Panel</span>
        </a>
		<!-- *******************************USUARIOS*********************************************** -->
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                USUARIOS
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ url('administrador/empleados') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Gestionar Empleados</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/clientes') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Gestionar Clientes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/roles') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Roles</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/bitacoras') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Bitácora</span>
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

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/proveedor') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Proveedor</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/promocion') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Promociones</span>
                </a>
            </li>
            <!-- ***********************************ASISTENCIAS****************************************************************************** -->
            <li class="sidebar-header">
                VENTAS
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/venta') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Ventas</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/carrito') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Carrito</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/pago') }}">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Metodo de
                        Pago</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('administrador/factura') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Factura</span>
                </a>
            </li>
            <!-- *****************************ORDEN******************************************************************* -->
            <li class="sidebar-header">
                CRM
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/spam') }}">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Spam</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/chatBot') }}">
                    <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">ChatBot</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/clientes') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Segementos</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/reportes') }}">
                    <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">Reportes</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-cta">
        </div>
    </div>
</nav>
