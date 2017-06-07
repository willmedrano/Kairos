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
                <fieldset>
                <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                <div id="collapseOne" class="body">
                  <div class="form-group">
                    <label class="control-label col-lg-3">* Nombres </label>
                    <div class="col-lg-3">
                      {!!Form::text('nombresMot',null,['id'=>'nombresMot','class'=>'form-control', 'placeholder'=>'Ingrese los nombres...','required'])!!}
                    </div>
                    <label class="control-label col-lg-3">* Apellidos </label>
                    <div class="col-lg-3">
                      {!!Form::text('apellidosMot',null,['id'=>'apellidosMot','class'=>'form-control', 'placeholder'=>'Ingrese los apellidos...','required'])!!}
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="control-label col-lg-3">* Dirección </label>
                    <div class="col-lg-3">
		                    {!!Form::textarea('direccionMot',null,['class'=>'form-control', 'placeholder'=>'Domicilio del Empleado...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                    </div>
                    <label class="control-label col-lg-3">* Sexo </label>
                    <div class="col-lg-3">
                      <select name="sexo" id="sport" class="validate[required] form-control">
                        <option value="0">Selecione una opción...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                      </select>
                    </div>
                  </div>
                  <br><br><br>
                  <div class="form-group">
                    <label class="control-label col-lg-3">* Teléfono </label>
                    <div class="col-lg-3">
                      {!!Form::text('telefonoMot',null,['onKeyPress'=>'','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'','required'])!!}
                    </div>
                    <label class="control-label col-lg-3">* DUI </label>
                    <div class="col-lg-3">
                      {!!Form::text('DUI',null,['onKeyPress'=>'return validarDUI(event)','id'=>'DUI','class'=>'form-control', 'placeholder'=>'Documento Unico de Identidad...','required'])!!}
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="control-label col-lg-3">* Licencia </label>
                    <div class="col-lg-3">
                      {!!Form::text('licencia',null,['id'=>'licencia','class'=>'form-control', 'placeholder'=>'numero de licencia de conducir...','required'])!!}
                    </div>
                    <label class="control-label col-lg-3">* Fecha de nacimiento</label>
                    <div class="col-lg-3">
                      {!!Form::date('fechaNacimiento',null,['id'=>'fechaNacimiento','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de nacimiento...','required'])!!}
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="control-label col-lg-3">* Fecha de contrato</label>
                    <div class="col-lg-3">
                      {!!Form::date('fechaContrato',null,['id'=>'fechaContrato','class'=>'form-control', 'max'=>'','placeholder'=>'Fecha de contrato...','required'])!!}
                    </div>
                    {!!Form::label('limagen','Imagen:')!!}
                    {!!Form::file('nombre_img',['value'=>'Elija'])!!}
                  </div>
                </div>
              </fieldset>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div>
    </section>
  </article>
