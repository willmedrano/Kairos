<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KAIROS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    {!!Html::style('css/vendor.css')!!}
    {!!Html::style('css/app-seagreen.css')!!}
    {!!Html::style('css/lightbox.css')!!}



    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

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
                      <div class="img"   style="background-image: url('/kairos/public/img/KairosLogo.png')"></div>
                        <span class="name">
                          {{ Auth::user()->name }}
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
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="/Kairos/public/logout">
                               <i class="fa fa-power-off icon"></i>
                               {{ csrf_field() }}
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
                            <a href="/Kairos/public/home"> <i class="fa fa-home"></i> Inicio </a>
                        </li> <!-- Aqui finaliza el menu i-->
                        <li><!-- Aqui inicia el menu de los motorista i con sus respectivas opciones -->
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
                          </li><!-- Aqui finaliza el menu de motorista i -->
                          <li><!-- Aqui inicia el menu de vehiculo y maquinaria i con sus respectivas opciones -->
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
                          </li><!-- Aqui finaliza el menu de vehiculo y maquinaria i -->
                          <li><!-- Aqui inicia el menu de asignaciones i con sus respectivas opciones -->
                            <a href="">
                                <i class="fa fa-edit"></i>
                                  Asignaciones
                                <i class="fa arrow"></i>
                            </a>
                            <ul>
                              <li>
                                <a href="/Kairos/public/asignarMotVeh">
                                    Asignar Motorista-Vehiculo
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/asignarMotVeh/create">
                                   Ver asignaciones Vehiculo
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/asignarMotMaq">
                                    Asignar Motorista-Maquinaria
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/asignarMotMaq/create">
                                   Ver asignaciones Maquinaria
                                </a>
                              </li>
                            </ul>
                          </li><!-- Aqui finaliza el menu de Asignaciones i -->
                          <li><!-- Aqui inicia el menu de mantenimientos i con sus respectivas opciones -->
                            <a href="">
                                <i class="fa fa-th-large"></i>
                                  Mantenimientos
                                <i class="fa arrow"></i>
                            </a>
                            <ul>
                              <li>
                                <a href="/Kairos/public/mecanicoI">
                                    Ver Mecánicos Internos
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/tallerE">
                                    Ver Talleres Externos
                                </a>
                              </li>
                              <li>
                                <a href="">
                                  <i class="fa fa-th-large"></i>
                                    Preventivos
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoPre">
                                        Mttn Vehiculo
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoPreMaq">
                                        Mttn Maquinaria
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoPre/create">
                                        Mttn Realizados a Vehiculo
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoPreMaq/create">
                                        Mttn  Realizados a Maquinaria
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="">
                                  <i class="fa fa-th-large"></i>
                                    Correctivos
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoCorVeh">
                                        Mttn Vehiculo
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoCorMaq">
                                        Mttn Maquinaria
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoCorVeh/create">
                                        Mttn Realizados a Vehiculo
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/mantenimientoCorMaq/create">
                                        Mttn  Realizados a Maquinaria
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li><!-- Aqui finaliza el menu de mantenimientos i -->
                          <li><!-- Aqui inicia el menu de division politica i con sus respectivas opciones -->
                            <a href="">
                                <i class="fa fa-dropbox"></i>
                                     División Politica
                                <i class="fa arrow"></i>
                            </a>
                            <ul>
                              <li>
                                <a href="/Kairos/public/barrioCanton/create">
                                   Registrar Barrio/Cantón
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/barrioCanton">
                                 Ver Barrios/Cantón
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/coloniaCaserio">
                                    Ver Colonias/Caserios
                                </a>
                              </li>
                            </ul>
                          </li><!-- Aqui finaliza el menu de division politica i -->
                          <li><!-- Aqui inicia el menu de actividades con sus respectivas opciones -->
                            <a href="">
                              <i class="fa fa-shopping-cart "></i>
                                  Gestión de Actividad
                              <i class="fa arrow"></i>
                            </a>
                            <ul>
                              <li>
                                <a href="/Kairos/public/actividad/create">
                                    Registrar Actividad
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/actividad">
                                    Ver  Actividades
                                </a>
                              </li>
                            </ul>
                          </li><!-- Aqui finaliza el menu de actividades i -->
                          <li><!-- Aqui inicia el menu de valesi con sus respectivas opciones -->
                            <a href="">
                              <i class="fa fa-truck"></i>
                                  Vales de Combustible
                              <i class="fa arrow"></i>
                            </a>
                           <ul>
                              
                              <li>
                                <a href="/Kairos/public/vale">
                                    Vales por vehículo
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/vale/create">
                                    Vales por Maquinaria 
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/vales">
                                    Vales agricolas asignados
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/vales/create">
                                    Todos los vales asignados
                                </a>
                              </li>
                            </ul>
                          </li><!-- Aqui finaliza el menu de vales i -->
                          <li><!-- Aqui inicia el menu de entradas y salidasi con sus respectivas opciones -->
                            <a href="">
                              <i class="fa fa-file-text-o"></i>
                               Entradas y Salidas
                              <i class="fa arrow"></i>
                            </a>
                            <ul>
                                <li>
                                <a href="">
                                  <i class="fa fa-th-large"></i>
                                    Vehículo
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/salidaEntrada/create">
                                    Salida de vehiculo
                                  </a>
                                  </li>
                                  <li>
                                <a href="/Kairos/public/salidaEntrada">
                                    Entrada de Vehículo
                                </a>
                              </li>

                                </ul>
                            </li>
                            <li>
                                <a href="">
                                  <i class="fa fa-th-large"></i>
                                    Maquinaria
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/salidaEntrada2/create">
                                    Salida de Maquinaria
                                  </a>
                                  </li>
                                  <li>
                                <a href="/Kairos/public/salidaEntrada2">
                                    Entrada de Maquinaria
                                </a>
                              </li>

                                </ul>
                            </li>
                            <li>
                                <a href="">
                                  <i class="fa fa-th-large"></i>
                                    Camión
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/salidaEntrada3/create">
                                    Salida de Camión
                                  </a>
                                  </li>
                                  <li>
                                <a href="/Kairos/public/salidaEntrada3">
                                    Entrada de Camión
                                </a>
                              </li>

                                </ul>
                            </li>
                              
                              
                            </ul>
                          </li><!-- Aqui finaliza el menu de entradas y salidas -->
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
                          </li> <!-- Aqui finaliza el menu de seguridad i -->
                          <li><!-- Aqui inicia el menu de los Reportes i con sus respectivas opciones -->
                            <a href="">
                              <i class="fa ">$</i>
                                  Reportes
                              <i class="fa arrow"></i>
                            </a>
                            <ul>
                              <li>
                                <a href="/Kairos/public/reporteMotorista" target="_blank">
                                    Motorista-Operario
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
              {!!Html::script('js/lightbox.js')!!}
        {!!Html::script('js/hola.js')!!}
        {!!Html::script('js/maquinaria.js')!!}
        {!!Html::script('js/buscaresc.js')!!}
        {!!Html::script('js/busModelo.js')!!}
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
