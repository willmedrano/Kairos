<div id="ModalVehiculo{{$v->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="col-md-2  text-center" style="color: white;" ><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>
          <h4 class="modal-title" id="gridModalLabel3">Información</h4>
      </div>
      <div class="modal-body" >
        <div class="container-fluid bd-example-row">
          <div class="pull-left image">
             <img src="/Kairos/public/imagenesVehiculos/{{$v->nombre_img }}" class="" alt="User Image" width="525px" height="250px">
             <br>
             <table class="table table-bordered table-hover" style="width:100%" >
               <tbody id="" class="">
                 <tr>
                   <td >Tipo:</td>
                   <td align="center">{{$v->tipoVM}}</td>
                 </tr>
                 <tr>
                   <td > Marca:</td>
                   <td align="center">{{$v->nomMarca}}</td>
                 </tr>
                 <tr>
                   <td > Modelo:</td>
                   <td align="center">{{$v->nomModelo}}</td>
                 </tr>
                 <tr>
                   <td > Color:</td>
                   <td align="center">{{$v->color}}</td>
                 </tr>
                 <tr>
                   <td > Año:</td>
                   <td align="center">{{$v->anio}}</td>
                 </tr>
                 <tr>
                   <td > # Placa:</td>
                   <td align="center">{{$v->nPlaca}}</td>
                 </tr>
                 <tr>
                   <td > # Inventario:</td>
                   <td align="center">{{$v->nInventario}}</td>
                 </tr>
                 <tr>
                   <td > Kilometraje Inicial:</td>
                   <td align="center">{{$v->kilometraje}} km</td>
                 </tr>
                 <tr>
                   <td > Kilometraje de mantenimiento:</td>
                   <td align="center">{{$v->kilometrajeM}} km</td>
                 </tr>
                 <tr>
                   <td > Observación:</td>
                   <td align="center">{{$v->ObservacionVeh}} </td>
                 </tr>
               </tbody>
             </table>

           </div>
        </div>
      </div>
    </div>
  </div>
</div>
