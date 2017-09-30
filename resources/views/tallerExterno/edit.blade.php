<div id="Edit{{ $t->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Taller</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($taller,['method'=>'PATCH','route'=>['tallerE.update',$t->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Nombre </label>
                              <label class="control-label col-md-6">Responsable </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('nomTallerE',$t->nomTallerE,['id'=>'nomTallerE','class'=>'form-control ', 'placeholder'=>'Ingrese el nombre del taller...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('responsable',$t->responsable,['id'=>'responsable','class'=>'form-control', 'placeholder'=>'Ingrese responsable del taller...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Dirección </label>
                              <label class="control-label col-md-6">Teléfono </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
          		                    {!!Form::textarea('direccionTE',$t->direccionTE,['class'=>'form-control', 'placeholder'=>'Direeción del taller...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('telefonoTE',$t->telefonoTE,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'Numero de teléfono taller...','required'])!!}
                              </div>
                            </div>

                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
