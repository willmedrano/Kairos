@extends ('index')
@section('content')
<style>
  .mtt {
  color: red;
  }
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
      <span class=""><i class="fa fa-archive bigicon icon_nav" > MANTENIMIENTO PREVENTIVO</i></span>
         <p class="title-description"> Registrar vehiculo a mantenimiento preventivo</p>
     </div>
     <section class="section">
         <div class="row sameheight-container">
            <div>
              <div class="" >
                <div class="panel panel-primary">
                  {!! Form::open(['route'=>'mantenimientoPre.store','method'=>'POST']) !!}
                  <fieldset>
                    <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                    <div class="row table-responsive"> <!--Begin Datatables-->
                      <div class="card table-responsive">
                        <div class="card-block table-responsive">
                          <section class="example">
                            <div class="col-md-2 "></div>
                            <div class="col-md-3" >
                              <label >* Orden de trabajo </label>
                            </div>
                            <div class="col-md-2">
                              {!!Form::number('numTrabajo',null,['id'=>'numTrabajo','class'=>'form-control', 'placeholder'=>'Ej 001','required'])!!}
                            </div>
                            <div class="col-md-2">
                              <label >* Fecha</label>
                            </div>
                            <div class="col-md-3">
                              <input id="fechaInicioMtt" name="fechaInicioMtt" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>
                            <br><br><br><br>
                            <div class="row">
                              @foreach ($vehiculo as $v)
                               <div class="col-xl-5">
                                   <div class="card card-primary" align="center">
                                       <div class="card-header" >
                                           <div class="header-block" align="center">
                                             <p class="title">N. Placa:  {{$v->nPlaca}} </p>
                                             {!!Form::hidden('idVehiculo',$v->id,['id'=>'idVehiculo','class'=>'form-control','required'])!!}

                                           </div>
                                       </div>
                                       <div class="card-block">
                                         <img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                      </div>
                                       <div class="card-footer">
                                         <p class="mtt">Kilometraje de Mantenimiento cada {{$v->kilometrajeM}} km</p>
                                         <p class="title">Kilometraje Actual {{$v->kilometrajeAux}} km</p>
                                        </div>
                                   </div>
                               </div>
                             @endforeach

                             <div class="col-xl-2">
                               <label>* Mecánico</label>
                             </div>
                             <div class="col-xl-5">
                               <select name="idMecanico" id="idMecanico" class="validate[required] form-control">
                                 @foreach($mecanico as $m)
                                     <option value="{{$m->id}}">{{$m->nombresMec." ".$m->apellidosMec}}</option>
                                 @endforeach
                               </select>
                              </div>
                              <br><br><br>
                              <div class="col-xl-5">
                                <label>* Observaciones</label>
                              </div>
                              <div class="col-md-7">
          		                    {!!Form::textarea('observacionInicioMtt',null,['class'=>'form-control', 'placeholder'=>'lista de observaciones o fallas', 'rows'=>'8', 'cols'=>'5','required'])!!}
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>

                 </fieldset>
                 <div align="right">
                 {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
                 {!! Form::reset('Cancelar',['class'=>'btn btn-info' ]) !!}
                 </div>
                 {{-- {!!link_to_action("MotoristaController@index", $title = "Salir", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!} --}}
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
