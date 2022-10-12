<!--
<div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>

-->


<!--         sidebar -->
<!--
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>John Doe</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="user-profile.html">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="email-inbox.html">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="auth-lock-screen.html">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="auth-normal-sign-in.html">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
-->


<!-- ********************************SIDEBAR-PANEL************************************************************** -->

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Panel</span>
        </a>
        <!-- *******************************USUARIOS*********************************************** -->
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Usuario
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ url('admin/usuarios') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuraios</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/tecnicos') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Tecnicos</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/clientes') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Clientes</span>
                </a>
            </li>


            <!-- ***********************************ASISTENCIAS****************************************************************************** -->
            <li class="sidebar-header">
                Asistencia
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/asistencias') }}">
                    <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">Asistencias</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/horarios') }}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Horarios</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/ubicaciones') }}">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Ubicaciones</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/reportes') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span
                        class="align-middle">Reportes</span>
                </a>
            </li>


            <!-- *****************************ORDEN******************************************************************* -->
            <li class="sidebar-header">
                Orden
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/ordenes') }}">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Ordenes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/solicitudes') }}">
                    <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Solicitudes</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/conexiones') }}">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Conexiones</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('admin/contratos') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Contratos</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-cta">

        </div>
    </div>
</nav>
