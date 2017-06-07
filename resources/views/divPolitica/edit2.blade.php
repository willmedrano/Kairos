<div id="Edit{{ $c->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Modificar Colonia/Cantón</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!!Form::model($cc,['method'=>'PATCH','route'=>['division.update',$c->id]])!!}
                        <fieldset>
                            <input type="hidden" name="hi2" value="1">
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >Nombre: </label></span>
                                <div class="col-md-6">
                                    {!!Form::text('nombre',$c->nombre,['id'=>'nombre','class'=>'form-control', 'placeholder'=>'Ingrese el nombre...','required'  ])!!}
                                      
                                </div>    
                            </div>            
                            <br>   
                            <div class="form-group">
                                <span class="col-md-2  text-center"><label >Tipo: </label></span>
                                <div class="col-md-6">
                                    <select name="tipo" id="sport" class="validate[required] form-control">
                                        @if($c->tipo=="Colonia")
                                            <option  selected value="Colonia" id="1">Colonia</option>
                                            <option value="Cantón" id="2">Cantón</option>

                                           
                                        @endif
                                        @if($c->tipo=="Cantón")
                                            <option value="Colonia" id="1">Colonia</option>
                                            <option selected value="Cantón" id="2">Cantón</option>
                                            
                                        @endif
                                    </select>
                                </div>
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