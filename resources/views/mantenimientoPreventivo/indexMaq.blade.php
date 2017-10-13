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
         <p class="title-description"> Consulta de Maquinaria</p>
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
                              @foreach ($maquinaria as $m)
                                @if($m->semaforo!=3)
                               <div class="col-xl-4">
                                   <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title">N. Equipo:  {{$m->nEquipo}} </p>
                                         </div>
                                     </div>
                                     <div class="card-block">
                                       <img src="/Kairos/public/imagenesMaquinaria/{{$m->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                    </div>
                                     <div class="card-footer">

                                       @if($m->semaforo==1)
                                         <p class="mtt">Horas de Mantenimiento cada {{$m->horaM}} Horas</p>
                                         <p class="title">Horas trabajadas {{$m->horaAux}} km</p>
                                         <td>{!!link_to_route('mantenimientoPreMaq.edit',$title='Realizar Mttn', $parametro=$m->id,$atributo=['class'=>'btn btn-danger btn-sm fa fa-edit'])!!}</td>
                                       @elseif($m->semaforo==2)
                                         <p class="title">Actualmente en mantenimiento</p>
                                         <td>{!!link_to_route('mantenimientoPreMaq.show',$title='Finalizar Mttn', $parametro=$m->id,$atributo=['class'=>'btn btn-primary btn-sm fa fa-edit'])!!}</td>
                                       @elseif($m->semaforo==4)
                                           <p class="title">Actualmente en mantenimiento Correctivo</p>
                                      @endif
                                    </div>
                                 </div>
                               </div>
                               @endif
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
