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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Asignar Maquinaria</i></span>
       <p class="title-description"> Registro de nueva asignación de maquinaria </p>
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
                      {!! Form::open(['route'=>'asignarMotMaq.store','method'=>'POST']) !!}
                      <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                          <br><br>
                        <div class="form-group">
                          <div class="col-md-4">
                            <a href="/Kairos/public/asignarMotMaq" class="btn btn-success btn-sm"" ">Atrás</a>
                            <br>
                            <div class="card-block">
                              <img src="/Kairos/public/imagenesMaquinaria/{{$maquinaria->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                            </div>
                           </div>
                           <span class=""><i class="bigicon " >Equipo: {{$maquinaria->nEquipo}}</i></span>
                           <br><br>
                           <input type="hidden" name="id" value="{{ $idA }}">
                           <input type="hidden" name="idMaquinaria" value="{{ $maquinaria->id }}">
                           <label class="control-label col-md-3">* Área </label>
                           <div class="col-md-4">
                               <select name="unidad" id="unidad" class="validate[required] form-control">
                                 <option value="1">Unidad de Mantenimiento</option>
                                 <option value="2">Unidad de Transporte</option>
                                 <option value="3">Mtto de alumbrado público</option>
                                 <option value="4">Gerencia</option>
                                 <option value="5">Unidad de Medio Ambiente</option>
                               </select>
                             </div>
                           <br><br>
                          <label class="control-label col-md-3">* Operario</label>
                          <div class="col-md-4">
                            <select name="idMotorista" id="idMotorista" class="validate[required] form-control">
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
                                  <option value="{{$m->id}}">{{$m->nombresMot." ".$m->apellidosMot}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <br><br>
                          <label class="control-label col-md-3">* Fecha de asignación </label>
                          <div class="col-md-4">
                            <input id="fechaInicio" name="fechaInicio" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                          </div>
                          <br><br>
                          <label class="control-label col-md-3">* Observación </label>
                          <div class="col-md-4">
                              {!!Form::textarea('observacionAsiM',null,['class'=>'form-control', 'placeholder'=>'Observaciones...', 'rows'=>'3', 'cols'=>'4','required'])!!}
                          </div>
                      </div>
                    </fieldset>
                    <br><br>
                    <div align="center">
                     {!! Form::submit(' Asignar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
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
