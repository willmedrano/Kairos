
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Por Barrio/Canton</title>
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

.bar {
    background: #ffffcc
    
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
        <div style="position: absolute;left: 260px; top: 90px; z-index: 1;">CIUDAD CENTENARIA</div>
        <div style="position: absolute;left: 350px; top: 120px; z-index: 1;"><h5>Despacho Alcalde Telefax 2362-6700</h5></div>
        <div style="position: absolute;left: 385px; top: 133px; z-index: 1;"><h5>Gerencia Teléfono 2362-6708</h5></div>
        <div style="position: absolute;left: 120px; top: 133px; z-index: 1;"><h5>Depto. Cabañas, El Salvador, C.A.</h5></div>
        <HR style="position: absolute;left: 23px; top: 163px; z-index: 1; color:blue;" width=90%>
        <div style="position: absolute;left: 550px; top: 175px; z-index: 1;">Fecha:  <?=  $date; ?> </div>
        <div style="position: absolute;left: 550px; top: 190px; z-index: 1;">Impresión:  <?=  $date1; ?> </div>
        <h3 align="right" style="position: absolute;left:20; top:20px; px; z-index: 1;"><img class="al" width="110px" height="110px" src="img/sv.png" ></h3>
        <h3 align="right" style="position: absolute; left:550px; top:10px; z-index: 1;"><img class="al" width="120px" height="130px" src="img/alcaldia.png" ></h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div style="position: absolute;left: 230px; top: 210px; z-index: 1;"><h3>Listado de {{ $tipo }} </h3></div>
        <table class="table-wrapper" >
            <thead>
            <tr>
              <th >N°</th>
                      
                               <th >NOMBRE</th>
                               
            </tr>
          </thead>
          <tbody>
           
            @foreach($barrio as $b)
                <?php $bandera=true;
                      $cont=1;
                ?>
                @foreach($cc as $c)
              
                  @if($c->idCC==$b->id)
                      @if($bandera)
                          <th class="bar"></th>
                        <th class="bar"  style="color: black;">
                          
                        
                            <b>{{ $tipo }} {{ $b->nombre }}</b>
                        </th>
                        <tr></tr>
                        <?php $bandera=false;?>
                       @endif
                    <tr>
                    <td><?php echo($cont);?></td>
                    <td>{{$c->nombre}}</td>
                    <?php $cont++;?>  
                    </tr>
                   @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
     </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</body>
</html>
