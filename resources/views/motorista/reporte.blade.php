
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte Por Motoristas</title>
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
    background-color: #00bf;
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
        <div style="position: absolute;left: 160px; top: 40px; z-index: 1;"><h1>Alcaldía Municipal de Ilobasco</h1></div>
        <div style="position: absolute;left: 200px; top: 90px; z-index: 1;">UNIDAD DE TRANSPORTE Y MANTENIMIENTO</div>
        
        <HR style="position: absolute;left: 23px; top: 163px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 550px; top: 175px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 550px; top: 190px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>
        <h3 align="right" style="position: absolute;left:20; top:20px; px; z-index: 1;"><img class="al" width="110px" height="110px" src="img/alcaldia.png" ></h3>
        <h3 align="right" style="position: absolute; left:550px; top:30px; z-index: 1;"><img class="al" width="120px" height="100px" src="img/UTM.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div style="position: absolute;left: 230px; top: 210px; z-index: 1;"><h3>LISTADO DE MOTORISTA/OPERARIO</h3></div>
        <table class="table-wrapper" >
	         <thead>
            <tr>
              <th >Nombre</th>
              <th >Apellido</th>
              <th >Teléfono</th>
              <th >Tipo</th>
            </tr>
  	      </thead>
          <tbody>
            @foreach($motoristas as $motorista)
		        <tr>
		          <td>{{$motorista->nombresMot}}</td>
		          <td>{{$motorista->apellidosMot}}</td>
		          <td>{{$motorista->telefonoMot}}</td>
		          <td>{{$motorista->tipoMot}}</td>
		        </tr>
          @endforeach
      	</tbody>
    	</table>
  	 </div><!-- /.box-body -->
	  </div><!-- /.box -->
  </div>
</body>
</html>
