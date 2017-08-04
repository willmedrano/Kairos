
@extends ('index')
@section('content')
{!! Form::open(['route'=>'coloniaCaserio.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
  @include('ColoniaCaserio.formBarrioCaserio')
  {!! Form::submit(' Registrar',['class'=>'btn btn-primary glyphicon glyphicon-floppy-disk']) !!}
  {!! Form::reset('Limpiar',['class'=>'btn btn-primary']) !!}
  {{-- {!!link_to_action("MotoristaController@index", $title = "Salir", $parameters = 1, $attributes = ["class"=>"btn btn-danger"])!!} --}}
{!! Form::close() !!}
@stop