<div id="Edit{{ $v->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Vehiculo</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($vehiculo,['method'=>'PATCH','route'=>['vehiculo.update',$v->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                              <label class="control-label col-md-2">* Color </label>
                              <div class="col-md-4">
                                {!!Form::text('color',$v->color,['id'=>'color','class'=>'form-control', 'placeholder'=>'color del vehiculo...','required'])!!}
                            </div>
                              <label class="control-label col-md-2">* Año </label>
                              <div class="col-md-4">
                                {!!Form::text('anio',$v->anio,['id'=>'anio','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-2">* Nº Placa </label>
                              <div class="col-md-4">
                                {!!Form::text('nPlaca',$v->nPlaca,['id'=>'nPlaca','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                              <label class="control-label col-md-2">* Nº Inventario </label>
                              <div class="col-md-4">
                                {!!Form::text('nInventario',$v->nInventario,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">* Kilometraje Mantenimiento</label>
                              <div class="col-md-4">
                                {!!Form::text('kilometrajeM',$v->kilometrajeM,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'','required'])!!}
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
@section('scripts')
    {!!Html::script('js/busModelo.js')!!}
  @endsection
