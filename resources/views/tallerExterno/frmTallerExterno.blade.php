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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Taller</i></span>
       <p class="title-description"> Registro de taller externo </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Taller Externo</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'tallerE.store','method'=>'POST']) !!}
                        <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <br>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* Nombre </label>
                            <div class="col-lg-4">
                              {!!Form::text('nomTallerE',null,['id'=>'nomTallerE','class'=>'form-control', 'placeholder'=>'Ingrese nombre del taller...','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Responsable </label>
                            <div class="col-lg-4">
                              {!!Form::text('responsable',null,['id'=>'responsable','class'=>'form-control', 'placeholder'=>'Nombre del responsable del taller...','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Dirección </label>
                            <div class="col-md-4">
        		                    {!!Form::textarea('direccionTE',null,['class'=>'form-control', 'placeholder'=>'Direeción del taller...', 'rows'=>'2', 'cols'=>'5','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Teléfono </label>
                            <div class="col-md-4">
                              {!!Form::text('telefonoTE',null,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'Numero de teléfono taller...','required'])!!}
                            </div>
                            <br>  
                            <br>
                            <label class="control-label col-md-2">* Celular </label>
                            <div class="col-md-4">
                              {!!Form::text('celTE',null,['onKeyPress'=>'return validarTelefono(event)','id'=>'telefonoMot','class'=>'form-control', 'placeholder'=>'Numero de celular del encargado taller...','required'])!!}
                            </div>
                          </div>
                          <br><br>
                        </div><!-- /.row -->
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
