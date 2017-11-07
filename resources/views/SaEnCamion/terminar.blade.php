<div id="gridSystemModal2{{$c->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Finalizar Salida</h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!!Form::model($c,['method'=>'PATCH','route'=>['salidaEntrada3.update',$c->id]])!!}
          
            ¿El Vehiculo ya Regreso?
            <br>
              <input type="hidden" name="hi" value="{{ $c->estado }}">
              <input type="hidden" name="bandera" value="1">
              <br>
              <label class="control-label col-md-4">*Hora de    Entrada </label>

                    <div class="col-lg-3">
                      {!!Form::Time('horaS',null,['id'=>'horaS','class'=>'form-control', 'placeholder'=>'Ingrese la hora de salida...','required'])!!}
                    </div>
                    <br><br> <br>
                    <label class="control-label col-md-4">*Kilometraje de Entrada </label>

                    <div class="col-lg-3">
                      {!!Form::text('kilometrajeS',null,['id'=>'kilometrajeS','class'=>'form-control', 'placeholder'=>'Ingrese el kilometraje de salida...','required'])!!}
                    </div>
                    <br><br> <br>
                    <label class="control-label col-md-4">*Numero de viajes </label>

                    <div class="col-lg-3">
                      {!!Form::text('nViajes',null,['id'=>'nViajes','class'=>'form-control', 'placeholder'=>'Ingrese el numero de viajes','required'])!!}
                    </div>
                    <br><br><br>

                    <label class="control-label col-md-4">*Horas Extra </label>

                    <div class="col-lg-3">
                      {!!Form::text('horaExtra',null,['id'=>'horaExtra','class'=>'form-control', 'placeholder'=>'Ingrese las horas Extra ','required'])!!}
                    </div>
                    <br><br><br>
                    <label class="control-label col-md-4">*Observaciones </label>

                    <div class="col-lg-8">
                    
                      {!!Form::textArea('observacionesE',null,['id'=>'observacionesE','class'=>'form-control', 'rows'=>'4','cols'=>'50',  'placeholder'=>'Ingrese las observaciones...','required'])!!}
                    </div>
                            
                    <br><br><br><br><br><br><br>

              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>

              </div>

          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>