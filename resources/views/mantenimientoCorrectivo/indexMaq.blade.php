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
      <span class=""><i class="fa fa-archive bigicon icon_nav" > MANTENIMIENTO CORRECTIVO</i></span>
         <p class="title-description"> Consulta de maquinarias que estan en mantenimiento correctivo</p>
     </div>
     <section class="section">

         <div class="row sameheight-container">
            <div>
              <div>
                <div class="panel panel-primary">
                  <fieldset>
                    {!! Form::open(['url'=>['busqEquipo'],'method'=>'POST']) !!}
                    <div class="form-group">
                      <div class="col-xl-2" >
                        {!!Form::text('equipo',null,['id'=>'equipo','class'=>'form-control', 'placeholder'=>'Numero de Equipo...','required'])!!}
                        </div>
                      {!! Form::submit('Enviar',['class'=>'btn btn-pill-right btn-primary glyphicon glyphicon-floppy-disk '  ]) !!}
                   </div>
                    {!! Form::close() !!}
                    <div class="row table-responsive"> <!--Begin Datatables-->
                      <div class="card table-responsive">
                        <div class="card-block table-responsive">

                          <br>
                          <section class="example">
                            <div class="row">
                              @foreach ($maquinaria as $mq)
                                {{--semaforo = 3 en mision  --}}
                                @if($mq->semaforo!=3)
                               <div class="col-xl-4">
                                   <div class="card card-primary" align="center">
                                     <div class="card-header" >
                                         <div class="header-block" align="center">
                                           <p class="title">N. Equipo:  {{$mq->nEquipo}} </p>
                                         </div>
                                     </div>
                                     <div class="card-block">
                                       <img src="/Kairos/public/imagenesMaquinaria/{{$mq->nombre_img }}" class="" alt="User Image" width="250px" height="150px">
                                    </div>
                                     <div class="card-footer">
                                       {{--semaforo = 4 mttn correctivo  --}}
                                       @if($mq->semaforo==4)
                                         <p class="title">Actualmente en mantenimiento</p>
                                         <td>{!!link_to_route('mantenimientoCorMaq.show',$title='Finalizar Mttn', $parametro=$mq->id,$atributo=['class'=>'btn btn-primary btn-sm fa fa-edit'])!!}</td>
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
