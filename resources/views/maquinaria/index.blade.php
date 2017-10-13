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
  @if (Session::has('create'))
  <div class="alert alert-success alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('create')}}
  </div>
  @endif
  @if (Session::has('update'))
  <div class="alert alert-info alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('update')}}
  </div>
  @endif
  @if (Session::has('mensaje'))
  <div class="alert alert-warning alert-dismissible" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
  {{Session::get('mensaje')}}
  </div>
  @endif
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE MAQUINARIA</i></span>
       <p class="title-description"> Consulta de maquinaria</p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <fieldset>
                  <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="form-group" align="right">
                        <p>
                          <img src="/Kairos/public/img/verde.png" class="" alt="User Image" width="25px" height="25px"> Disponible
                          <img src="/Kairos/public/img/amarillo.jpg" class="" alt="User Image" width="30px" height="30px"> Mttn Preventivo
                          <img src="/Kairos/public/img/azul.png" class="" alt="User Image" width="30px" height="30px"> Mttn Correctivo
                          <img src="/Kairos/public/img/rojo.png" class="" alt="User Image" width="25px" height="25px"> En Misión
                        </p>
                      </div>
                      <br>
                        <section class="example">
                          <div class="row">
                            @foreach ($maquinaria as $m)
                              @include('maquinaria.show')
                              @include('maquinaria.edit')
                              @include('maquinaria.editFoto')
                              @include('maquinaria.DardeBaja')
                              @include('maquinaria.DardeAlta')
                             <div class="col-xl-4">
                                 <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title"> {{$m->nomModelo}} </p>
                                         </div>
                                     </div>
                                     <div class="card-block">
                                       <img src="/Kairos/public/imagenesMaquinaria/{{$m->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                    </div>
                                     <div class="card-footer">
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-eye" data-toggle="modal" data-target="#ModalVehiculo{{$m->id}}"></button> </td>
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-edit" data-toggle="modal" data-target="#Edit{{$m->id}}"></button> </td>
                                       <td><button type="submit"  class="btn btn-primary btn-sm fa fa-picture-o" data-toggle="modal" data-target="#EditFoto{{$m->id}}"></button> </td>
                                       @if($m->estadoMaq==true)
                                           <td><button type="submit"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$m->id}}">A c t i v o</button></td>
                                       @endif
                                       @if($m->estadoMaq==false)
                                           <td><button type="submit"  class="btn btn-sm gris" data-toggle="modal" data-target="#gridSystemModal3{{$m->id}}">Desactivo</button></td>
                                       @endif
                                       @if($m->semaforo==1)
                                           <img src="/Kairos/public/img/verde.png" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($m->semaforo==2)
                                           <img src="/Kairos/public/img/amarillo.jpg" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($m->semaforo==3)
                                           <img src="/Kairos/public/img/rojo.png" class="" alt="User Image" width="25px" height="25px">
                                       @endif
                                       @if($m->semaforo==4)
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
