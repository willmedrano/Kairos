
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Mttn Correctivo Detalle </title>
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

        <table class="" style="position: absolute;left:0; top:170px; px; z-index: 1;" >
          <thead>
             <tr>
               <th ><div align="center">Nº Orden</div></th>
               @foreach ($matt as $m)  
                 @if($opc==1)
                 <th ><div align="center">Nº Placa</div></th>
                 @else
                   <th ><div align="center">Nº Equipo</div></th>                                         
                 @endif
               @endforeach
               <th ><div align="center">Fecha de inicio</div></th>
               <th ><div align="center">Taller</div></th>
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
               <td align="center">{{$m->tallerNom($m->idMecanico)}}</td>
               <td align="center">{{$m->mecanicoNom($m->idMecanico)}}</td>
               <td align="center">{{$m->gastoMC}}</td>
             @endforeach
           </tr>
         </tbody>
       </table>
        </div>

    
      </div><!-- /.box-header -->

      <div class="box-body">
      <table style="position: absolute;left:0; top:240px; px; z-index: 1;" border="1" >
           <thead>
            <tr>               
               <th colspan="2" ><div align="left">Observaciones o Falla/s reportadas</div></th> 
            </tr>
          </thead>
               @foreach ($matt as $m)
                 <tr>
                  @if($opc==1) 
                    <td colspan="2" height="230px"><div align="left">
                  <?php
                 $datos=$m->fallasVeh;
                 $data;                
                 
                 $data = explode("\n", $datos);
                 // DD($data);
                 ?>

                 @foreach($data as $d)
                 {{ $d }} 
                 @endforeach</div></td> 
                   @else
                   <td colspan="2" height="230px"><div align="left">
                  <?php
                 $datos=$m->fallasMaq;
                 $data;                
                 
                 $data = explode("\n", $datos);
                 // DD($data);
                 ?>

                 @foreach($data as $d)
                 {{ $d }} <br>
                 @endforeach</div></td> 
                   @endif
                                    
                 </tr>
               <tr>               
                <th colspan="2" ><div align="left">Diagnostico de mecanico / Reparación realizada</div></th> 
              </tr>
                 <tr >
                   <td colspan="2" height="230px"><div align="left">
                   <?php
                 $datos=$m->diagnosticoMec;
                 $data;                
                 
                 $data = explode("\n", $datos);
                 // DD($data);
                 ?>

                 @foreach($data as $d)
                 {{ $d }} <br>
                 @endforeach</div></td>     
                 </tr>
               
                 @endforeach
    
  	 <tr>
                   <td>Nombre/ firma de quien reporta
                    <br><br>
                    <div align="left">
                    @if($opc==1) 
                   {{$matt[0]->idMotorista}}
                   @else
                    {{$matt[0]->MotoristaNom($matt[0]->idMotorista)."    "}}
                    @endif
                           <b>Firma: ______________________</b> 
                    </div>

                   </td>

                   
                   <td>Firma de mecanico que recibe <br><br>
                   ___________________</td>
                  
                 </tr>
                 <tr><th colspan="2"></th></tr>                 
        </tbody>
      </table>
      <div style="position: absolute;left:10; top:900px; px; z-index: 1; ">F. Autorizo reparación
        <br>
        <br>
        <br>
      Sello</div>
      <HR style="position: absolute;left: 140px; top: 903px; z-index: 1; color:black;" width=20%>
    <div style="position: absolute;left:265; top:900px; px; z-index: 1; ">F. Mecanico que entrego</div>
      <HR style="position: absolute;left: 490px; top: 903px; z-index: 1; color:black;" width=20%>
     </div><!-- /.box-body -->
	  </div><!-- /.box -->
  </div>
</body>
</html>
