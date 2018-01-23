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
      <span class=""><i class="fa fa-archive bigicon icon_nav" > MANTENIMIENTO CORRECTIVO</i></span>
         <p class="title-description"> Registrar vehiculo a mantenimiento correctivo</p>
     </div>
     <section class="section">
         <div class="row sameheight-container">
            <div>
              <div class="" >
                <div class="panel panel-primary">
                  {!! Form::open(['route'=>'mantenimientoCorVeh.store','method'=>'POST']) !!}
                  <fieldset>
                    <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                    <div class="row table-responsive"> <!--Begin Datatables-->
                      <div class="card table-responsive">
                        <div class="card-block table-responsive">
                          <section class="example">
                            <div class="col-md-2 " >
                            </div>
                            <div class="col-md-3" >
                              <label >* Orden de trabajo </label>
                            </div>
                            <div class="col-md-2">
                              {!!Form::number('nOrden',$idO,['id'=>'nOrden','class'=>'form-control','required','readonly'])!!}
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
                                   </div>
                               </div>
                             @endforeach
                             <div class="col-xl-2">
                               <label>* Reporta</label>
                             </div>                           

                               <div class="col-xl-5" >
                        <datalist id="idMotorista">
                          @foreach ($motorista as $m)
                          <option value="{{ $m->nombresMot. ' '.$m->apellidosMot }}">
                            @endforeach
                          </datalist>
                        <input list="idMotorista" class="form-control" name="idMotorista" required="true" >                       
                        </div>
                              <br><br><br>
                             <div class="col-xl-2">
                               <label>* Taller</label>
                             </div>
                             <div class="col-xl-5">
                               <select name="idTaller" id="idTaller" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                 @foreach($taller as $t)
                                     <option value="{{$t->id}}">{{$t->nomTallerE}}</option>
                                 @endforeach
                               </select>
                              </div>
                              <br><br>
                              <div class="col-xl-2">
                               <label> Mecanico</label>
                              </div>
                              <div class="col-xl-5">
                                <select name="mecanico" id="mecanico" class="validate[required] form-control">
                                  
                                  </select>
                              </div>
                                <br><br>
                              <div class="col-xl-3">
                                <label>* Fallas Reportadas</label>
                              </div>
                              <div class="col-md-7">
          		                    {!!Form::textarea('fallasVeh',null,['class'=>'form-control', 'placeholder'=>'lista de fallas reportadas', 'rows'=>'8', 'cols'=>'5','required'])!!}
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>

                 </fieldset>
                 <div align="right">
                 {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
                 {!! Form::reset('Cancelar',['class'=>'btn btn-danger' ]) !!}
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
   @section('scripts')
      {!!Html::script('js/mecanico.js')!!}
    @endsection
