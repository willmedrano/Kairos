<div id="Edit{{ $t->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Tipo V/M</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($tipo,['method'=>'PATCH','route'=>['tipoVM.update',$t->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                                <span class="col-md-3  text-center" ><label >Tipo V/M: </label></span>
                                <div class="col-md-6">
                                  {!!Form::text('TipoVM',$t->TipoVM,['id'=>'TipoVM','class'=>'form-control', 'placeholder'=>'Ingrese el tipo ...','required'])!!}
                                </div>
                            </div>
                            <br><br>
                            <label class="control-label col-md-3"> Tipo </label>
                            <div class="col-md-6">
                              <select name="TipoVM2" id="" class="validate[required] form-control">
                                @if($t->TipoVM2=="Vehiculo")
                                <option selected value="Vehiculo">Vehiculo</option>
                                <option value="Maquinaria">Maquinaria</option>
                              @else
                                <option selected value="Maquinaria">Maquinaria</option>
                                <option  value="Vehiculo">Vehiculo</option>
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
