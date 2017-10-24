@extends ('index')
<?php $message=Session::get('message');?>


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
  @include('alertas.request')
@if($message=='update')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> •Sea actualizado con éxito el registro</strong>
</div>
@endif
@if($message=='create')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> •Sea creado con éxito el registro</strong>
</div>
@endif



  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE SALIDA DE MAQUINARIA</i></span>
       <p class="title-description"> Consulta de salidas </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <fieldset>
                  
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
                              <tr align="center">                    
                               <th >N°</th>
                               <th >CONDUCTOR</th>
                               <th >FECHA</th>
                               <th ># DE INVENTARIO</th>
                               <th>ACTIVIDAD</th>
                               <th>DESTINO</th>
                               <th >HORA SALIDA</th>
                                <th >HORA DE ENTRADA</th>
                               <th >HORAS DE TRABAJO</th>
                               
                              
                               <th>OBSERVACIONES SALIDA</th>
                               <th>OBSERVACIONES ENTRADA</th>

                               <th>COMBUSTIBLE</th>
                               <th colspan="2"> <div align="center">ACCIÓN</div></th>
                               
                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              @include('saEnMaquinaria.imagen')
                             @include('saEnMaquinaria.terminar')  
                             @include('saEnMaquinaria.vale')
                               
                             
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                
                                <?php 
                                  $date = new DateTime($c->fecha); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                <td>{{ $c->nInventario }}</td>
                                <td>{{ $c->act }}</td>
                                <td>{{ $c->nombre }}</td>

                                <td>{{ $c->horaSalida }}</td>
                                
                                <td>{{$c->horaEntrada}}</td>
                              <td>{{ $c->horasM }}</td>
                                
                                
                                <td>{{$c->observacionS}}</td>
                                <td>{{$c->observacionE}}</td>

                                 @if($c->estadoVale==false)
                                    
                                    <td>
                                          <button type="submit"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#gridSystemModal8{{$c->idVale}}">Vale</button>
                                    </td>
                                @endif

                                @if($c->estadoVale==true)
                                      
                                      <td>{{$c->galones}} Galones</td>
                                
                                @endif
                                
                                
                                <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal3{{$c->id}}">Vehículo</button> </td>
                                
                                
                                @if($c->estado==false)
                                    
                                    <td>
                                          <button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$c->id}}">Entrada</button>
                                    </td>
                                @endif

                                @if($c->estado==true)
                                      
                                      <td>Completada</td>
                                
                                @endif                                    
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </section>
                      </div>
                    </div>
                  </div>
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
  <?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 


  
?>