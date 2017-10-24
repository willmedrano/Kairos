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
  @include('alertas.request')
  <div class="title-block">
    <span class=""><i class="fa fa-archive bigicon icon_nav" > Reporte Mttn Preventivo  </i></span>
       <p class="title-description"> Vehiculo / Maquinaria </p>
   </div>
   <section class="section">
       <div class="row sameheight-container">
          <div>
            <div  >
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">Informe General</h4>
                </div>
                <div class="row table-responsive"> <!--Begin Datatables-->
                    <div class="card table-responsive">
                      <div class="card-block table-responsive">

                        {!! Form::open(['url'=>['reporteMP'],'method'=>'POST','target'=>'_blank']) !!}
                          <div class="box-header">                            
                          </div><!-- /.box-header -->
                          <div class="box-body pad">
                              <div class="col-md-3">    
                              {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                              <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>                            
                            <div class="col-md-3">      
                            {!!Form::label('lbFecha','Fecha Final')!!}                        
                              <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                            </div>
                              <br>
                              <br>
                          {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}  </form>
                    </div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </div>
            </section>
            <br>
            <section class="section">
               <div class="row sameheight-container">
                  <div>
                    <div  >
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h4 class="panel-title">Informe por Vehiculo o Maquinaria</h4>
                        </div>
                        <div class="row table-responsive"> <!--Begin Datatables-->
                            <div class="card table-responsive">
                              <div class="card-block table-responsive">

                                {!! Form::open(['url'=>['reporteMPxVM'],'method'=>'POST','target'=>'_blank']) !!}
                                  <div class="box-header">                            
                                  </div><!-- /.box-header -->
                                  <div class="box-body pad">
                                      <div class="col-md-3">    
                                      {!!Form::label('lbFecha','Fecha Inicial')!!}                          
                                      <input id="fechaInicial" name="fechaInicial" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                                    </div>                                    
                                    <div class="col-md-3">      
                                    {!!Form::label('lbFecha','Fecha Final')!!}                        
                                      <input id="fechaFinal" name="fechaFinal" type="date" required="true"class="form-control" value="<?php echo dameFecha(date("Y-m-d"),0);?>" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                                    </div>
                                    <div class="col-md-3">      
                                    {!!Form::label('lvm','Vehiculo-Equipo')!!}                        
                                      <input id="vm" name="vm" type="text" required="true" class="form-control" >
                                    </div>
                                      <br>
                                      <br>
                                  {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}  </form>
                            </div>
                          </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                      </div>
                    </section>
                    <br>
            <section class="section">
               <div class="row sameheight-container">
                  <div>
                    <div  >
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h4 class="panel-title">Informe por Vehiculo o Maquinaria y orden de trabajo</h4>
                        </div>
                        <div class="row table-responsive"> <!--Begin Datatables-->
                            <div class="card table-responsive">
                              <div class="card-block table-responsive">

                                {!! Form::open(['url'=>['reporteMttnPDetalle'],'method'=>'POST','target'=>'_blank']) !!}
                                  <div class="box-header">                            
                                  </div><!-- /.box-header -->
                                  <div class="box-body pad">
                                     
                                    <div class="col-md-3">      
                                    {!!Form::label('lvm','Vehiculo-Equipo')!!}
                                      <input id="vm" name="vm" type="text" required="true" class="form-control" >
                                    </div>
                                    <div class="col-md-3">      
                                    {!!Form::label('lvm','Orden de trabajo')!!}
                                      <input id="orden" name="orden" type="text" required="true" class="form-control" >
                                    </div>
                                      <br>
                                      <br>
                                      <br>
                                      <br>

                                  {!! Form::submit('Generar Informe',['class'=>'btn btn-info']) !!}  </form>
                            </div>
                          </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                      </div>
                    </section>
          </article>
@stop
<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0;   
?>