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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > BARRIO/CANTÓN</i></span>
       <p class="title-description"> Registro de BARRIO/CANTÓN </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de BARRIO/CANTÓN</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                {!! Form::open(['route'=>'barrioCanton.store','method'=>'POST']) !!}
                <fieldset>
                <input type="hidden" name="hi2" value="1">
                <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                <div id="collapseOne" class="body">
                  <div class="form-group">
                  <label class="control-label col-md-1">* Tipo </label>
                    <div class="col-lg-3">
                      <select name="tipo" id="sport" class="validate[required] form-control">
                      
                        <option value="Barrio" id="1">Barrio</option>
                        <option value="Cantón" id="2">Cantón</option>
                      </select>
                    </div> 

                    <label class="control-label col-md-1">*Nombre </label>

                    <div class="col-lg-3">
                      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control', 'placeholder'=>'Ingrese el nombre...','required'])!!}
                    </div>
                  </div>
                </div>
              </fieldset>
             <br><br>
             <div align="center">
  {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
  {!! Form::reset('Limpiar',['class'=>'btn btn-info' ]) !!}
  </div>
  {{-- {!!link_to_action("MotoristaController@index", $title = "Salir", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!} --}}
{!! Form::close() !!}

              </div> 
                          </div> 
                        </div>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div>
    </section>
  </article>
@stop