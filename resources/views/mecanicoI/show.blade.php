
<div id="ModalMot{{$m->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
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
             <img src="/Kairos/public/imagenesMecanico/{{$m->nombre_img }}" class="" alt="User Image" width="525px" height="250px">
             <br>
             <div class="col-xs-6"><b> Nombres:</b></div>
             <div class="col-xs-6">{{$m->nombresMec}}</div>
             <div class="col-xs-6"><b> Apellidos:</b></div>
             <div class="col-xs-6">{{$m->apellidosMec}}</div>
             <div class="col-xs-6"><b>Dirección:</b></div>
             <div class="col-xs-6">{{$m->direccionMec}}</div>
             <div class="col-xs-6"><b>Sexo:</b></div>
             <div class="col-xs-6">{{$m->sexo}}</div>
             <div class="col-xs-6"><b>Teléfono:</b></div>
             <div class="col-xs-6">{{$m->telefonoMec}}</div>
             <div class="col-xs-6"><b> DUI:</b></div>
             <div class="col-xs-6">{{$m->DUI}}</div>
             <div class="col-xs-6"><b>fecha de Nacimiento:</b> </div>
             <div class="col-xs-6">{{$m->fechaNacimiento}}</div>
             <div class="col-xs-6"><b>  fecha de Contrato:</b></div>
             <div class="col-xs-6">{{$m->fechaContrato}}</div>
             <div class="col-xs-6"><b> Observación:</b></div>
             <div class="col-xs-6">{{$m->observacionMec}}</div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
