<div id="Edit{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Motorista/Operario</h4>
            </div>
            <div class="modal-body ">
                <div class="container-fluid bd-example-row">
                    {!! Form::model($motorista,['route'=>['motorista.update',$m->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <fieldset>
                          <input type="hidden" name="hi2" value="1">
                          <br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Nombres </label>
                              <label class="control-label col-md-6">Apellidos </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('nombresMot',$m->nombresMot,['id'=>'nombresMot','class'=>'form-control ', 'placeholder'=>'Ingrese los nombres...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('apellidosMot',$m->apellidosMot,['id'=>'apellidosMot','class'=>'form-control', 'placeholder'=>'Ingrese los apellidos...','required'])!!}
                              </div>
                              </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Sexo </label>
                              <label class="control-label col-md-6">Tipo </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                <select name="sexo" id="sport" class="validate[required] form-control">
                                  @if($m->sexo=="Masculino")
                                      <option  selected value="Masculino" >Masculino</option>
                                      <option value="Femenino">Femenino</option>
                                  @endif
                                  @if($m->sexo=="Femenino")
                                      <option value="Masculino">Masculino</option>
                                      <option selected value="Femenino" >Femenino</option>
                                  @endif
                                </select>
                              </div>
                                <div class="col-md-6">
                                  <select name="tipoMot" id="" class="validate[required] form-control">
                                    @if($m->tipoMot=="Operario")
                                    <option selected value="Operario">Operario</option>
                                    <option value="Motorista">Motorista</option>
                                  @endif
                                  @if($m->tipoMot=="Motorista")
                                    <option selected value="Motorista">Motorista</option>
                                    <option value="Operario">Operario</option>
                                    @endif
                                  </select>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Teléfono </label>
                              <label class="control-label col-md-6">DUI </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('telefonoMot',$m->telefonoMot,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'Numero celular...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('DUI',$m->DUI,['onKeyPress'=>'return validarDUI(event)','id'=>'DUI','class'=>'form-control', 'placeholder'=>'Documento Unico de Identidad...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-12">Licencia </label>
                              <div class="col-md-6">
                                {!!Form::text('licencia',$m->licencia,['onKeyPress'=>'return validarLicencia(event)','id'=>'licencia','class'=>'form-control', 'placeholder'=>'numero de licencia de conducir...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">F/Nacimiento</label>
                              <label class="control-label col-md-6">F/Contrato</label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::date('fechaContrato',$m->fechaContrato,['id'=>'fechaContrato','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de contrato...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::date('fechaNacimiento',$m->fechaNacimiento,['id'=>'fechaNacimiento','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de nacimiento...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Dirección </label>
                              <label class="control-label col-md-6">Observación </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
          		                    {!!Form::textarea('direccionMot',$m->direccionMot,['class'=>'form-control', 'placeholder'=>'Domicilio del Empleado...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                              </div>
                              <div class="col-md-6">
          		                    {!!Form::textarea('observacionMot',$m->observacionMot,['class'=>'form-control', 'placeholder'=>'Observaciones...', 'rows'=>'3', 'cols'=>'4','required'])!!}
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
  {!!Html::script('js/validaciones.js')!!}
  @endsection
