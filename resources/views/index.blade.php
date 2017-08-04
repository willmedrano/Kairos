<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>KAIROS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    {!!Html::style('css/vendor.css')!!}
    {!!Html::style('css/app-seagreen.css')!!}

    </head>

    <body>

        <div class="main-wrapper">

            <div class="app" id="app">

                <header class="header">

                    <div class="header-block header-block-collapse hidden-lg-up">

                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>

                    </div>

                    <div class="header-block header-block-nav">

                        <ul class="nav-profile">



                            <li class="profile dropdown">

                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                                    <div class="img"   style="background-image: url('/kairos/public/img/KairosLogo.png')">
                                    </div>

                                    <span class="name">



                                    </span>
                                </a>

                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">


                                    <a class="dropdown-item" href="/notificaciones">

                                        <i class="fa fa-bell icon"></i>
                                         Notificaciones
                                    </a>

                                    <a class="dropdown-item" href="/cambiousuario">

                                        <i class="fa fa-gear icon"></i>
                                             Configuraciones
                                     </a>

                                    <div class="dropdown-divider">

                                    </div>

                                    <a class="dropdown-item" href="/logout">

                                        <i class="fa fa-power-off icon"></i>
                                             Salir
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>

                </header>

                <aside class="sidebar">

                    <div class="sidebar-container">

                        <div class="sidebar-header">

                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div>

                                KAIROS

                            </div>
                        </div>

                        <!-- Aqui inicia el menu nav  -->
                        <nav class="menu">

                            <ul class="nav metismenu" id="sidebar-menu"><!-- Aqui inicia la lista del menu u-->

                                <li class="active"><!-- inicia el menu Inicio i -->
                                    <a href="/inicio"> <i class="fa fa-home"></i> Inicio </a>
                                </li> <!-- Aqui finaliza el menu i-->

                                <li><!-- Aqui inicia el menu de los empleados i con sus respectivas opciones -->

                                    <a href="">
                                        <i class="fa fa-user"></i>
                                            Motoristas y Operadores
                                        <i class="fa arrow"></i>
                                    </a>

                                    <ul>

                                        <li>
                                            <a href="/Kairos/public/motorista/create">
                                                Ingresar Operario o Motorista
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/motorista">
                                                Ver Operario y Motorista
                                            </a>
                                        </li>
                                    </ul>
                                </li><!-- Aqui finaliza el menu de empleados i -->

                                <li><!-- Aqui inicia el menu de los Inventario i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-th-large"></i>
                                          Vehiculos y Maquinarias
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/Kairos/public/marca/create">
                                                Registrar Marca
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/marca">
                                                Ver Marcas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/tipoVM/create">
                                                Registrar Tipo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/tipoVM">
                                                Ver Tipos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/vehiculo/create">
                                                Registrar Vehiculo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/vehiculo">
                                                Ver Vehiculos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/maquinaria/create">
                                                Registrar Maquinaria
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/Kairos/public/maquinaria">
                                                Ver Maquinaria
                                            </a>
                                        </li>
                                    </ul>
                                </li><!-- Aqui finaliza el menu de Inventario i -->

                                <li><!-- Aqui inicia el menu de los Escuelas i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-th-large"></i>
                                          Mantenimientos
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/escuela/create">
                                                Registrar Taller
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/escuela/">
                                                Editar Taller
                                            </a>
                                        </li>
                                    </ul>
                                </li><!-- Aqui finaliza el menu de Escuelas i -->

                                <li><!-- Aqui inicia el menu de los paquetes i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-dropbox"></i>
                                             División Politica
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/Kairos/public/coloniaCanton/create">
                                               Registrar Colonia/Canton
                                            </a>
                                        </li>
                                        <li>
                                        <a href="/Kairos/public/coloniaCanton">
                                            Ver Colonias/Cantones
                                        </a>
                                        <li>
                                            <a href="/Kairos/public/barrioCaserio">
                                             Ver Barrios/Caserios
                                            </a>
                                        </li>
                                    </ul>
                                </li><!-- Aqui finaliza el menu de Paquete i -->

                                <li><!-- Aqui inicia el menu de los compras i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-shopping-cart "></i>
                                            Gestión de Actividad
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/compra/create">
                                                Registrar Actividad
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/cuotas/">
                                                Asignar ubicación
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/compra/">
                                                Ver  Actividades
                                            </a>
                                        </li>
                                    </ul>
                                </li><!-- Aqui finaliza el menu de Compras i -->

                                <li><!-- Aqui inicia el menu de los Proveedores i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-truck"></i>
                                            Vales de Combustible
                                        <i class="fa arrow"></i>
                                    </a>
                                   <ul>
                                        <li>
                                            <a href="/prove/create">

                                            </a>
                                        </li>
                                        <li>
                                            <a href="/prove/">
                                                Asignar vale a Vehículo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/prove/">
                                                Asignar vale a Maquinaria
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/prove/">
                                                Ver Vales
                                            </a>
                                        </li>


                                    </ul>
                                </li><!-- Aqui finaliza el menu de Proveedor i -->



                                <li><!-- Aqui inicia el menu de los Ventas i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-file-text-o"></i>
                                         Entradas y Salidas
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/ventas/create">
                                                Registrar salida
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/ventas">
                                                registrar salida
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/aux5">
                                                Asignar Actividad
                                            </a>
                                        </li>

                                    </ul>
                                </li><!-- Aqui finaliza el menu de Ventas i -->

                                <li><!-- Aqui inicia el menu de los Reportes i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa fa-file-text-o"></i>
                                            Seguridad
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/Kairos/public/usuario/create">
                                                Registar usuario
                                            </a>
                                            <a href="/Kairos/public//usuario">
                                                Ver Usuarios
                                            </a>
                                            <a href="/reporte3">
                                                Bitácora de usuarios
                                            </a>


                                        </li>
                                    </ul>
                                </li> <!-- Aqui finaliza el menu de Reportes i -->

<li><!-- Aqui inicia el menu de los Reportes i con sus respectivas opciones -->
                                    <a href="">
                                        <i class="fa ">$</i>
                                            Reportes
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/aux5/create">
                                                Todos lo reportes
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">

                                                <div class="col-xs-4" align="center">
                                                    <label class="title">Estatico</label>
                                                </div>
                                                <div class="col-xs-4" align="center">
                                                    <label class="title">Normal</label>
                                                </div>
                                            </div>

                                            <div class="row hidden-md-down">

                                                <div class="col-xs-4">
                                                    <label class="title">Scroll:</label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label class="title">
                                                        Cabeza:
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label class="title">
                                                        Pie:
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green" data-theme="green"></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
                                     <i class="fa fa-cog"></i>
                                        Personalizar
                                </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
            <div>
                @yield('content')
            </div>

            <div class="ref" id="ref">
                <div class="color-primary"></div>
                <div class="chart">
                    <div class="color-primary"></div>
                    <div class="color-secondary"></div>
                </div>
            </div>

        {!!Html::script('js/vendor.js')!!}
        {!!Html::script('js/app.js')!!}
        @section('scripts')
      <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
        @show


    </body>

</html>
