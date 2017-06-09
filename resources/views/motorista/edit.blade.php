<div id="Edit{{ $m->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Motorista/Operario</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!! Form::model($motorista,['route'=>['motorista.update',$m->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <fieldset>
                          <input type="hidden" name="hi2" value="1">
                          <br>
                            <div class="form-group">
                              <label class="control-label col-md-2">Nombres </label>
                              <div class="col-md-4">
                                {!!Form::text('nombresMot',$m->nombresMot,['id'=>'nombresMot','class'=>'form-control ', 'placeholder'=>'Ingrese los nombres...','required'])!!}
                              </div>
                              <label class="control-label col-md-2">Apellidos </label>
                              <div class="col-md-4">
                                {!!Form::text('apellidosMot',$m->apellidosMot,['id'=>'apellidosMot','class'=>'form-control', 'placeholder'=>'Ingrese los apellidos...','required'])!!}
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-2">Dirección </label>
                              <div class="col-md-4">
          		                    {!!Form::textarea('direccionMot',$m->direccionMot,['class'=>'form-control', 'placeholder'=>'Domicilio del Empleado...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                              </div>
                              <label class="control-label col-md-2">Sexo </label>
                              <div class="col-md-4">
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
                            </div>
                            <br><br><br>
                            <div class="form-group">
                              <label class="control-label col-md-2">Teléfono </label>
                              <div class="col-md-4">
                                {!!Form::text('telefonoMot',$m->telefonoMot,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'','required'])!!}
                              </div>
                              <label class="control-label col-md-2">DUI </label>
                              <div class="col-md-4">
                                {!!Form::text('DUI',$m->DUI,['onKeyPress'=>'return validarDUI(event)','id'=>'DUI','class'=>'form-control', 'placeholder'=>'Documento Unico de Identidad...','required'])!!}
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-2">Licencia </label>
                              <div class="col-md-4">
                                {!!Form::text('licencia',$m->licencia,['onKeyPress'=>'return validarLicencia(event)','id'=>'licencia','class'=>'form-control', 'placeholder'=>'numero de licencia de conducir...','required'])!!}
                              </div>
                              <label class="control-label col-md-2">F/Nacimiento</label>
                              <div class="col-md-4">
                                {!!Form::date('fechaNacimiento',$m->fechaNacimiento,['id'=>'fechaNacimiento','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de nacimiento...','required'])!!}
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-2">F/Contrato</label>
                              <div class="col-md-4">
                                {!!Form::date('fechaContrato',$m->fechaContrato,['id'=>'fechaContrato','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de contrato...','required'])!!}
                              </div>
                              {{-- <div class="col-md-4">
                              {!!Form::label('limagen','Imagen:')!!}
                              {!!Form::file('nombre_img',['value'=>'Elija'])!!}
                              </div> --}}
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
