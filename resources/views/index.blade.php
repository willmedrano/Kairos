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
                                  Motorista y Operador
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
                                Vehiculo y Maquinaria
                              <i class="fa arrow"></i>
                            </a>
                            <ul>                              
                              <li>
                                <a href="">
                                    <i class="fa fa-th-list"></i>
                                    Marcas
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/marca/create">
                                        Registar Marca
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/marca">
                                        Ver Marcas y Modelos
                                    </a>
                                  </li>
                                 </ul>
                              </li>
                              <li>
                                <a href="">
                                    <i class="fa fa-th-list"></i>
                                    Tipo V / M
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/tipoVM/create">
                                        Registar Tipo 
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/tipoVM">
                                        Ver Tipos
                                    </a>
                                  </li>
                                 </ul>
                              </li>
                              <li>
                                <a href="">
                                    <i class="fa fa-th-large"></i>
                                    Vehiculos
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
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
                                <a href="">
                                    <i class="fa fa-th-large"></i>
                                    Vehiculo
                                  <i class="fa arrow"></i>
                                </a>
                                <ul>
                                  <li>
                                    <a href="/Kairos/public/asignarMotVeh">
                                        Asignar Motorista
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/asignarMotVeh/create">
                                       Ver asignaciones V
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
                                    <a href="/Kairos/public/asignarMotMaq">
                                        Asignar Operario
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Kairos/public/asignarMotMaq/create">
                                       Ver asignaciones M
                                    </a>
                                  </li>
                                 </ul> 
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
                                <a href="/Kairos/public/tallerE">
                                    Ver Talleres Externos
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/mecanicoI">
                                    Ver Mecánicos Internos
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
                                <a href="/Kairos/public/usuario">
                                    Ver Usuarios
                                </a>
                                <a href="/Kairos/public/bitacora">
                                    Bitácora de usuarios
                                </a>
                                <a href="/Kairos/public/postGenerateBackup">
                                    Respaldar Base de datos
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
                              <li>
                                <a href="/Kairos/public/reporteVM" target="_blank">
                                    Inventario Vehiculo-Maquinaria
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/filtroVMA">
                                    Vehiculo-Maquinaria asignada
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/filtroMP" >
                                    Mttn Preventivo
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/filtroMC" >
                                    Mttn Correctivo
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/reporteBarrio" target="_blank">
                                    Barrios y colonias 
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/reporteCanton" target="_blank">
                                    Cantón y caserios 
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/reporteValeAll" target="_blank">
                                    Todos los Vales de combustible 
                                </a>
                              </li>
                              <li>
                                <a href="/Kairos/public/filtroVale" target="_blank">
                                     Vales de combustible por fecha
                                </a>
                              </li>

                              
                              <li>
                                <a href="/Kairos/public/filtroSaEnVehiculo" >
                                    Salidas y Entradas
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    
                </aside>
                <div>                         

                    @yield('content')
                    @if (Session::has('create'))
  <div class="alert alert-success alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('create')}}
  </div>
  @endif   
                    <footer class="sidebar-footer"  >
                    <center>
                      <img  src="/Kairos/public/img/ues.png" class="" alt="User Image" width="50px" height="50px"><b>
                     Todos los derechos reservados &copy UES-FMP
                     </b></center>
                    </footer>
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
        {!!Html::script('js/h.js')!!}
        
        {!!Html::script('js/maquinaria.js')!!}
            @section('scripts')

          @show
    </body>
</html>
