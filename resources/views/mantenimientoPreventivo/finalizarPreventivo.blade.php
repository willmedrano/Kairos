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
    <div class="title-block">
      <span class=""><i class="fa fa-archive bigicon icon_nav" > MANTENIMIENTO PREVENTIVO</i></span>
         <p class="title-description"> Finalizar mantenimiento preventivo</p>
     </div>
     <section class="section">
         <div class="row sameheight-container">
            <div>
              <div class="" >
                <div class="panel panel-primary">
                  <fieldset>
                    <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                    <div class="row table-responsive"> <!--Begin Datatables-->
                      <div class="card table-responsive">
                        <div class="card-block table-responsive">
                          <section class="example">
                            <div class="col-md-6 ">
                              <table class="table table-bordered table-hover" style="width:100%" >
                                <thead>
                                   <tr>
                                     <th ><div align="center">Orden de trabajo</div></th>
                                     <th ><div align="center">Fecha de inicio</div></th>
                                     <th ><div align="center">Mecanico</div></th>
                                   </tr>
                                 </thead>
                                 <tbody >
                                   @foreach($mant as $mt)
                                     {!! Form::model($mant,['route'=>['mantenimientoPre.update',$mt->id],'method'=>'PUT']) !!}
                                     {!!Form::hidden('idMtt',$mt->id,['id'=>'idMtt','class'=>'form-control','required'])!!}
                                   <tr>
                                     <td align="center">{{$mt->idOrden}}</td>
                                     <?php
                                      $date = new DateTime($mt->fechaInicioMtt);
                                    ?>
                                     <td align="center"><?php  echo $date->format('d/m/Y'); ?></td>
                                     <td align="center">{{$mt->mecanicoNom($mt->idMecanico)}}</td>
                                   </tr>
                                 @endforeach
                                 </tbody>
                               </table>
                            </div>
                            <div class="col-xl-6">
                              <label>Observaciones iniciales</label>
                            </div>
                            <div class="col-md-6">
                              @foreach($mant as $mt)
                                {!!Form::textarea('observacionInicioMtt',$mt->observacionInicioMtt,['class'=>'form-control','rows'=>'6', 'cols'=>'6','required','readonly'])!!}
                                @endforeach
                            </div>
                            <br><br><br><br><br><br>
                            <div class="row">
                              @foreach ($vehiculo as $v)
                               <div class="col-xl-6">
                                   <div class="card card-primary" align="center">
                                       <div class="card-header" >
                                           <div class="header-block" align="center">
                                             <p class="title">N. Placa: {{$v->nPlaca}}  </p>
                                             {!!Form::hidden('idVehiculo',$v->id,['id'=>'idVehiculo','class'=>'form-control','required'])!!}

                                           </div>
                                       </div>
                                       <div class="card-block">
                                         <img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                      </div>
                                       <div class="card-footer">
                                         <p class="mtt">Kilometraje de Mantenimiento {{$v->kilometrajeM}} km</p>
                                         <p class="title">Kilometraje Actual {{$v->kilometrajeAux}} km</p>
                                        </div>
                                   </div>
                               </div>
                             @endforeach
                             <br><br>
                             <div class="col-xl-6">
                               <label>* Descripción del trabajo ralizado</label>
                             </div>
                             <div class="col-md-6">
                                 {!!Form::textarea('observacionFinalMtt',null,['class'=>'form-control', 'placeholder'=>'lista del trabajo realizado', 'rows'=>'6', 'cols'=>'5','required'])!!}
                             </div>
                             <div class="col-md-6">
                               <br><br>
                             </div>
                             <div class="col-md-3">
                               <label >* Fecha de finalización </label>
                             </div>
                             <div class="col-md-3">
                               <label >* Gasto total $ </label>
                             </div>
                             <div class="col-md-3">
                               <input id="fechaFinMtt" name="fechaFinMtt" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                             </div>
                             <div class="col-md-3">
                             {!!Form::text('gastoMP',null,['id'=>'gastoMP','class'=>'form-control', 'placeholder'=>'Ej 50.20','required'])!!}
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
                 </div> {!! Form::close() !!}
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
