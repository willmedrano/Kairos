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

  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE COLONIAS/CANTÓN</i></span>
       <p class="title-description"> Consulta de COLONIAS/CANTÓN </p>
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
                               <th ><div align="center">N°</div></th>
                               <th ><div align="center">NOMBRE</div></th>
                               <th ><div align="center">TIPO</div></th>
                               <th ><div align="center">ACCIÓN</div></th>
                               <th ><div align="center">AGREGAR</div></th>
                               <th><div align="center">REGISTROS</div></th>

                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              @include('coloniaCanton.edit')
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombre}}</td>
                                <td>{{$c->tipo}}</td>
                                <td align="center">
                                   

                                         <a href="#"   class="btn btn-info btn-sm" data-id="{{ $c->id }}" data-toggle="modal" data-target="#Edit{{ $c->id }}">Modificar</a>
                                </td>
                                <td align="center">  
                                  @if($c->tipo=="Cantón")
                                   {!!Form::open(['route'=>['coloniaCanton.show',$c->id],'method'=>'GET'])!!}
                                      <input type="submit" name="" value="Caserios"   class="btn btn btn-primary btn-sm active " >
                                                        {!!Form::close()!!}
                                  @endif()
                                  @if($c->tipo=="Colonia")
                                   {!!Form::open(['route'=>['coloniaCanton.show',$c->id],'method'=>'GET'])!!}
                                          <input type="submit" name="" value=" B a r r i o"   class="btn btn-primary btn-sm active " >
                                                        {!!Form::close()!!}
                                  @endif() 
                                
                              </td>
                              <td align="center">
                                
                                {!!link_to_route('coloniaCanton.edit',$title='', $parametro=$c->id,$atributo=['class'=>'fa fa-eye bigicon'])!!}</td>
                                </td>
                                
                                      
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </section>
                         <div class="row">
                {{ $cc->links() }}
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