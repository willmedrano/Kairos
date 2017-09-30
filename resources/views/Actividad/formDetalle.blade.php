<div id="detalle{{ $id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
                <h4 class="modal-title" id="gridModalLabel">Asignar detalle a la Actividad</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    {!! Form::open(['route'=>'detalleActividad.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="bandera" value="{{$id }}">
                        <fieldset>
                            
                            <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label > Nombre: </label></span>
                                <div class="col-lg-6">
                      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control', 'placeholder'=>'Ingrese el nombre del progreso','required'])!!}
                    </div>   
                            </div> 
                            <br> <br>
                            <div class="form-group">
                                <span class="col-md-2  text-center"><label >Imagen: </label></span>
                            
                    {!!Form::file('nombre_img',['value'=>'Elija','required'])!!}    
                            </div> 
                            <div class="form-group">
                                <span class="col-md-2  text-center" ><label >Descripción: </label></span>
                                <div class="col-lg-12">
                      {!!Form::textArea('descripcion',null,['id'=>'descripcion','class'=>'form-control', 'placeholder'=>'Ingrese la descripción...','required'])!!}
                    </div>   
                            </div> 
                                       
                            <br>   <br>
                            
                                           
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