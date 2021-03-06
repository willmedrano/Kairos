<div id="EditFoto{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Foto </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                  {!! Form::model($motorista,['route'=>['motorista.update',$m->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="4">
                            <label class="control-label col-md-6">Foto Actual </label>
                            <center>
                                <img src="/Kairos/public/imagenesMotoristas/{{$m->nombre_img }}" class="" alt="User Image" width="325px" height="250px">
                             </center>
                            <br><br><br>
                            <div class="form-group">
                              <div class="col-md-6">
                              {!!Form::label('limagen','Seleccione una nueva foto:')!!}
                              {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}
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
