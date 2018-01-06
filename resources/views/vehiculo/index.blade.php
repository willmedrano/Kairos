@extends ('index')
<?php $message=Session::get('message');?>

@if($message=='update')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> Sea Actualizado con exito el registro</strong>
</div>
@endif
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
  thead{
     background: #ffffcc;
     border:1;

}

</style>
<article class="content forms-page">
  @if (Session::has('update'))
  <div class="alert alert-info alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('update')}}
  </div>
  @endif
  @if($message=='create')
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> • Sea creado con éxito el registro</strong>
  </div>
  @endif
  @if (Session::has('mensaje'))
  <div class="alert alert-warning alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('mensaje')}}
  </div>
  @endif

  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE VEHICULOS</i></span>
       <p class="title-description"> Consulta de vehiculos</p>
   </div>
   <section class="section">    
       <div class="row sameheight-container">
          <div>
            {!!link_to_action("VehiculoController@index", $title = "Activos", $parameters = 1, $attributes = ["class"=>"btn btn-primary btn-sm"])!!}
           {!!link_to_action("VehiculoController@desactivo", $title = "Desactivos", $parameters = 1, $attributes = ["class"=>"btn btn-sm btn-info"])!!}
            <div>
              <div class="panel panel-primary">
                <fieldset>
                  <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        <div class="form-group" align="right">
                          <p>
                            <img src="/Kairos/public/img/verde.png" class="" alt="User Image" width="25px" height="25px"> Disponible
                            <img src="/Kairos/public/img/azul.png" class="" alt="User Image" width="30px" height="30px"> En Misión
                            <img src="/Kairos/public/img/amarillo.jpg" class="" alt="User Image" width="30px" height="30px"> Mttn Preventivo
                            
                            <img src="/Kairos/public/img/rojo.png" class="" alt="User Image" width="25px" height="25px"> 
                            Mttn Correctivo
                          </p>
                        </div>
                        <br>
                        <section class="example">
                          <div class="row">
                            @foreach ($vehiculo as $v)
                              @include('vehiculo.show')
                              @include('vehiculo.edit')
                              @include('vehiculo.editFoto')
                              @include('vehiculo.DardeBaja')
                              @include('vehiculo.DardeAlta')
                             <div class="col-xl-4">
                                 <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title"> # Placa: {{$v->nPlaca}} </p>
                                         </div>
                                     </div>
                                         <div class="card-block"><a href="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" data-lightbox="galeria" data-title="{{$v->nPlaca}}" ><img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" alt="{{$v->nPlaca }}" width="250px" height="150px"></a>
                                         </div>


                                     <div class="card-footer">
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-eye" data-toggle="modal" data-target="#ModalVehiculo{{$v->id}}"></button> </td>
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-edit" data-toggle="modal" data-target="#Edit{{$v->id}}"></button> </td>
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-picture-o" data-toggle="modal" data-target="#EditFoto{{$v->id}}"></button> </td>
                                       @if($v->estadoVeh==true)
                                           <td><button type="submit"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$v->id}}">A c t i v o</button></td>
                                       @endif
                                       @if($v->estadoVeh==false)
                                           <td><button type="submit"  class="btn btn-sm gris" data-toggle="modal" data-target="#gridSystemModal3{{$v->id}}">Desactivo</button></td>
                                       @endif
                                       @if($v->semaforo==1)
                                           <img src="/Kairos/public/img/verde.png" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($v->semaforo==2)
                                           <img src="/Kairos/public/img/amarillo.jpg" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($v->semaforo==4)
                                           <img src="/Kairos/public/img/rojo.png" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($v->semaforo==3)
                                           <img src="/Kairos/public/img/azul.png" class="" alt="User Image" width="25px" height="25px">
                                       @endif

                                      </div>
                                 </div>
                             </div>
                           @endforeach
                         </div>
                        </section>
                      </div>
                    </div>
                  </div>

               </fieldset>
             </div>
           </div><!-- /.col-lg-12 -->
         </div><!-- /.row -->
       </div>
     </section>
   </article>
@stop
@section('scripts')
    <!--{!!Html::script('js/scriptpersanalizado.js')!!}-->
    {!!Html::script('js/buscaresc.js')!!}
  @endsection
