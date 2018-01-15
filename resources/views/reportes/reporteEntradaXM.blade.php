
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Reporte Salidas y entradas de Maquinaria </title>
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

              <div style="position: absolute;left: 380px; top: 180px; z-index: 1;" ><h3>Control de Entradas y Salidas de la maquinaria {{"No: ".$v->nEquipo}}</h3>                  
            </div>
            <div  style="position: absolute;left: 480px; top: 200px; z-index: 1;">
              <h4 class="box-title">del <?= $fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0] ?> al <?= $fecha2[2].'-'.$fecha2[1].'-'.$fecha2[0]; ?> </h4>
            </div>
         
        <table class="table-wrapper" >
           <thead>
            <tr align="center">                    
                               <th>No</th>
                               <th >OPERARIO</th>
                               
                               <th>ACTIVIDAD</th>
                               <th>CASERIO DONDE SE <br>INICIA LA ACTIVIDAD</th>
                               <th>CASERIO CON QUE <br>COMUNICA LA CALLE</th>
                               
                               <th >LONGITUD DEL <br>PROYECTO</th>
                               
                               <th >HORA DE <br>INICIO </th>
                                <th >HORA DE <br>FINALIZACIÓN </th>
                                  <th >FECHA</th>                                                          

                              
                               
                               
                              </tr>
                            </thead>
                            <?php $cont=0;?>
                            <tbody id="hola" class="buscar">
                              @foreach ($cc as $c)
                              
                               
                             
                              <tr>   
                                  <td><?php $cont++; echo $cont?></td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                
                                <?php  
                                  $date = new DateTime($c->fecha); 
                                ?>
                                
                                <td>{{ $c->act }}</td>
                                <td>{{ $c->nombre }}, {{$c->idUbc}}</td>
                                <td>{{ $c->idUbc2 }}</td>
                                <td>{{$c->longitud}}</td>
                                <td>{{ $c->horaSalida }}</td>
                                
                                <td>{{$c->horaEntrada}}</td>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                                
                               

                                 
                                
                                
                                
                                                                  
                              </tr>
                              @endforeach
                            </tbody>
      </table>
     </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</body>
</html>
