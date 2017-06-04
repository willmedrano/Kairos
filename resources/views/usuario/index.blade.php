@extends ('index')
@section('content')
  <!--Begin Datatables-->
           <div class="row">
             <div class="col-lg-12">
               <div class="box">
                 <header>
                   <div class="icons">
                     <i class="fa fa-table"></i>
                   </div>
                   <h5>ADMINISTRACIÓN DE USUARIOS</h5>
                 </header>
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
                                 <td>
                               </td>
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

           <!--End Datatables-->
           {!!Html::script('//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js')!!}
           {!!Html::script('//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js')!!}


@stop
