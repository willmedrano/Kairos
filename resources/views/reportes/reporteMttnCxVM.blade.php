
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Mttn Correctivo por V/M  </title>
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
       <div style="position: absolute;left: 340px; top: 0px; z-index: 1;"><h1>Alcaldía Municipal de Ilobasco</h1></div>
        <div style="position: absolute;left: 445px; top: 50px; z-index: 1;">CIUDAD CENTENARIA</div>
        <div style="position: absolute;left: 655px; top: 80px; z-index: 1;"><h5>Despacho Alcalde Telefax 2362-6700</h5></div>
        <div style="position: absolute;left: 695px; top: 93px; z-index: 1;"><h5>Gerencia Teléfono 2362-6708</h5></div>
        <div style="position: absolute;left: 150px; top: 93px; z-index: 1;"><h5>Depto. Cabañas, El Salvador, C.A.</h5></div>        
        <hr style="position: absolute;left: 25px; top: 135px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 850px; top: 143px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 840px; top: 158px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>        
        <h3 align="right" style="position: absolute; left:20px; top:0px; z-index: 1;"><img class="al" width="120px" height="125px" src="img/sv.png" ></h3>
        <h3 align="right" style="position: absolute; left:850px; top:0px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">

      <?php $fecha1=explode('-', $fch1);
      $fecha2=explode('-', $fch2);?>

              <div style="position: absolute;left: 350px; top: 180px; z-index: 1;"><h3>Mantenimientos Correctivos Realizados  </h3>                  
            </div>
            <div  style="position: absolute;left: 400px; top: 200px; z-index: 1;">
              <h4 class="box-title">del <?= $fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0] ?> al <?= $fecha2[2].'-'.$fecha2[1].'-'.$fecha2[0]; ?> </h4>
            </div>
         
        <table class="table-wrapper">
	         <thead>
            <tr>               
               <th ><div align="center">N°</div></th>
               <th ><div align="center">N° ORDEN</div></th>
               <th ><div align="center">TALLER</div></th>
               <th ><div align="center">MECANICO</div></th>               
               @if($opc==1)
                <th ><div align="center">Nº PLACA</div></th>
               @else
                 <th ><div align="center">Nº EQUIPO</div></th>
               @endif
               <th ><div align="center">INICIO</div></th>
               <th ><div align="center">FINALIZADO</div></th>   
               <th ><div align="center">GASTO $</div></th>    
            </tr>
  	      </thead>
          <tbody>
            <?php $cont=1; ?>
               @foreach ($matt as $m)
                 <tr>
                   <td align="center">{{$cont++}}</td>
                   <td align="center">{{$m->idOrden}}</td>
                   <td align="center">{{$m->tallerNom($m->idMecanico)}}</td>
                   <td align="center">{{$m->mecanicoNom($m->idMecanico)}}</td>
                   @if($opc==1)
                    <td align="center">{{$m->placa($m->idVehiculo)}}</td>
                   @else
                      <td align="center">{{$m->equipo($m->idMaquinaria)}}</td>
                   @endif
                   <?php
                    $date = new DateTime($m->fechaInicioMtt);
                    $date2 = new DateTime($m->fechaFinMtt);
                  ?>
                   <td align="center"><?php  echo $date->format('d/m/Y'); ?></td>
                   <td align="center"><?php  echo $date2->format('d/m/Y'); ?></td>
                   @if($opc==1)
                    <td align="center">{{$m->gastoMC}}</td>
                  @else
                    <td align="center">{{$m->gastoMC}}</td>
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
