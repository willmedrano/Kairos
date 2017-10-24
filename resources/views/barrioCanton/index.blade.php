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
{!!Html::style('css/app-red.css')!!}

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
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE BARRIO/CANTÓN</i></span>
       <p class="title-description"> Consulta de BARRIO/CANTÓN </p>
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
                               <th >N°</th>
                               <th >NOMBRE</th>
                               <th >TIPO</th>
                               <th ><div align="center">ACCIÓN</div></th>
                               <th ><div align="center">AGREGAR</div></th>
                               <th><div align="center">REGISTROS</div></th>

                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              @include('barrioCanton.edit')
                              <tr>  
                                @if($c->estadoB==1)

                                <td>{{$c->id}}</td>
                                <td>{{$c->nombre}}</td>
                                <td>{{$c->tipo}}</td>
                                <td align="center">
                                   

                                         <a href="#"   class="btn btn-info btn-sm" data-id="{{ $c->id }}" data-toggle="modal" data-target="#Edit{{ $c->id }}">Modificar</a>
                                </td>
                                <td align="center">  
                                  @if($c->tipo=="Cantón")
                                   {!!Form::open(['route'=>['barrioCanton.show',$c->id],'method'=>'GET'])!!}
                                      <input type="submit" name="" value="Caserios"   class="btn btn btn-primary btn-sm active " >
                                                        {!!Form::close()!!}
                                  @endif()
                                  @if($c->tipo=="Barrio")
                                   {!!Form::open(['route'=>['barrioCanton.show',$c->id],'method'=>'GET'])!!}
                                          <input type="submit" name="" value="Colonia"   class="btn btn-primary btn-sm active " >
                                                        {!!Form::close()!!}
                                  @endif() 
                                
                              </td>
                              <td align="center">
                                
                                {!!link_to_route('barrioCanton.edit',$title='', $parametro=$c->id,$atributo=['class'=>'fa fa-eye bigicon'])!!}</td>
                                </td>
                                
                                   @endif   
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </section>
                         <div class="row">
                
            </div>
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