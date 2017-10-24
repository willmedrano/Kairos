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
</style>
<article class="content forms-page">
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" > ENTRADAS Y SALIDAS</i></span>
       <p class="title-description"> Registro de  salidas </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de salidas de Vehiculo</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                {!! Form::open(['route'=>'salidaEntrada3.store','method'=>'POST']) !!}
                <fieldset>
                <input type="hidden" name="hi2" value="1">
                <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                <div id="collapseOne" class="body">
                  <div class="form-group">

                  <div  class=" col-md-3" id="idModelo" style="height: 220px;">
                      
                  
                    </div>
                  <label class="control-label col-md-2">* Motorista: </label>
                    <div class="col-lg-3">
                      <select name="selectMarca" id="selectMarca" class="validate[required] form-control">
                        <option value="0">Selecione una opción...</option>
                        @foreach($asignado as $a)
                        <option value="{{$a->id}}">{{$a->nombresMot}} {{ $a->apellidosMot }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                  
                    <br><br>
                  

                    

                    
                    <label class="control-label col-md-2">* Actividad: </label>
                    <div class="col-lg-3">
                      <select name="idActividad" id="idActividad" class="validate[required] form-control">
                        <option value="0">Selecione una opción...</option>
                        @foreach($actividad as $act)
                        <option value="{{$act->id}}">{{$act->act }} - {{$act->nombre  }}</option>
                        @endforeach
                      </select>
                    </div>
                    <label class="control-label col-md-1">*Acción </label>
                    <div class="col-lg-2">
                      <select name="idAccion" id="idAccion" class="validate[required] form-control">
                        
                        <option value="1">Cargar</option>
                        <option value="2">Descargar</option>
                        
                      </select>
                    </div>

                    <br><br><br>
                    <label class="control-label col-md-2">* Fecha</label>
                            <div class="col-md-3">
                              
                              <input id="fecha" name="fecha" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>
                    <label class="control-label col-md-1">*Hora de Salida </label>

                    <div class="col-lg-2">
                      {!!Form::Time('horaS',null,['id'=>'horaS','class'=>'form-control', 'placeholder'=>'Ingrese la hora de salida...','required'])!!}
                    </div>
                      <br><br><br><br>
                    <label class="control-label col-md-2">*Kilometraje de Salida </label>

                    <div class="col-lg-3">
                      {!!Form::text('kilometrajeS',null,['id'=>'kilometrajeS','class'=>'form-control', 'placeholder'=>'Ingrese el kilometraje de salida...','required'])!!}
                    </div>
                    
                    
                            <label class="control-label col-md-1" id="labe">*Descarga </label>
                            <div class="col-xs-3">
                                <select class=" form-control" name="idCC">
                            
                             @foreach($cc as $c)
                                @if($c->estadoB ==1)
                                <option  value="{{ $c->id }}" >{{ $c->nombre }}</option>
                                @endif
                            @endforeach
                           
                        </select>
                            </div><br>                        
                    <br><br><br>
                    <label class="control-label col-md-2">*Observaciones </label>

                    <div class="col-lg-4">
                      {!!Form::textArea('observacionesS',null,['id'=>'observacionesS','class'=>'form-control', 'rows'=>'4','cols'=>'50',  'placeholder'=>'Ingrese las observaciones...','required'])!!}
                    </div>
                            
                    
                  </div>
                </div>
              </fieldset>
             <br><br>
             <div align="center">
  {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
  {!! Form::reset('Limpiar',['class'=>'btn btn-info' ]) !!}
  </div>
  {{-- {!!link_to_action("MotoristaController@index", $title = "Salir", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!} --}}
{!! Form::close() !!}

              </div> 
                          </div> 
                        </div>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div>
    </section>
  </article>
@stop
 @section('scripts')
      
    @endsection
    <?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 


  
?>