
         
     <table class="table-wrapper" >
           <thead>
            <tr align="center">                    
                               <th >N°</th>
                               <th >CONDUCTOR</th>
                               <th>ACTIVIDAD</th>
                               <th>LUGAR DONDE CARGA <br> EL CAMIÓN</th>
                               <th>LUGAR DONDE SE <br>DESCAGA EL CAMIÓN</th>
                                <th>NUMERO DE <br> VIAJES</th>
                                <th >HORA DE <br> INICIO</th>
                                 <th >HORA DE <br> FINALIZACIÓN</th>
                                 <th>CONSUMO DIARIO</th>
                               <th >FECHA</th>
                   
                              
                               
                              </tr>
                            </thead>
                            <tbody id="hola" class="buscar">
                              <?php $cont=0;?>
                              
                               @foreach ($cc as $c)
                             	<?php $cont++;?>
                              <tr>   
                                <td><?php echo $cont;?></td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                
                                <?php 
                                  $date = new DateTime($c->fecha); 
                                ?>
                                <td>{{ $c->idActividad }}</td>
                                <td>{{ $c->idCC }}</td>
                                <td>{{ $c->idUbc }}</td>
                                <td>{{ $c->nViajes }}</td>
                                <td>{{ $c->horaSalida }}</td>
                                
                                <td>{{$c->horaEntrada}}</td>
                                <td></td>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                              
                                                                   
                              </tr>
                              @endforeach
                            </tbody>
      </table>
    