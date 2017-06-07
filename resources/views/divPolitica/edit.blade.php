@extends ('index')
@section('content')
{!! Form::model($motorista,['route'=>['motorista.update',$motorista->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
  @include('motorista.formulario.forMotorista')
  {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
  {!!link_to_action("MotoristaController@index", $title = "Cancelar", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!}
  {!! Form::close() !!}
@stop
