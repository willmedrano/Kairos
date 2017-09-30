<div id="Edit{{ $a->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Articulo</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($articulos,['method'=>'PATCH','route'=>['articulos.update',$a->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                              <label class="control-label col-md-3">Articulo </label>
                              <div class="col-lg-6">
                                {!!Form::text('articulo',$a->articulo,['id'=>'articulo','class'=>'form-control', 'placeholder'=>'Ingrese el nombre del articulo...','required'])!!}
                              </div>
                              <br><br>
                              <label class="control-label col-md-3">Cantidad </label>
                              <div class="col-lg-6">
                                {!!Form::number('cantidad',$a->cantidad,['id'=>'cantidad','class'=>'form-control', 'placeholder'=>'Ingrese la cantidad Ej 20','required'])!!}
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-3">Descripción </label>
                              <div class="col-md-6">
                                  {!!Form::textarea('descripcion',$a->descripcion,['class'=>'form-control', 'placeholder'=>'Descripción del articulo...', 'rows'=>'3', 'cols'=>'5','required'])!!}
                              </div>
                            </div>
                            <br><br>

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
