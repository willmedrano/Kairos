

<div id="gridSystemModal3{{ $c->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Foto del Barrio/Caserio</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                  {!! Form::model($cc,['route'=>['coloniaCaserio.update',$c->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="4">
                            <label class="control-label col-md-6">Foto Actual </label>
                            <img src="/Kairos/public/imagenesColoniasCaserios/{{$c->nombre_img }}" class="" alt="User Image" width="500px" height="500px">
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