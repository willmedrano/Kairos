
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
            <center>
               <img src="/Kairos/public/imagenesMotoristas/{{$m->nombre_img }}" class="" alt="User Image" width="325px" height="250px">
             </center>
             <br>
             <div class="col-xs-6"><b> Nombres:</b></div>
             <div class="col-xs-6">{{$m->nombresMot}}</div>
             <div class="col-xs-6"><b> Apellidos:</b></div>
             <div class="col-xs-6">{{$m->apellidosMot}}</div>
             <div class="col-xs-6"><b>Dirección:</b></div>
             <div class="col-xs-6">{{$m->direccionMot}}</div>
             <div class="col-xs-6"><b>Sexo:</b></div>
             <div class="col-xs-6">{{$m->sexo}}</div>
             <div class="col-xs-6"><b>Teléfono:</b></div>
             <div class="col-xs-6">{{$m->telefonoMot}}</div>
             <div class="col-xs-6"><b> DUI:</b></div>
             <div class="col-xs-6">{{$m->DUI}}</div>
             <div class="col-xs-6"><b>Licencia:</b></div>
             <div class="col-xs-6">{{$m->licencia}}</div>
             <?php
                $date = new DateTime($m->fechaContrato);
                $date1 = new DateTime($m->fechaNacimiento);
              ?>
             <div class="col-xs-6"><b>fecha de Nacimiento:</b> </div>
             <div class="col-xs-6"><?php  echo $date1->format('d/m/Y'); ?></div>
             <div class="col-xs-6"><b>  fecha de Contrato:</b></div>
             <div class="col-xs-6"><?php  echo $date->format('d/m/Y'); ?></div>
             <div class="col-xs-6"><b>Tipo:</b></div>
             <div class="col-xs-6">{{$m->tipoMot}}</div>
             <div class="col-xs-6"><b> Observación:</b></div>
             <div class="col-xs-6">{{$m->observacionMot}}</div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
