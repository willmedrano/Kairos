<div id="gridSystemModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Excel para las salidas de Maquinaria</h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!! Form::open(['url'=>['excelM'],'method'=>'POST','target'=>'_blank']) !!}
                              
                              {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                              <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>        
                            <br><br><br>                    
                                 
                            {!!Form::label('lbFecha','Fecha Final')!!}                        
                              <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            
                              <br>
                              <br>
                              <div align="center">
                          {!! Form::submit('Generar Excel',['class'=>'btn btn-info']) !!}
                          </div>
          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>