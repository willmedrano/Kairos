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
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE MOTORISTA/OPERARIO</i></span>
       <p class="title-description"> Consulta de Motorista/Operario </p>
   </div>   
   <section class="section">

       <div class="row sameheight-container">
          <div>
            <div>
              <div class="panel panel-primary">
                <fieldset>

                  <!--Begin Datatables-->
                  <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">
                        <div class="card-title-block table-responsive">
                          <div class="card-title-block">
                            <div class="form-group" align="right">
                              <span class="col-md-1 col-md-offset-7 text-center"><i class="fa fa-search bigicon icon_nav"></i>Buscar</span>
                              <div class="col-xs-4">
                                <input id="filtrar" name="name" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>      
                        <section class="example">
                          {!!link_to_action("MotoristaController@activo", $title = "activos", $parameters = 1, $attributes = ["class"=>"btn btn-primary btn-sm"])!!}
                          {!!link_to_action("MotoristaController@desactivo", $title = "Desactivos", $parameters = 1, $attributes = ["class"=>"btn btn-sm btn-info"])!!}
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead align="center">
                              <tr>
                               <th >FOTO</th>
                               <th >NOMBRE</th>
                               <th >TIPO</th>
                               <th >F/CONTRATO</th>
                               <th >F/DESPIDO</th>
                               <th colspan="3" > <div align="center">ACCIÓN</div></th>
                               <th >ESTADO</th>
                             </tr>
                           </thead>
                           <tbody id="hola" class="buscar">
                             @foreach ($motorista as $m)
                               @include('motorista.edit')
                               @include('motorista.baja')
                               @include('motorista.alta')
                               @include('motorista.editFoto')
                               @include('motorista.show')
                               <tr>
                                 <td>
                                   <div class="pull-left image">
                                   <a href="/Kairos/public/imagenesMotoristas/{{$m->nombre_img }}" data-lightbox="galeria" data-title="{{$m->nombresMot}}" ><img src="/Kairos/public/imagenesMotoristas/{{$m->nombre_img }}" alt="{{$m->nombresMot }}" width="40px" height="40px" class="img-circle"></a>

                 					         </div>
                                 </td>
                                 <td>{{$m->nombresMot.' '.$m->apellidosMot}}</td>
                                 <td>{{$m->tipoMot}}</td>
                                 <?php
                                  $date = new DateTime($m->fechaContrato);
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>


                                @if($m->fechaContrato!=$m->fechaDespido || $m->estadoMot==false )
                                   <?php
                                  $date = new DateTime($m->fechaDespido);
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                @else
                                <td>En Proceso</td>
                                @endif
                                <td><button type="submit"  class="btn btn-primary btn-sm fa fa-eye" data-toggle="modal" data-target="#ModalMot{{$m->id}}"></button> </td>
                                <td><button type="submit"  class="btn btn-primary btn-sm fa fa-picture-o" data-toggle="modal" data-target="#EditFoto{{$m->id}}"></button> </td>
                                <td><a href="#" class="btn btn-info btn-sm" data-id="{{ $m->id }}" data-toggle="modal" data-target="#Edit{{ $m->id }}">Modificar</a></td>

                                  @if($m->estadoMot==true)
                                      <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$m->id}}">A c t i v o</button></td>
                                  @endif
                                  @if($m->estadoMot==false)
                                      <td><button type="submit"  class="btn btn-sm" data-toggle="modal" data-target="#gridSystemModal3{{$m->id}}">Desactivo</button></td>
                                  @endif
                               </tr>
                             @endforeach
                           </tbody>
                         </table>
                         </section>
                       </div>
                     </div>
                   </div><!-- /.row -->
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
