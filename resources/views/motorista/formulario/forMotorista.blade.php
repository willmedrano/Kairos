<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
        <h5 id ="campoObligatorio">Nuevo Motorista (Operador)</h5>
        <!-- .toolbar -->
        <div class="toolbar">
          <nav style="padding: 8px;">
            <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
              <i class="fa fa-minus"></i>
            </a>
            <a href="javascript:;" class="btn btn-default btn-xs full-box">
              <i class="fa fa-expand"></i>
            </a>
            <a href="javascript:;" class="btn btn-danger btn-xs close-box">
              <i class="fa fa-times"></i>
            </a>
          </nav>
        </div><!-- /.toolbar -->
      </header>
      <style>
      .campoObligatorio {
    color: red;
}
      </style>
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
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
