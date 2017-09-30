
<div id="ModalMtt{{$m->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
          <h4 class="modal-title" id="gridModalLabel3">Información</h4>
      </div>
      <div class="modal-body" >
        <div class="container-fluid bd-example-row">
          <div class="pull-left image">
             <img src="/Kairos/public/imagenesMaquinaria/{{$m->imgVehiculo($m->idMaquinaria)}}" class="" alt="User Image" width="525px" height="250px">
             <br>
             <div class="col-xs-6"><b> Mecanico:</b></div>
             <div class="col-xs-6">{{$m->mecanicoNom($m->idMecanico)}}</div>
             <div class="col-xs-6"><b> Numero de Equipo:</b></div>
             <div class="col-xs-6">{{$m->equipo($m->idMaquinaria)}}</div>
             <div class="col-xs-6"><b>Orden de trabajo:</b></div>
             <div class="col-xs-6">{{$m->numTrabajo}}</div>
             <?php
              $date = new DateTime($m->fechaInicioMtt);
              $date2 = new DateTime($m->fechaFinMtt);
            ?>
             <div class="col-xs-6"><b>Fecha de inicio:</b></div>
             <div class="col-xs-6"><?php  echo $date->format('d/m/Y'); ?></div>
             <div class="col-xs-6"><b> Observaciones iniciales:</b></div>
             <div class="col-xs-6">{!!Form::textarea('observacionFinalMtt',$m->observacionInicioMtt,['class'=>'form-control', 'placeholder'=>'lista del trabajo realizado', 'rows'=>'4', 'cols'=>'5','required','readonly'])!!}</div>
             <div class="col-xs-6"><b>Fecha de finalización:</b></div>
             <div class="col-xs-6"><?php  echo $date2->format('d/m/Y'); ?></div>
             <div class="col-xs-6"><b>Observaciones finales:</b></div>
             <div class="col-xs-6">{!!Form::textarea('observacionFinalMtt',$m->observacionFinalMtt,['class'=>'form-control', 'placeholder'=>'lista del trabajo realizado', 'rows'=>'4', 'cols'=>'5','required','readonly'])!!}</div>
             <div class="col-xs-6"><b>Gasto total $:</b> </div>
             <div class="col-xs-6">{{$m->gastoMPM}}</div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
