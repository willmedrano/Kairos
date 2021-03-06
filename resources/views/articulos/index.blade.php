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
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE ARTICULOS</i></span>
       <p class="title-description"> articulos disponibles </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div>
              <div class="panel panel-primary">
                <fieldset>
                  <!--Begin Datatables-->
                  <a href="/Kairos/public/articulos/create" class="btn btn-success btn-sm fa fa-plus  "> NUEVO</a>
                  <br>
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
                            <thead>
                               <tr>
                                 <th ><div align="center">N°</div></th>
                                 <th ><div align="center">ARTICULO</div></th>
                                 <th ><div align="center">CANTIDAD</div></th>
                                 <th ><div align="center">DESCRPCIÓN</div></th>
                                 <th ><div align="center">ACCIÓN</div></th>
                               </tr>
                             </thead>
                             <tbody id="hola" class="buscar">
                               <?php $cont=1; ?>
                               @foreach ($articulos as $a)
                                 @include('articulos.edit')
                                 <tr>
                                   <td align="center">{{$cont++}}</td>
                                   <td align="center">{{$a->articulo}}</td>
                                   <td align="center">{{$a->cantidad}}</td>
                                   <td align="center">{{$a->descripcion}}</td>
                                   <td align="center">  <a href="#"   class="btn btn-info btn-sm" data-id="{{ $a->id }}" data-toggle="modal" data-target="#Edit{{ $a->id }}">Modificar</a></td>

                                 <td align="center">
                                  </td>
                                 </tr>
                               @endforeach
                             </tbody>
                           </table>
                           <div class="text-center">
                           </div>
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
