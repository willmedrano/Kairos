@extends ('index')
@section('content')

<style>
  .campoObligatorio {
  color: red;
  }
  .bigicon {
      font-size: 35px;
      color: #337ab7;
  }
  legend{
      color: #36A0FF;
  }
</style>
<article class="content forms-page">
  @include('alertas.request')
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Motorista/OPerario</i></span>
       <p class="title-description"> Registro de Motorista/Operario </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Motorista/Operario</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                  <div class="card table-responsive">
                    <div class="card-block table-responsive">
                      {!! Form::open(['route'=>'motorista.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                      <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* Nombres </label>
                            <div class="col-md-4">
                              {!!Form::text('nombresMot',null,['id'=>'nombresMot','class'=>'form-control ', 'placeholder'=>'Ingrese los nombres...','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Apellidos </label>
                            <div class="col-md-4">
                              {!!Form::text('apellidosMot',null,['id'=>'apellidosMot','class'=>'form-control', 'placeholder'=>'Ingrese los apellidos...','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Dirección </label>
                            <div class="col-md-4">
        		                    {!!Form::textarea('direccionMot',null,['class'=>'form-control', 'placeholder'=>'Domicilio del Empleado...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Sexo </label>
                            <div class="col-md-4">
                              <select name="sexo" id="sport" class="validate[required] form-control">
                                
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                            </div>
                          </div>
                          <br><br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Teléfono </label>
                            <div class="col-md-4">
                              {!!Form::text('telefonoMot',null,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'Numero de teléfono celular...','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* DUI </label>
                            <div class="col-md-4">
                              {!!Form::text('DUI',null,['onKeyPress'=>'return validarDUI(event)','id'=>'DUI','class'=>'form-control', 'placeholder'=>'Documento Unico de Identidad...','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Licencia </label>
                            <div class="col-md-4">
                              {!!Form::text('licencia',null,['onKeyPress'=>'return validarLicencia(event)','id'=>'licencia','class'=>'form-control', 'placeholder'=>'numero de licencia de conducir...','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* F/Nacimiento</label>
                            <div class="col-md-4">
                              {!!Form::date('fechaNacimiento',null,['id'=>'fechaNacimiento','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de nacimiento...','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* F/Contrato</label>
                            <div class="col-md-4">
                              {!!Form::date('fechaContrato',null,['id'=>'fechaContrato','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de contrato...','required'])!!}
                            </div>
                            <div class="col-md-4">
                            {!!Form::label('limagen','* Imagen:')!!}
                            {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Tipo </label>
                            <div class="col-md-4">
                              <select name="tipoMot" id="" class="validate[required] form-control">
                                
                                <option value="Operario">Operario</option>
                                <option value="Motorista">Motorista</option>
                              </select>
                            </div>
                            <label class="control-label col-md-2">* Observación </label>
                            <div class="col-md-4">
        		                    {!!Form::textarea('observacionMot',null,['class'=>'form-control', 'placeholder'=>'Observaciones...', 'rows'=>'3', 'cols'=>'5','required'])!!}
                            </div>
                          </div>
                        </div>
                      </fieldset>
              <br><br>
              <div align="center">
               {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
               {!! Form::reset('Limpiar',['class'=>'btn btn-info' ]) !!}
              </div>
              {!! Form::close() !!}
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div>
    </section>
  </article>
  @stop
  @section('scripts')
    {!!Html::script('js/validaciones.js')!!}
    @endsection
