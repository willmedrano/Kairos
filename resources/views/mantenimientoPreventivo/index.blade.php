@extends ('index')
@section('content')
<style>
  .mtt {
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
      <span class=""><i class="fa fa-archive bigicon icon_nav" > MANTENIMIENTO PREVENTIVO</i></span>
         <p class="title-description"> Consulta de vehiculos</p>
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

                          <br>
                          <section class="example">
                            <div class="row">
                              @foreach ($vehiculo as $v)
                               <div class="col-xl-4">
                                   <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title">N. Placa:  {{$v->nPlaca}} </p>
                                         </div>
                                     </div>
                                     <div class="card-block">
                                       <img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                    </div>
                                     <div class="card-footer">

                                       @if($v->semaforo==1)
                                         <p class="mtt">Kilometraje de Mantenimiento {{$v->kilometrajeM}} km</p>
                                         <p class="title">Kilometraje Actual {{$v->kilometrajeAux}} km</p>
                                         <td>{!!link_to_route('mantenimientoPre.edit',$title='Realizar Mttn', $parametro=$v->id,$atributo=['class'=>'btn btn-danger btn-sm fa fa-edit'])!!}</td>
                                       @elseif($v->semaforo==2)
                                         <p class="title">Actualmente en mantenimiento</p>
                                         <td>{!!link_to_route('mantenimientoPre.show',$title='Finalizar Mttn', $parametro=$v->id,$atributo=['class'=>'btn btn-primary btn-sm fa fa-edit'])!!}</td>
                                      @endif
                                    </div>
                                 </div>
                               </div>
                             @endforeach
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
