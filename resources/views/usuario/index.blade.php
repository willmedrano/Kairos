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
  @if (Session::has('mensaje'))
<div class="alert alert-success" role="alert" >
<button type="button" class="close" data-dismiss="alert" aria-label="close" name="button"><span aria-hidden="true" >&times;</span></button>
{{Session::get('mensaje')}}
</div>
@endif
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" >ADMINISTRACIÓN DE USUARIOS</i></span>
       <p class="title-description"> Consulta de Usuarios del sistema </p>
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
                            <thead>
                               <tr>
                                 <th><div align="center">USUARIO</div></th>
                                 <th ><div align="center">CORREO</div></th>
                                 <th ><div align="center">ACCIÓN</div></th>
                                 <th ><div align="center">ESTADO</div></th>
                               </tr>
                             </thead>
                             <tbody id="hola" class="buscar">
                               @foreach ($user as $u)
                                 @include('usuario.edit')
                                 @include('usuario.DardeBaja')
                                 @include('usuario.DardeAlta')
                                 <tr>
                                   <td>{{$u->name}}</td>
                                   <td>{{$u->email}}</td>
                                   <td>  <a href="#"   class="btn btn-info btn-sm" data-id="{{ $u->id }}" data-toggle="modal" data-target="#Edit{{ $u->id }}">Modificar</a></td>
                                    @if($u->estadoUsu==true)
                                        <td><button type="submit"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal2{{$u->id}}">A c t i v o</button></td>
                                    @endif
                    .                @if($u->estadoUsu==false)
                                        <td><button type="submit"  class="btn btn-sm gris" data-toggle="modal" data-target="#gridSystemModal3{{$u->id}}">Desactivo</button></td>
                                    @endif
                                 </tr>
                               @endforeach
                             </tbody>
                           </table>
                           {{-- {!! $user->render() !!}                            --}}
                           <div class="text-center">
                             {{-- {{ $user->links()}} --}}
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
