﻿@extends ('index')
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
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE MOTORISTA/OPERARIO</i></span>
       <p class="title-description"> Consulta de Motorista/Operario </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
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
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead align="center">
                              <tr>
                               <th >FOTO</th>
                               <th >NOMBRE</th>
                               <th >DIRECCIÓN</th>
                               <th >TELÉFONO</th>
                               <th >ACCIÓN</th>
                               <th >ESTADO</th>
                             </tr>
                           </thead>
                           <tbody id="hola" class="buscar">
                             @foreach ($motorista as $m)
                               @include('motorista.edit')
                             @include('motorista.baja')
                             @include('motorista.alta')
                               <tr>
                                 <td>
                                   <div class="pull-left image">
                 						         <img src="/Kairos/public/imagenesMotoristas/{{$m->nombre_img }}" class="img-circle" alt="User Image" width="40px" height="40px">
                 					         </div>
                                 </td>
                                 <td>{{$m->nombresMot.' '.$m->apellidosMot}}</td>
                                 <td>{{$m->direccionMot}}</td>
                                 <td>{{$m->telefonoMot}}</td>
                                 <td><a href="#" class="btn btn-info btn-sm" data-id="{{ $m->id }}" data-toggle="modal" data-target="#Edit{{ $m->id }}">Modificar</a></td>
                                  @if($m->estadoMot==true)
                                      <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$m->id}}">A c t i v o</button></td>
                                  @endif
                                  @if($m->estadoMot==false)
                                      <td><button type="submit"  class="btn btn-sm gris" data-toggle="modal" data-target="#gridSystemModal3{{$m->id}}">Desactivo</button></td>
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