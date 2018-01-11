<div id="gridSystemModal2{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Finalizar Salida</h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!! Form::open(['url'=>['filtroValeM'],'method'=>'POST','target'=>'_blank']) !!}
                              <input type="hidden" name="idV" value="{{ $v->id }}">
                              {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                              <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>        
                            <br><br><br>                    
                                 
                            {!!Form::label('lbFecha','Fecha Final')!!}                        
                              <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            
                              <br>
                              <br>
                          {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}
          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>
<div id="gridSystemModal3{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Reporte de entradas y salidas
          </h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!! Form::open(['url'=>['reporteEntradaM2'],'method'=>'POST','target'=>'_blank']) !!}
                              <input type="hidden" name="idV" value="{{ $v->id }}">
                              {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                              <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>        
                            <br><br><br>                    
                                 
                            {!!Form::label('lbFecha','Fecha Final')!!}                        
                              <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            
                              <br>
                              <br>
                          {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}
          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>


<div id="gridSystemModalExM{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel4" >Excel para Maquinaria
          </h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!! Form::open(['url'=>['reporteEntradaMEx'],'method'=>'POST','target'=>'_blank']) !!}
                              <input type="hidden" name="idV" value="{{ $v->id }}">
                              {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                              <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>        
                            <br><br><br>                    
                                 
                            {!!Form::label('lbFecha','Fecha Final')!!}                        
                              <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            
                              <br>
                              <br>
                          {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}
          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>
