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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nuevo Tipo </i></span>
       <p class="title-description"> Registro Tipo Vehiculo/Maquinaria </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Tipo V/M</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'tipoVM.store','method'=>'POST']) !!}
                        <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <br>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-3">* Nombre del Tipo  </label>
                            <div class="col-lg-3">
                              {!!Form::text('TipoVM',null,['id'=>'TipoVM','class'=>'form-control', 'placeholder'=>'Ingrese Marca...','required'])!!}
                            </div>
                            <label class="control-label col-md-1">* Tipo </label>
                            <div class="col-md-4">
                              <select name="TipoVM2" id="" class="validate[required] form-control">
                                <option value="">Selecione una opción...</option>
                                <option value="Vehiculo">Vehiculo</option>
                                <option value="Maquinaria">Maquinaria</option>
                              </select>
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
