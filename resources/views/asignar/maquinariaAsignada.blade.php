@extends ('index')
@section('content')
<style>
  .campoObligatorio {
  color: red;
  }
  .bigicon {
      font-size: 35px;
      color: #337ab7;
  }
  legend{
      color: #36A0FF;
  }
  thead{
     background: #ffffcc;
     border:1;
}
</style>
<article class="content forms-page">
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE MAQUINARIAS ASIGNADAS</i></span>
       <p class="title-description"> Consulta de Maquinarias/Asignadas </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <fieldset>
                  <!--Begin Datatables-->
                  <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        <div class="card-title-block table-responsive">
                          <div class="card-title-block">
                            <div class="form-group" align="right">
                              <span class="col-md-1 col-md-offset-7 text-center"><i class="fa fa-search bigicon icon_nav"></i>Buscar</span>
                              <div class="col-xs-4">
                                <input id="filtrar" name="name" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        <section class="example">
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead align="center">
                              <tr>
                               <th >MAQUINARIA </th>
                               <th >OPERARIO </th>
                               <th >TIPO</th>
                               <th >MODELO</th>
                               <th >EQUIPO</th>
                               <th >F_ASIGNACION</th>
                               <th >FINALIZACIÓN</th>
                               <th >ASIGNACIÓN</th>
                             </tr>
                           </thead>
                           <tbody id="hola" class="buscar">
                             @foreach ($asignado as $a)
                               @include('asignar.terminarM')
                               <?php
                                 $date = new DateTime($a->fechaInicio);
                               ?>
                               <tr>
                                 <td>
                                   <div class="pull-left image">
                 						         <img src="/Kairos/public/imagenesMaquinaria/{{$a->imgMaquinaria($a->idMaquinaria) }}" class="img-circle" alt="User Image" width="50px" height="50px">
                 					         </div>
                                 </td>
                                   <td>{{$a->motorista($a->idMotorista)}}</td>
                                   <td>{{$a->nomTipo($a->idMaquinaria)}}</td>
                                   <td>{{$a->nomModelo($a->idMaquinaria)}}</td>
                                   <td>{{$a->numEquipo($a->idMaquinaria)}}</td>
                                   <td><?php  echo $date->format('d/m/Y'); ?></td>
                                   @if($a->fechaInicio!=$a->fechaFin || $a->estadoAsignacionMaq==false )
                                      <?php
                                     $date = new DateTime($a->fechaFin);
                                   ?>
                                   <td><?php  echo $date->format('d/m/Y'); ?></td>

                                   @else
                                   <td>Pendiente</td>

                                   @endif
                                   @if($a->estadoAsignacionMaq==true)
                                       <td>
                                             <button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModalMaq{{$a->id}}">Terminar</button>
                                       </td>
                                   @endif
                                   @if($a->estadoAsignacionMaq==false)

                                         <td>Finalizada</td>

                                   @endif
                               </tr>
                             @endforeach
                           </tbody>
                         </table>
                         </section>
                       </div>
                     </div>
                   </div><!-- /.row -->
                 </fieldset>
               </div>
             </div><!-- /.col-lg-12 -->
           </div><!-- /.row -->
         </div>
       </section>
     </article>
@stop
@section('scripts')
    <!--{!!Html::script('js/scriptpersanalizado.js')!!}-->
    {!!Html::script('js/buscaresc.js')!!}
  @endsection
