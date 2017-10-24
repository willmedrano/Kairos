@extends ('index')
<?php $message=Session::get('message');?>


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
@if($message=='update')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> •Sea actualizado con éxito el registro</strong>
</div>
@endif
@if($message=='create')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong> •Sea creado con éxito el registro</strong>
</div>
@endif



  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >CONTROL SOBRE LA DISTRIBUCIÓN  DE COMBUSTIBLE PARA MAQUINARIA</i></span>
       <p class="title-description"> Para la Maquinaria  </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div class="form-group" align="left">
            <div class=\ >
              <div class="panel panel-primary">
                <fieldset>
                  
                  <div class="row table-responsive"> <!--Begin Datatables-->

                    <div class="card table-responsive">

                      <div class="card-block table-responsive">
                        <div class="card-title-block table-responsive">

                          <div class="card-title-block">
                              <div>
                                <div class="col-xl-4">
                                 <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title"> {{"Placa: ".$v->nInventario." ".$v->nomModelo}} </p>
                                         </div>
                                     </div>
                                     <div class="card-block">
                                       <img src="/Kairos/public/imagenesMaquinaria/{{$v->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                    </div>
                                     <div class="card-footer">
                                      
                                     
                                      </div>
                                 </div>
                             </div>
                              </div>
                            <br><br><br><br><br><br><br><br><br>
                            <div class="form-group" align="right">
                              <span class="col-md-1 col-md-offset-3 text-center"><i class="fa fa-search bigicon icon_nav"></i>Buscar</span>
                              <div class="col-xs-4  ">
                                <input id="filtrar" name="name" type="text" class="form-control">
                              </div>
                            </div> 
                          </div> 
                        </div>

                        <section class="example">
                          <table class="table table-bordered table-hover" style="width:100%" >
                            <thead align="center">
                              <tr align="center">                    
                               <th >N°</th>
                               <th >NOMBRE DE QUIEN RECIBE</th>
                               <th ># VALE</th>
                               <th >CANTIDAD DE GALONES</th>
                               <th>VALOR EN $</th>
                               <th>TOTAL EN $</th>
                               <th>ACTIVIDAD</th>
                               <th>LUGAR DE LA MISIÓN</th>
                               
                               <th >FECHA</th> 
                               
                               
                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              
                           
                               
                             @if($c->estadoVale==true)
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                <td>{{ $c->nVale }}</td>
                                <td>{{$c->galones}}</td>
                                <td>{{ $c->PrecioU }}</td>
                                <td>{{ $c->total }}</td>
            
                                <td>{{ $c->act }}</td>
                                <td>{{ $c->nombre }}</td>
                                <?php 
                                  $date = new DateTime($c->fecha); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                                
                                

                                

                                 

                                
                                     
                                      
                                
                                
                                
                                
                                
                                
                                
                               
                                      
                                      
                                                                    
                              </tr>
                               @endif
                              @endforeach
                            </tbody>
                          </table>
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
  <?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 


  
?>