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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nuevo Usuario</i></span>
       <p class="title-description"> Registro de Usuario </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Usuario</h1>
                </div>
                <fieldset>
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
              </fieldset>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div>
    </section>
  </article>
