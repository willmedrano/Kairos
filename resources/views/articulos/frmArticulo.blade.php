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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nuevo Articulo</i></span>
       <p class="title-description"> Registro de articulos </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Articulos</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'articulos.store','method'=>'POST']) !!}
                        <fieldset>
                        <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                        <br>
                        <div id="collapseOne" class="body">
                          <div class="form-group">
                            <label class="control-label col-md-2">* Articulo </label>
                            <div class="col-lg-3">
                              {!!Form::text('articulo',null,['id'=>'articulo','class'=>'form-control', 'placeholder'=>'Ingrese el nombre del articulo...','required'])!!}
                            </div>
                            <label class="control-label col-md-2">* Cantidad </label>
                            <div class="col-lg-3">
                              {!!Form::number('cantidad',null,['id'=>'cantidad','class'=>'form-control', 'placeholder'=>'Ingrese la cantidad Ej 20','required'])!!}
                            </div>
                          </div>
                          <br><br>
                          <div class="form-group">
                            <label class="control-label col-md-2">* Descripción </label>
                            <div class="col-md-3">
                                {!!Form::textarea('descripcion',null,['class'=>'form-control', 'placeholder'=>'Descripción del articulo...', 'rows'=>'3', 'cols'=>'5','required'])!!}
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
