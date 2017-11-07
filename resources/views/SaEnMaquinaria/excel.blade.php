<table  >
                            <thead >
                              <tr >                    
                               <th >N°</th>
                               <th >CONDUCTOR</th>
                               <th >FECHA</th>
                               <th ># DE INVENTARIO</th>
                               <th>ACTIVIDAD</th>
                               <th>DESTINO</th>
                               <th >HORA SALIDA</th>
                                <th >HORA DE ENTRADA</th>
                               <th >HORAS DE TRABAJO</th>
                               
                              
                               <th>OBSERVACIONES SALIDA</th>
                               <th>OBSERVACIONES ENTRADA</th>

                               <th>COMBUSTIBLE</th>
                               <th>ESTADO</th>
                               
                              </tr>
                            </thead>
                            <tbody >
                              @foreach ($cc as $c)
                              
                             
                              <tr>   
                                <td>{{$c->id}}</td>
                                <td>{{$c->nombresMot.' '.$c->apellidosMot}}</td>
                                
                                <?php 
                                  $date = new DateTime($c->fecha); 
                                ?>
                                <td><?php  echo $date->format('d/m/Y'); ?></td>
                                <td>{{ $c->nInventario }}</td>
                                <td>{{ $c->act }}</td>
                                <td>{{ $c->nombre }}</td>

                                <td>{{ $c->horaSalida }}</td>
                                
                                <td>{{$c->horaEntrada}}</td>
                              <td>{{ $c->horasM }}</td>
                                
                                
                                <td>{{$c->observacionS}}</td>
                                <td>{{$c->observacionE}}</td>

                                 @if($c->estadoVale==false)
                                    
                                    <td>
                                          Sin Vale
                                    </td>
                                @endif

                                @if($c->estadoVale==true)
                                      
                                      <td>{{$c->galones}} Galones</td>
                                
                                @endif
                                
                                
                                
                                
                                
                                @if($c->estado==false)
                                    
                                   <td>Sin Completar</td>
                                @endif

                                @if($c->estado==true)
                                      
                                      <td>Completada</td>
                                
                                @endif                                    
                              </tr>
                              @endforeach
                            </tbody>
                          </table>