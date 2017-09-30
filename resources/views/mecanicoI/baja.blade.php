<div id="gridSystemModal2{{$m->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning" bgcolor="blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
        <h4 class="modal-title" id="gridModalLabel3" >DESACTIVAR MECÁNICO</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid bd-example-row">
           {!!Form::model($mecanico,['method'=>'PATCH','route'=>['mecanicoI.update',$m->id]])!!}
              <label for="">¿Seguro que desea cambiar el estado del mecánico ?</label>
              <input type="hidden" name="hi2" value="3">
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
