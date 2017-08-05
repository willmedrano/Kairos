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
  @include('alertas.request')
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nueva Asignación</i></span>
       <p class="title-description"> Registro de nueva asignación de vehiculo </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Asignación</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'asignarMotVeh.store','method'=>'POST']) !!}
                        <fieldset>
                          <div class="form-group">
                            <div class="col-md-4">
                              <a href="/Kairos/public/asignarMotVeh" class="btn btn-success btn-sm"" ">Atrás</a>
                              <br>
                              <div class="card-block">
                                <img src="/Kairos/public/imagenesVehiculos/{{$vehiculo->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                             </div>
                             </div>
                             <br><br>
                             <input type="hidden" name="idVehiculo" value="{{ $vehiculo->id }}">
                            <label class="control-label col-md-3">* Motorista </label>
                            <div class="col-md-4">
                              <select name="idMotorista" id="idMotorista" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                @foreach($motorista as $m)
                                    <?php
                                      $bandera=true;
                                    ?>
                                    @foreach ($asignados as $m2)
                                      @if($m->id==$m2->idMotorista)
                                          <?php
                                            $bandera=false;
                                          ?>
                                        @endif
                                     @endforeach 
                              
                                    @if($bandera)
                                      <option value="{{$m->id}}">{{$m->nombresMot}}</option>
                                    @endif
                                @endforeach
                              </select>
                            </div>
                            <br><br>
                            <label class="control-label col-md-3">* Fecha de asignación </label>
                            <div class="col-md-4">
                              
                              <input id="fechaInicio" name="fechaInicio" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            
                            </div>

                      </div>
                      </fieldset>
                      <br><br>
                      <div align="center">
                       {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
                       {!! Form::reset('Limpiar',['class'=>'btn btn-info' ]) !!}

                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </div>
            </section>
          </article>
@stop
<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 


  
?>