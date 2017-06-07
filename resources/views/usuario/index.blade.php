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
</style>
<article class="content forms-page">
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
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="box">
                        <div id="collapse4" class="body">
                          <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                               <tr>
                                 <th >USUARIO</th>
                                 <th >CORREO</th>
                                 <th >ACCIÓN</th>
                               </tr>
                             </thead>
                             <tbody>
                               @foreach ($user as $u)
                                 <tr>
                                   <td>{{$u->name}}</td>
                                   <td>{{$u->email}}</td>
                                   <td>
                                     <div align="center">
                                       <table>
                                         <tr>
                                           <td>{!!link_to_route('usuario.edit',$title='Editar', $parametro=$u->id,$atributo=['class'=>'btn btn-primary'])!!}</td>
                                           <td></td>
                                         </tr>
                                       </table>
                                     </div><!-- fin tabla que centra los botones-->
                                   </td>
                                 </tr>
                               @endforeach
                             </tbody>
                           </table>
                         </div>
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
