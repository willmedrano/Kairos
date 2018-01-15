
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Mttn Preventivo Detalle </title>
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
 
}
</style>
</head>
<body>
  <div class="col-md-12">
    <div class="box-body">
      <div class="box-header with-border">
         <div style="position: absolute;left: 220px; top: 0px; z-index: 1;"><h2>Alcaldía Municipal de Ilobasco</h2></div>
        <div style="position: absolute;left: 280px; top: 50px; z-index: 1;">CIUDAD CENTENARIA</div>
        <div style="position: absolute;left: 350px; top: 80px; z-index: 1;"><h5>Despacho Alcalde Telefax 2362-6700</h5></div>
        <div style="position: absolute;left: 385px; top: 93px; z-index: 1;"><h5>Gerencia Teléfono 2362-6708</h5></div>
        <div style="position: absolute;left: 123px; top: 93px; z-index: 1;"><h5>Depto. Cabañas, El Salvador, C.A.</h5></div>
        <HR style="position: absolute;left: 23px; top: 130px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 550px; top: 138px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 550px; top: 153px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>
        <h3 align="right" style="position: absolute;left:20; top:0px; px; z-index: 1;"><img class="al" width="110px" height="110px" src="img/sv.png" ></h3>
        <h3 align="right" style="position: absolute; left:550px; top:0px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        
        <table class="" style="position: absolute;left:0; top:200px; px; z-index: 1;" >
          <thead>
             <tr>
               <th ><div align="center">Orden de trabajo</div></th>
               @foreach ($matt as $m)  
                 @if($opc==1)
                 <th ><div align="center">Nº Placa</div></th>
                 @else
                   <th ><div align="center">Nº Equipo</div></th>                                         
                 @endif
               @endforeach
               <th ><div align="center">Fecha de inicio</div></th>
               <th ><div align="center">Mecanico</div></th>
               <th ><div align="center">Gasto Total $</div></th>
             </tr>
           </thead>
           <tbody >
             <tr>
              @foreach ($matt as $m)        
               <td align="center">{{$m->idOrden}}</td>                                          
                @if($opc==1)
                <td align="center">{{$m->placa($m->idVehiculo)}}</td>
                  
                 @else
                 <td align="center">{{$m->equipo($m->idMaquinaria)}}</td>                                         
               @endif     
                <?php
                $date = new DateTime($m->fechaInicioMtt);
              ?>
               <td align="center"><?php  echo $date->format('d/m/Y'); ?></td>
               <td align="center">{{$m->mecanicoNom($m->idMecanico)}}</td>
               @if($opc==1)
               <td align="center">{{$m->gastoMP}}</td>

              @else
              <td align="center">{{$m->gastoMPM}}</td>
              
              @endif
             @endforeach
           </tr>
         </tbody>
       </table>
      </div><!-- /.box-header -->

      <div class="box-body">
      <table style="position: absolute;left:0; top:280px; px; z-index: 1; " border="1" >
           <thead>
            <tr>               
               <th colspan="2" ><div align="left">Observaciones o Falla/s reportadas</div></th> 
            </tr>
          </thead>
               @foreach ($matt as $m)
                 <tr>
                    <td colspan="2" height="230px"><div align="left">
                  <?php
                 $datos=$m->observacionInicioMtt;
                 $data;                
                 
                 $data = explode("\n", $datos);
                 // DD($data);
                 ?>

                 @foreach($data as $d)
                 {{ $d }} <br>
                 @endforeach</div></td>                    
                                    
                 </tr>
               <tr>               
                <th colspan="2" ><div align="left">Diagnostico de mecanico / Reparación realizada</div></th> 
              </tr>
                 <tr >
                   <td colspan="2" height="230px"><div align="left">
                   <?php
                 $datos=$m->observacionFinalMtt;
                 $data;                
                 
                 $data = explode("\n", $datos);
                 // DD($data);
                 ?>

                 @foreach($data as $d)
                 {{ $d }} <br>
                 @endforeach</div></td>     
                 </tr>
               
                 @endforeach
                 <tr><th colspan="2"></th></tr>                 
        </tbody>
      </table>
      <div style="position: absolute;left:0; top:950px; px; z-index: 1; ">F. Autorizo reparación</div>
      <HR style="position: absolute;left: 130px; top: 953px; z-index: 1; color:black;" width=20%>
    <div style="position: absolute;left:300; top:950px; px; z-index: 1; ">F. Mecanico</div>
      <HR style="position: absolute;left: 490px; top: 953px; z-index: 1; color:black;" width=20%>
     </div><!-- /.box-body -->
       
	  </div><!-- /.box -->
  </div>
</body>
</html>
