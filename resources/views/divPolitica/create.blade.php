@extends ('index')
@section('content')
{!! Form::open(['route'=>'division.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
  @include('divPolitica.formDivision')
  {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk']) !!}
  {!! Form::reset('Limpiar',['class'=>'btn btn-primary']) !!}
  {{-- {!!link_to_action("MotoristaController@index", $title = "Salir", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!} --}}
{!! Form::close() !!}
@stop
