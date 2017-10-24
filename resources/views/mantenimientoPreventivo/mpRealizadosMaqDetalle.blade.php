
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
             <div class="col-xs-6"><b> Observaciones iniciales:</b></div>
             <div class="col-xs-12">{!!Form::textarea('observacionFinalMtt',$m->observacionInicioMtt,['class'=>'form-control', 'placeholder'=>'lista del trabajo realizado', 'rows'=>'4', 'cols'=>'5','required','readonly'])!!}</div>

             <div class="col-xs-6"><b>Observaciones finales:</b></div>
             <div class="col-xs-12">{!!Form::textarea('observacionFinalMtt',$m->observacionFinalMtt,['class'=>'form-control', 'placeholder'=>'lista del trabajo realizado', 'rows'=>'4', 'cols'=>'5','required','readonly'])!!}</div>
             <div class="col-xs-3"><b>Gasto total $:</b> </div>
             <div class="col-xs-2">{{$m->gastoMPM}}</div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
