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
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE COLONIA/CASERIO</i></span>
       <p class="title-description"> Consulta de Colonia/Caserio </p>
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
                               
                               <th >ACCIÓN</th>
                               <th >Imagen</th>
                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              @include('ColoniaCaserio.imagen')
                              @include('ColoniaCaserio.edit')
                              <tr>   
                                <td>{{$c->id}}</td>
                                
                                <td>{{$c->nombre}}</td>
                                
                                <td>
                                  <a href="#"   class="btn btn-info btn-sm" data-id="{{ $c->id }}" data-toggle="modal" data-target="#Edit{{ $c->id }}">Modificar</a>
                                </td>
                                <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal3{{$c->id}}">VER</button> </td>                                 
                              </tr>
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