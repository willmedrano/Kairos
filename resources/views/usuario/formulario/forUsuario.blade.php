<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
        <h5 id ="campoObligatorio">Nuevo Usuario </h5>
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
            <label class="control-label col-lg-3">* usuario </label>
            <div class="col-lg-3">
              {!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'Ingrese Código de usuario...','required'])!!}
            </div>
            <label class="control-label col-lg-3">* Correo </label>
            <div class="col-lg-3">
              {!!Form::text('email',null,['id'=>'email','class'=>'form-control', 'placeholder'=>'Ingrese correo electrónico...','required'])!!}
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="control-label col-lg-3">* Contraseña </label>
            <div class="col-lg-3">
		         {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Contrasena...', 'required'])!!}
            </div>
          </div>
</div><!-- /.row -->
