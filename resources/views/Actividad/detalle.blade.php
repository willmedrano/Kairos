@extends ('index')
<?php $message=Session::get('message');?>

@if($message=='update')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> Sea Actualizado con exito el registro</strong>
</div>
@endif
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
@section('content')



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
 @include('Actividad.formDetalle')
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE VEHÍCULOS</i></span>
       <p class="title-description"> Consulta de vehículos</p>
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
                        <div class="form-group" align="center">
                          <p>
                            <div>
                          

                          <button type="submit"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#detalle{{$id}}">Nuevo Avance</button>
                        </div>
                          </p>
                        </div>
                        <br>
                        <section class="example">
                          <div class="row">
                          
                            @foreach ($detalles as $v)

                             <div class="col-xl-4">
                             <div class="card " align="center">
                                     <div  align="center">
                                         <div class="header-block" align="center">
                                           <p class="title" > {{$v->nombre}} </p>
                                         </div>
                                     </div>
                             
                               <div class="card-block"><a href="/Kairos/public/imagenesDetalle/{{$v->nombre_img }}  " data-lightbox="galeria" data-title="{{$v->nombre}} - {{ $v->observacion }}" ><img src="/Kairos/public/imagenesDetalle/{{$v->nombre_img }}" alt="{{$v->nombre_img }}" width="250px" height="150px"></a></div>
                               
                             
                             
     
                                  

                                 <div class="card-footer">
                                    
                                      
                                      {{ $v->observacion }}
                                     
                                       
                                       

                                      </div>
                                      </div>
                                      </div>
                             
                           @endforeach
                         </ul>
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
