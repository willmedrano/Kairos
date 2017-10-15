<div id="Edit{{ $c->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Actividad</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($cc,['method'=>'PATCH','enctype'=>'multipart/form-data','route'=>['actividad.update',$c->id]])!!}
                    <input type="hidden" name="bandera" value="2">
                        <fieldset>
                            
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >Actividad: </label></span>
                                <div class="col-md-6">
                                    {!!Form::text('act',$c->act,['id'=>'act','class'=>'form-control', 'placeholder'=>'Ingrese la Actividad','required'  ])!!}
                                      
                                </div>    
                            </div> 
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >Descripción: </label></span>
                                <div class="col-md-6">
                                    {!!Form::text('desc',$c->desc,['id'=>'desc','class'=>'form-control', 'placeholder'=>'Ingrese la Descripción...','required'  ])!!}
                                      
                                </div>    
                            </div> 
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center"><label >Tipo: </label></span>
                                <div class="col-md-6">
                                    <select name="tipoActividad" id="tipoActividad" class="validate[required] form-control">
                                        @if($c->tipoActividad=="1")
                                            
                                             <option selected value="1">Actividad Terraceria</option>
                                        <option value="2">Actividad Agricola</option>
                                         <option value="3">Misión fuera del municipio</option>
                      

                                           
                                        @endif
                                        @if($c->tipoActividad=="2")
                                              <option  value="1">Actividad Terraceria</option>
                                        <option selected value="2">Actividad Agricola</option>
                                         <option value="3">Misión fuera del municipio</option>
                                            
                                        @endif
                                        @if($c->tipoActividad=="3")
                                              <option  value="1">Actividad Terraceria</option>
                                        <option value="2">Actividad Agricola</option>
                                         <option  selected value="3">Misión fuera del municipio</option>
                                            
                                        @endif
                                    </select>
                                </div>
                            </div> 
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >F/Inicio: </label></span>
                                <div class="col-md-6">
                                <input id="fechaInicial" name="fechaInicial" type="date" class="form-control" value="{{$c->fechaInicial  }}" max="<?php echo dameFecha(date("Y-m-d"),0);?>" >
                                </div>   
                            </div>
                                       
                            <br>   <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center"><label >Imagen: </label></span>
                            
                    {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}    
                            </div> 
                                           
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    {!!Form::close()!!}     
                </div>
            </div>
        </div>
    </div>
</div>