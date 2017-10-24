<div id="Edit{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Marca</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($marca,['method'=>'PATCH','route'=>['marca.update',$m->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >Marca: </label></span>
                                <div class="col-md-6">
                                  {!!Form::text('nomMarca',$m->nomMarca,['id'=>'name','class'=>'form-control', 'placeholder'=>'Ingrese Marca...','required'])!!}
                                </div>
                            </div>
                            <br><br>
                            <label class="control-label col-md-2">Tipo </label>
                            <div class="col-md-6">
                              <select name="tipoMar" id="" class="validate[required] form-control">
                                @if($m->tipoMar=='Vehiculo')
                                <option selected value="Vehiculo">Vehiculo</option>
                                <option value="Maquinaria">Maquinaria</option>
                              @else
                                <option value="Vehiculo">Vehiculo</option>
                                <option selected value="Maquinaria">Maquinaria</option>
                              @endif
                              </select>
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
