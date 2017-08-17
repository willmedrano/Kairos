<div id="Edit{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Maquinaria</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($maquinaria,['method'=>'PATCH','route'=>['maquinaria.update',$m->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                              <label class="control-label col-md-6">* Color </label>
                              <label class="control-label col-md-6">* Año </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('color',$m->color,['id'=>'color','class'=>'form-control', 'placeholder'=>'color del vehiculo...','required'])!!}
                            </div>
                              <div class="col-md-6">
                                {!!Form::text('anio',$m->anio,['id'=>'anio','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">* Nº Equipo </label>
                              <label class="control-label col-md-6">* Nº Inventario </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('nEquipo',$m->nEquipo,['id'=>'nEquipo','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('nInventario',$m->nInventario,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">* Horas para mantenimiento </label>
                              <label class="control-label col-md-6">* Observación </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('horaM',$m->horaM,['id'=>'horaM','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::textarea('observacionMaq',$m->ObservacionMaq,['id'=>'observacionMaq','class'=>'form-control', 'placeholder'=>'','required','rows'=>'3', 'cols'=>'5'])!!}
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
