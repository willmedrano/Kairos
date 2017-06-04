@extends ('index')
@section('content')
{!! Form::model($user,['route'=>['usuario.update',$user->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
  @include('usuario.formulario.forUsuario')
  {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
  {!!link_to_action("UsuarioController@index", $title = "Cancelar", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!}
  {!! Form::close() !!}
@stop
