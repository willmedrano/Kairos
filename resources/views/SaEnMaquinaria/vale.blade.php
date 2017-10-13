<div id="gridSystemModal8{{$c->idVale}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Asignar vale de combustible</h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!!Form::model($c,['method'=>'PATCH','route'=>['vale.update',$c->idVale]])!!}
          
            
              <input type="hidden" name="hi" value="{{ $c->estadoVale }}">

              <input type="hidden" name="bandera" value="2">
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">*Número de Vale</label>

                    <div class="col-lg-6">
                      {!!Form::text('nVale',"",['id'=>'nVale','class'=>'validate[required] form-control', 'placeholder'=>'numero del vale','required'])!!}
                    </div>
              </div>
                    <br><br> <br>
                    <div class="form-group">
                            <label class="control-label col-md-4">*tipo de combustible</label>
                            <div class="col-md-6">
                              <select name="tipo" id="" class="validate[required] form-control">
                                <option value="0">Selecione una opción...</option>
                                
                                    <option value="Diesel">DIESEL</option>
                                    
                                    <option value="Gasolina">GASOLINA</option>
                                
                              </select>
                            </div>
                          </div>
                    <br><br> <br>
                    <div class="form-group">
                    <label class="control-label col-md-4">*Cantidad de galones </label>

                    <div class="col-lg-6">
                      {!!Form::text('galones',null,['id'=>'galones','class'=>'validate[required] form-control', 'placeholder'=>'Ingrese la cantidad de galones...','required'])!!}
                    </div>
                    <br><br> <br>
                    </div>
                    <label class="control-label col-md-4">*Precio por galon </label>

                    <div class="col-lg-6">
                      {!!Form::text('PrecioU',null,['id'=>'PrecioU','class'=>'validate[required] form-control', 'placeholder'=>'Ingrese la cantidad de galones...','required'])!!}
                    </div>
                    </div>
                    <br><br><br><br>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>

              </div>

          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div>
</div>