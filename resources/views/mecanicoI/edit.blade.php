<div id="Edit{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Mecánico</h4>
            </div>
            <div class="modal-body ">
                <div class="container-fluid bd-example-row">
                    {!! Form::model($mecanico,['route'=>['mecanicoI.update',$m->id],'method'=>'PUT']) !!}
                        <fieldset>
                          <input type="hidden" name="hi2" value="1">
                          <br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Nombres </label>
                              <label class="control-label col-md-6">Apellidos </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('nombresMec',$m->nombresMec,['id'=>'nombresMec','class'=>'form-control ', 'placeholder'=>'Ingrese los nombres...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::text('apellidosMec',$m->apellidosMec,['id'=>'apellidosMec','class'=>'form-control', 'placeholder'=>'Ingrese los apellidos...','required'])!!}
                              </div>
                              </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Sexo </label>
                              <label class="control-label col-md-6">Teléfono </label>
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
                                    {!!Form::text('telefonoMot',$m->telefonoMec,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'','required'])!!}
                                  </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-12">DUI </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                                {!!Form::text('DUI',$m->DUI,['onKeyPress'=>'return validarDUI(event)','id'=>'DUI','class'=>'form-control', 'placeholder'=>'Documento Unico de Identidad...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">F/Nacimiento</label>
                              <label class="control-label col-md-6">F/Contrato</label>
                            </div>
                            <div class="form-group">                              
                              <div class="col-md-6">
                                {!!Form::date('fechaNacimiento',$m->fechaNacimiento,['id'=>'fechaNacimiento','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de nacimiento...','required'])!!}
                              </div>
                              <div class="col-md-6">
                                {!!Form::date('fechaContrato',$m->fechaContrato,['id'=>'fechaContrato','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de contrato...','required'])!!}
                              </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-6">Dirección </label>
                              <label class="control-label col-md-6">Observación </label>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
          		                    {!!Form::textarea('direccionMec',$m->direccionMec,['class'=>'form-control', 'placeholder'=>'Domicilio del Empleado...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                              </div>
                              <div class="col-md-6">
          		                    {!!Form::textarea('observacionMec',$m->observacionMec,['class'=>'form-control', 'placeholder'=>'Observaciones...', 'rows'=>'3', 'cols'=>'4','required'])!!}
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
