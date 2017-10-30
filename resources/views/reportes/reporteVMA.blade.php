
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Vehiculo-Maquinaria Asignados</title>
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
        <div style="position: absolute;left: 350px; top: 40px; z-index: 1;"><h2>Alcaldía Municipal de Ilobasco</h2></div>
        <div style="position: absolute;left: 210px; top: 70px; z-index: 1;"><h3>Listado General de Vehiculos, Maquinaria y Equipo de Terraceria Municipales</h3></div>
        <div style="position: absolute;left: 345px; top: 90px; z-index: 1;"><h3>Unidad de Transporte y Mantenimiento</h3></div>
        <HR style="position: absolute;left: 23px; top: 163px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 850px; top: 175px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 840px; top: 190px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>
        
        <h3 align="right" style="position: absolute; left:20px; top:10px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        <h3 align="right" style="position: absolute; left:850px; top:30px; z-index: 1;"><img class="al" width="120px" height="100px" src="img/UTM.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div style="position: absolute;left: 330px; top: 210px; z-index: 1;"><h3>Vehiculos y Maquinaria actualmente asignados</h3></div>
        <?php $fecha1=explode('-', $fch1);
          $fecha2=explode('-', $fch2);?>

            <div  style="position: absolute;left: 390px; top: 230px; z-index: 1;">
              <h4 class="box-title">del <?= $fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0] ?> al <?= $fecha2[2].'-'.$fecha2[1].'-'.$fecha2[0] ?> </h4>
            </div>
        <table class="table-wrapper" >
	         <thead>
            <tr>
               <th >MOTORISTA </th>
               <th >TIPO</th>
               <th >MODELO</th>
               <th >Nº PLACA / EQ</th>
               <th >F_ASIGNACION</th>
               <th >FINALIZACIÓN</th>
            </tr>
  	      </thead>
          <tbody>
            @foreach ($asignado as $a)
             <?php
               $date = new DateTime($a->fechaInicio);
             ?>
             <tr>
                 <td>{{$a->motorista($a->idMotorista)}}</td>
                 <td>{{$a->nomTipo($a->idVehiculo)}}</td>
                 <td>{{$a->nomModelo($a->idVehiculo)}}</td>
                 <td>{{$a->numPlaca($a->idVehiculo)}}</td>
                 <td><?php  echo $date->format('d/m/Y'); ?></td>
                 @if($a->fechaInicio!=$a->fechaFin || $a->estadoAsignacion==false )
                    <?php
                        $date = new DateTime($a->fechaFin);
                     ?>
                    <td><?php  echo $date->format('d/m/Y'); ?></td>
                  @endif
             </tr>
           @endforeach

           @foreach ($asignadoM as $a)
             <?php
               $date = new DateTime($a->fechaInicio);
             ?>
             <tr>
                 <td>{{$a->motorista($a->idMotorista)}}</td>
                 <td>{{$a->nomTipo($a->idMaquinaria)}}</td>
                 <td>{{$a->nomModelo($a->idMaquinaria)}}</td>
                 <td>{{$a->numEquipo($a->idMaquinaria)}}</td>
                 <td><?php  echo $date->format('d/m/Y'); ?></td>
                 @if($a->fechaInicio!=$a->fechaFin || $a->estadoAsignacionMaq==false )
                    <?php
                   $date = new DateTime($a->fechaFin);
                 ?>
                 <td><?php  echo $date->format('d/m/Y'); ?></td>               
                 @else
                   <td>Pendiente</td>

                   @endif
             </tr>
           @endforeach
      	</tbody>
    	</table>
  	 </div><!-- /.box-body -->
	  </div><!-- /.box -->
  </div>
</body>
</html>
