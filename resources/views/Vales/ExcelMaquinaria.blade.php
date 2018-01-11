        
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
                                <th>CONSUMO DIARIO</th>
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
                                <td></td>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                
                                
                               

                                 
                                
                                
                                
                                                                  
                              </tr>
                              @endforeach
                            </tbody>
      </table>
 