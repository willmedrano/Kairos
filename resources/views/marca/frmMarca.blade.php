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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nueva Marca</i></span>
       <p class="title-description"> Registro de marcas para vehiculo y maquinaria </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Marcas</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'marca.store','method'=>'POST']) !!}
                        <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <br>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* Marca </label>
                            <div class="col-lg-3">
                              {!!Form::text('nomMarca',null,['id'=>'nomMarca','class'=>'form-control', 'placeholder'=>'Ingrese Marca...','required'])!!}
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
