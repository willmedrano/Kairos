<table >
                            <thead>
                              <tr>                    
                               <th >N°</th>
                               <th >CONDUCTOR</th>
                               <th >FECHA</th>
                               <th ># PLACA</th>
                               <th>ACTIVIDAD</th>
                               <th>DESTINO</th>
                               <th >HORA SALIDA</th>
                               <th >KM SALIDA</th>
                               <th >HORA ENTRADA</th>
                               <th >KM ENTRADA</th>
                               <th>OBSERVACIONES SALIDA</th>
                               <th>OBSERVACIONES ENTRADA</th>

                               <th>COMBUSTIBLE</th>
                               <th>Estado</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($cc as $c)
                              
                             
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                
                                <?php 
                                  $date = new DateTime($c->fecha); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                <td>{{ $c->nPlaca }}</td>
                                <td>{{ $c->act }}</td>
                                <td>{{ $c->nombre }}</td>

                                <td>{{ $c->horaSalida }}</td>
                                <td>{{ $c->kilometrajeS }}</td>
                                <td>{{$c->horaEntrada}}</td>
                                <td>{{$c->kilometrajeE}}</td>
                                
                                
                                <td>{{$c->observacionS}}</td>
                                <td>{{$c->observacionE}}</td>

                                 @if($c->estadoVale==false)
                                    
                                    <td>sin vale</td>
                                @endif

                                @if($c->estadoVale==true)
                                      
                                      <td>{{$c->galones}} Galones</td>
                                
                                @endif
                                
                                
                                
                                
                                
                                @if($c->estado==false)
                                    
                                   <td> Sin completar</td>
                                @endif

                                @if($c->estado==true)
                                      
                                      <td>Completada</td>
                                
                                @endif                                    
                              </tr>
                              @endforeach
                            </tbody>
                          </table>