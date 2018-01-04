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
  @if (Session::has('create'))
  <div class="alert alert-success alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('create')}}
  </div>
  @endif
  @if (Session::has('update'))
  <div class="alert alert-info alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('update')}}
  </div>
  @endif
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE MANTENIMIENTOS </i></span>
       <p class="title-description"> Mantenimientos correctivos realizados a Maquinaria </p>
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
                          {!!link_to_action("MantenimientoCorMaqController@finalizadas", $title = "Finalizadas", $parameters = 1, $attributes = ["class"=>"btn btn-primary btn-sm"])!!}
                          {!!link_to_action("MantenimientoCorMaqController@pendientes", $title = "Pendientes", $parameters = 1, $attributes = ["class"=>"btn btn-sm btn-info"])!!}
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead>
                               <tr>
                                 <th ><div align="center">N°</div></th>
                                 <th ><div align="center">N° ORDEN</div></th>
                                 <th ><div align="center">MECANICO</div></th>
                                 <th ><div align="center">TALLER</div></th>
                                 <th ><div align="center">MAQUINARIA</div></th>
                                 <th ><div align="center">INICIO</div></th>
                                 <th ><div align="center">FINALIZADO</div></th>
                                 <th><div align="center">DETALLE</div></th>
                               </tr>
                             </thead>
                             <tbody id="hola" class="buscar">
                               <?php $cont=1; ?>
                               @foreach ($matt as $m)
                                 @include('mantenimientoCorrectivo.mcRealizadoMaqDetalle')
                                 <tr>
                                   <td align="center">{{$cont++}}</td>
                                   <td align="center">{{$m->idOrden}}</td>
                                   <td align="center">{{$m->mecanicoNom($m->idMecanico)}}</td>
                                   <td align="center">{{$m->tallerNom($m->idMecanico)}}</td>
                                   <td align="center">{{$m->equipo($m->idMaquinaria)}}</td>
                                   <?php
                                    $date = new DateTime($m->fechaInicioMtt);
                                    $date2 = new DateTime($m->fechaFinMtt);
                                  ?>
                                   <td align="center"><?php  echo $date->format('d/m/Y'); ?></td>
                                    @if($m->estadoMttC==0)
                                   <td align="center"><?php  echo $date2->format('d/m/Y'); ?></td>
                                   @else
                                    <td align="center" style="color: red">Pendiente</td>
                                   @endif
                                   <td align="center"><button type="submit"  class="btn btn-primary btn-sm fa fa-eye" data-toggle="modal" data-target="#ModalMtt{{$m->id}}"></button> </td>
                                 </tr>
                               @endforeach
                             </tbody>
                           </table>
                           <div class="text-center">
                           </div>
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
