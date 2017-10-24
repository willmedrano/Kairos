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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Modelo</i></span>
       <p class="title-description"> Registro de modelos para vehiculo y maquinaria </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Modelo</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'modelo.store','method'=>'POST']) !!}
                        <fieldset>
                          <a href="/Kairos/public/marca" class="btn btn-success btn-sm"" ">Atrás</a>
                          <br>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <br>
                        <label class="control-label bigicon">{{$marca->nomMarca }} </label>
                           <input type="hidden" name="id" value="{{ $marca->id }}">
                        <br><br>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* Modelo </label>
                            <div class="col-lg-3">
                              {!!Form::text('nomModelo',null,['id'=>'nomModelo','class'=>'form-control', 'placeholder'=>'Ingrese Modelo...','required'])!!}
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
