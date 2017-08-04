<div id="gridSystemModal2{{$c->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header alert-warning" bgcolor="blue">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" >
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
        </span>
          <h4 class="modal-title" id="gridModalLabel3" >Finalizar Actividad</h4>

      </div>

      <div class="modal-body">

        <div class="container-fluid bd-example-row">

          {!!Form::model($c,['method'=>'PATCH','route'=>['actividad.update',$c->id]])!!}
          
            ¿Seguro que desea finalizar la actividad?
              <input type="hidden" name="hi" value="{{ $c->estado }}">
              <input type="hidden" name="bandera" value="1">
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