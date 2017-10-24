
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Vehiculo-Maquinaria </title>
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
        <div style="position: absolute;left: 210px; top: 40px; z-index: 1;"><h2>Alcaldía Municipal de Ilobasco</h2></div>
        <div style="position: absolute;left: 50px; top: 80px; z-index: 1;"><h3>Unidad de Transporte, Recolección  de Desechos Solidos y Mantenimiento</h3></div>
        <HR style="position: absolute;left: 23px; top: 163px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 550px; top: 175px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 550px; top: 190px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>
        <div style="position: absolute;left: 50px; top: 180px; z-index: 1;"><h4>Orden de trabajo:  
        @foreach ($matt as $m)
          {{$m->numTrabajo}}
          @endforeach
          </h4> </div>
        <div style="position: absolute;left: 240px; top: 180px; z-index: 1;"><h4>Nº Placa / Eq:  
          @foreach ($matt as $m)
          
          @if($opc==1)
            {{$m->placa($m->idVehiculo)}}
           @else
              {{$m->equipo($m->idMaquinaria)}}
           @endif
        @endforeach

        </h4> </div>
        <div style="position: absolute;left: 400px; top: 180px; z-index: 1;"><h4>Gasto Total $  
        @foreach ($matt as $m)
        @if($opc==1)
          {{$m->gastoMP}}
          @else
          {{$m->gastoMPM}}
          @endif
          @endforeach
          </h4> </div>

        <h3 align="right" style="position: absolute; left:550px; top:10px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->

      <div class="box-body">
      <table class="table-wrapper" border="0" width="100px" >
           <thead>
            <tr>               
               <th colspan="5" ><div align="left">Observaciones o Falla/s reportadas</div></th> 
            </tr>
          </thead>
               @foreach ($matt as $m)
                 <tr >
                   <td colspan="5" height="250px"><div align="left">{{$m->observacionInicioMtt}}</div></td>                   
                 </tr>
               <tr>               
                <th colspan="5" ><div align="left">Diagnostico de mecanico / Reparación realizada</div></th> 
              </tr>
                 <tr >
                   <td colspan="5" height="250px"><div align="left">{{$m->observacionFinalMtt}}</div></td>                   
                 </tr>
               <tr >
                   <th colspan="5" ><div align="left">Mecanico que recibe: {{$m->mecanicoNom($m->idMecanico)}}</div></th>                   
                 </tr>
                 @endforeach
        </tbody>
      </table>
    
  	 </div><!-- /.box-body -->
	  </div><!-- /.box -->
  </div>
</body>
</html>
