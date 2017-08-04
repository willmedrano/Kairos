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
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Nueva Asignación</i></span>
       <p class="title-description"> Registro de nueva asignación de vehiculo </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1 class="panel-title">Formulario de Asignación</h1>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        {!! Form::open(['route'=>'asignarMotVeh.store','method'=>'POST']) !!}
                        <fieldset>
                          <div class="form-group">
                            <div class="col-md-4">
                              <a href="/Kairos/public/asignarMotVeh" class="btn btn-success btn-sm"" ">Atràs</a>
                              <br>
                              <div class="card-block">
                                <img src="/Kairos/public/imagenesVehiculos/{{$vehiculo->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                             </div>
                             </div>
                             <br><br>
                             <input type="hidden" name="idVehiculo" value="{{ $vehiculo->id }}">
                            <label class="control-label col-md-3">* Motorista </label>
                            <div class="col-md-4">
                              <select name="idMotorista" id="idMotorista" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                @foreach($motorista as $m)
                                    <option value="{{$m->id}}">{{$m->nombresMot}}</option>
                                @endforeach
                              </select>
                            </div>
                            <br><br>
                            <label class="control-label col-md-3">* Fecha de asignación </label>
                            <div class="col-md-4">
                              {!!Form::date('fechaInicio',null,['id'=>'fechaInicio','class'=>'form-control', 'max'=>'','placeholder'=>'...','required'])!!}
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
