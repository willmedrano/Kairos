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
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" > BARRIO/CASERIO</i></span>
       <p class="title-description"> Registro de Barrio/Caserio </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Barrio/Caserio</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                {!! Form::open(['route'=>'barrioCaserio.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                <fieldset>
                <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                <div id="collapseOne" class="body">
                <br>
                    <label class="control-label bigicon">{{ $tipo->tipo.' '.$tipo->nombre }} </label>
                       <input type="hidden" name="id" value="{{ $tipo->id }}">              
                    <br><br>
                  <div class="form-group">
                  
                    
                    <label class="control-label col-md-1">* Nombre </label>

                    <div class="col-lg-3">
                      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control', 'placeholder'=>'Ingrese el nombre...','required'])!!}
                    </div>
                    {!!Form::label('limagen','Imagen:')!!}
                    {!!Form::file('nombre_img',['value'=>'Elija'])!!}

                  </div>
                </div>
              </fieldset>
             <br><br>
             <div align="center">
  {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk'  ]) !!}
  {!! Form::reset('Limpiar',['class'=>'btn btn-primary' ]) !!}
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