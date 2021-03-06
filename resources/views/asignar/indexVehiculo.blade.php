@extends ('index')
<?php $message=Session::get('message');?>

@if($message=='update')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> Sea Actualizado con éxito el registro</strong>
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
  @if (Session::has('mensaje'))
<div class="alert alert-success" role="alert" >
<button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
{{Session::get('mensaje')}}
</div>
@endif
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE ASIGNACIÓN VEHICULOS</i></span>
       <p class="title-description"> Consulta de vehiculos no asignados</p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div class=\ >
              <div class="panel panel-primary">
                <fieldset>
                  <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">

                        <br>
                        <div class="card-title-block table-responsive">
                          <div class="card-title-block">
                            <div class="form-group" align="right">

                            </div>
                          </div>
                        </div>
                        <section class="example">
                          <div class="row">
                              <?php
                                  $cont=0;
                                  ?>
                            @foreach ($vehiculo as $v)
                              <?php
                              $bandera=true;
                              ?>
                              @foreach ($asignados as $v2)
                               @if($v->id==$v2->idVehiculo)
                                   <?php
                                  $bandera=false;
                                  ?>
                               @endif
                              @endforeach
                             
                              @if($bandera)
                              <?php
                                  $cont++;
                                  ?>
                               <div class="col-xl-4">
                                   <div class="card card-primary" align="center">
                                       <div class="card-header" >
                                           <div class="header-block" align="center">
                                             <p class="title"> {{"Placa: ".$v->nPlaca." ".$v->nomModelo}} </p>
                                           </div>
                                       </div>
                                       <div class="card-block">
                                         <img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                      </div>
                                       <div class="card-footer">
                                         @if($v->estadoVeh==true)
                                           {!!Form::open(['route'=>['asignarMotVeh.show',$v->id],'method'=>'GET'])!!}
                                              <input type="submit" name="" value=" Asignar Motorista"   class="btn btn btn-primary btn-sm active " >
                                           {!!Form::close()!!}
                                        @endif
                                        </div>
                                   </div>
                               </div>
                             @endif                             
                           @endforeach
                           @if($cont==0)
                              <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong> No hay vehiculos disponibles</strong>
                              </div>
                            @endif
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
