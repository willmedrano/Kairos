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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Vehiculo</i></span>
       <p class="title-description"> Registro de Vehiculos </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Vehiculo</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                  <div class="card table-responsive">
                    <div class="card-block table-responsive">
                      {!! Form::open(['route'=>'vehiculo.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                      <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* tipo </label>
                            <div class="col-md-4">
                              <select name="idTipo" id="" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                @foreach($tipo as $t)
                  									<option value="{{$t->id}}">{{$t->TipoVM}}</option>
                  							@endforeach
                              </select>
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Marca </label>
                            <div class="col-md-4">
                              <select name="selectMarca" id="selectMarca" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                @foreach($marca as $m)
                  									<option value="{{$m->id}}">{{$m->nomMarca}}</option>
                  							@endforeach
                              </select>
                            </div>
                            <label class="control-label col-md-2">* Modelo </label>
                            <div class="col-md-4">
                              <select name="idModelo" id="idModelo" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>

                                </select>
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Color </label>
                            <div class="col-md-4">
                              {!!Form::text('color',null,['id'=>'color','class'=>'form-control', 'placeholder'=>'color del vehiculo...','required'])!!}
                          </div>
                            <label class="control-label col-md-2">* Año del vehiculo</label>
                            <div class="col-md-4">
                              {!!Form::text('anio',null,['id'=>'anio','class'=>'form-control', 'placeholder'=>'Ej: 2017','required'])!!}
                            </div>
                          </div>
                          <br><br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Nº Placa </label>
                            <div class="col-md-4">
                              {!!Form::text('nPlaca',null,['id'=>'nPlaca','class'=>'form-control', 'placeholder'=>'Ej: P-0000','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Nº Inventario </label>
                            <div class="col-md-4">
                              {!!Form::text('nInventario',null,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'Ej: AMI-AF-0000-0000-000','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Kilometraje </label>
                            <div class="col-md-4">
                              {!!Form::number('kilometraje',null,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'Ej: 5000','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Kilometraje Mantenimiento</label>
                            <div class="col-md-4">
                              {!!Form::number('kilometrajeM',null,['id'=>'nInventario','class'=>'form-control', 'placeholder'=>'Ej: 3000','required'])!!}
                          </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Observación </label>
                            <div class="col-md-4">
        		                    {!!Form::textarea('observacionVeh',null,['class'=>'form-control', 'placeholder'=>'Observaciones...', 'rows'=>'3', 'cols'=>'5','required'])!!}
                            </div>
                            <div class="col-md-2">
                            {!!Form::label('limagen','* Imagen:')!!}
                            {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}
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
      {!!Html::script('js/busModelo.js')!!}
    @endsection
