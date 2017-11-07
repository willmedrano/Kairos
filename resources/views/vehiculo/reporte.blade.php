
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario Vehiculo-Maquinaria</title>
	<style>
body {
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 300;
    font-size: 12px;
    margin: 0;
    padding: 0;
    color: #777777;
  }
table {
    border-collapse: collapse;
    width: 95%;
}


table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: white;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;
  font-weight: normal;
}

th {
    background-color: #4f8ba0;
    color: white;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #FAFBFB;
}
  section .table-wrapper {
    position: relative;
    overflow: hidden;
  }

/*tr:nth-child(even){background-color: #F0FDFF}
*/
table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}
</style>
</head>
<body>
  <div class="col-md-12">
    <div class="box-body">
      <div class="box-header with-border">
        <div style="position: absolute;left: 340px; top: 40px; z-index: 1;"><h1>Alcaldía Municipal de Ilobasco</h1></div>
        <div style="position: absolute;left: 445px; top: 90px; z-index: 1;">CIUDAD CENTENARIA</div>
        <div style="position: absolute;left: 655px; top: 120px; z-index: 1;"><h5>Despacho Alcalde Telefax 2362-6700</h5></div>
        <div style="position: absolute;left: 695px; top: 133px; z-index: 1;"><h5>Gerencia Teléfono 2362-6708</h5></div>
        <div style="position: absolute;left: 150px; top: 133px; z-index: 1;"><h5>Depto. Cabañas, El Salvador, C.A.</h5></div>        
        <HR style="position: absolute;left: 23px; top: 163px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 850px; top: 175px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 840px; top: 190px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>        
        <h3 align="right" style="position: absolute; left:20px; top:10px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/sv.png" ></h3>
        <h3 align="right" style="position: absolute; left:850px; top:10px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div style="position: absolute;left: 230px; top: 200px; z-index: 1;"><h3>Listado General de Vehiculos, Maquinaria y Equipo de Terraceria Municipales</h3></div>
        <div style="position: absolute;left: 365px; top: 215px; z-index: 1;"><h3>Unidad de Transporte y Mantenimiento</h3></div>
      </div><!-- /.box-header -->
      <br>
      <br>
      <br>
      <div class="box-body">
        <div style="position: absolute;left: 230px; top: 250px; z-index: 1;"><h3></h3></div>
        <table class="table-wrapper" >
	         <thead>
            <tr>
              <th >Tipo</th>
              <th >Marca</th>
              <th >Modelo</th>
              <th >Color</th>
              <th >Año</th>
              <th >Nº Placa/Eq</th>
              <th >Nº de Inventario</th>
            </tr>
  	      </thead>
          <tbody>
            @foreach($vehiculo as $v)
		        <tr>
		          <td>{{$v->tipoVM}}</td>
              <td>{{$v->nomMarca}}</td>
		          <td>{{$v->nomModelo}}</td>
		          <td>{{$v->color}}</td>
		          <td>{{$v->anio}}</td>
              <td>{{$v->nPlaca}}</td>
              <td>{{$v->nInventario}}</td>
		        </tr>
          @endforeach
          @foreach($maquinaria as $m)
            <tr>
              <td>{{$m->tipoVM}}</td>
              <td>{{$m->nomMarca}}</td>
              <td>{{$m->nomModelo}}</td>
              <td>{{$m->color}}</td>
              <td>{{$m->anio}}</td>
              <td>{{$m->nEquipo}}</td>
              <td>{{$m->nInventario}}</td>
            </tr>
          @endforeach
      	</tbody>
    	</table>
  	 </div><!-- /.box-body -->
	  </div><!-- /.box -->
  </div>
</body>
</html>
