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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > ACTIVIDAD</i></span>
       <p class="title-description"> Registro de Actividades </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Actividades</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                {!! Form::open(['route'=>'actividad.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                <fieldset>
                <h6 class="campoObligatorio">los campos con ( * ) son obligatorios</h6>
                <div id="collapseOne" class="body">
                <br>
                    <label class="control-label bigicon">Actividad</label>
                       
                    <br><br>
                  <div class="form-group">
                  
                    
                    <label class="control-label col-md-2">*Nombre </label>

                    <div class="col-lg-3">
                      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control', 'placeholder'=>'Ingrese el nombre...','required'])!!}
                    </div>
                    
                        
                         <div class="form-group">
                            <label class="control-label col-md-2">* Lugar </label>
                            <div class="col-xs-4">
                                <select class=" form-control" name="idCC">
                            
                             @foreach($cc as $c)

                                <option  value="{{ $c->id }}" >{{ $c->nombre }}</option>
                            @endforeach
                           
                        </select>
                            </div><br>                        </div><br>
                        <label class="control-label col-md-2">*Descripción </label>

                    <div class="col-lg-3">
                      {!!Form::text('desc',null,['id'=>'desc','class'=>'form-control', 'placeholder'=>'Ingrese el descripcion...','required'])!!}
                    </div>

                    <label class="control-label col-md-2">* Fecha de Inicio</label>
                            <div class="col-md-4">
                              
                              <input id="fechaInicial" name="fechaInicial" type="date" class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>
                            
                        <br><br><br>
                    {!!Form::label('limagen','Imagen:')!!}
                    {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}

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
<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 


  
?>