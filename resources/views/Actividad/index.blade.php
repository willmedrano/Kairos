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
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE ACTIVIDADES</i></span>
       <p class="title-description"> Consulta de ACTIVIDADES </p>
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
                          {!!link_to_action("ActividadController@finalizadas", $title = "Finalizadas", $parameters = 1, $attributes = ["class"=>"btn btn-primary btn-sm"])!!}
                          {!!link_to_action("ActividadController@pendientes", $title = "Pendientes", $parameters = 1, $attributes = ["class"=>"btn btn-sm btn-info"])!!}
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead align="center">
                              <tr align="center">                    
                               <th >N°</th>
                               <th >LUGAR</th>
                               <th >ACTIVIDAD</th>
                               <th >DESCRIPCIÓN</th>
                               <th >FECHA INICIO</th>
                               <th >FECHA FINAL</th>
                               
                               <th colspan="4"> <div align="center">ACCIÓN</div></th>
                               
                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              @include('Actividad.imagen')
                              @include('Actividad.terminar')
                              @include('Actividad.edit')
                              
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombre}}</td>
                                <td>{{$c->act}}</td>
                                
                                <td>{{$c->desc}}</td>
                                <?php 
                                  $date = new DateTime($c->fechaInicial); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                                
                                @if($c->fechaInicial!=$c->fechaFinal || $c->estado==true )
                                   <?php 
                                  $date = new DateTime($c->fechaFinal); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                                @else
                                <td>En Proceso</td>
                                 
                                @endif
                                <td>
                                  <a href="#"   class="btn btn-info btn-sm" data-id="{{ $c->id }}" data-toggle="modal" data-target="#Edit{{ $c->id }}">Modificar</a>
                                </td>
                                <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal3{{$c->id}}">VER</button> </td>
                                
                                <td>
                                {!!Form::open(['route'=>['actividad.show',$c->id],'method'=>'GET'])!!}
                                          <input type="submit" name="" value="Progreso"   class="btn btn-primary btn-sm active " >
                                                        {!!Form::close()!!}
                                                        </td>

                                @if($c->estado==false)
                                    
                                    <td>
                                          <button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$c->id}}">Terminar</button>
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