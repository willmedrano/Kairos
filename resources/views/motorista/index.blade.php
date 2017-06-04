@extends ('index')
@section('content')
  <!--Begin Datatables-->
           <div class="row">
             <div class="col-lg-12">
               <div class="box">
                 <header>
                    {!!Html::style('//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css')!!}

                   <div class="icons">
                     <i class="fa fa-table"></i>
                   </div>
                   <h5>ADMINISTRACIÓN DE MOTORISTA/OPERARIO</h5>
                 </header>
                 <div id="collapse4" class="body">
                   <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                     <thead>
                       <tr>
                         <th >FOTO</th>
                         <th >NOMBRE</th>
                         <th >DIRECCIÓN</th>
                         <th >TELÉFONO</th>
                         <th >ACCIÓN</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($motorista as $m)
                         <tr>
                         <td>
                           <div class="pull-left image">
                 						<img src="/imagenesMotoristas/{{$m->nombre_img }}" class="img-circle" alt="User Image" width="40px" height="40px">
                 					</div>
                         </td>
                         <td>{{$m->nombresMot.' '.$m->apellidosMot}}</td>
                         <td>{{$m->direccionMot}}</td>
                         <td>{{$m->telefonoMot}}</td>
                         <td>
                           <div align="center">
                             <table>
                               <tr>
                                 <td>{!!link_to_route('motorista.edit',$title='Editar', $parametro=$m->id,$atributo=['class'=>'btn btn-primary'])!!}</td>
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
