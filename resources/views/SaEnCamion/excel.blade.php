<table>
                            <thead >
                              <tr >                    
                               <th >N°</th>
                               <th >CONDUCTOR</th>
                               <th >FECHA</th>
                               <th ># PLACA</th>
                               <th>ACTIVIDAD</th>
                               <th>CARGA</th>
                               <th>DESCARGA</th>
                               <th># VIAJES</th>
                               <th >HORA SALIDA</th>
                               <th >KM SALIDA</th>
                               <th >HORA ENTRADA</th>
                               <th >KM ENTRADA</th>
                               <th>OBSERVACIONES SALIDA</th>
                               <th>OBSERVACIONES ENTRADA</th>

                               <th>COMBUSTIBLE</th>
                               <th >ESTADO</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?php $cont=0;?>
                              
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
                                @if($c->tanqueS==1)
                                
                                <td>{{ $c->nombre }}</td>
                                <td>{{ $c->idCC }}</td>
                                @else
                                <td>{{ $c->idCC }}</td>
                                <td>{{ $c->nombre }}</td>
                                @endif
                                
                                <td>{{ $c->nViajes }}</td>
                                <td>{{ $c->horaSalida }}</td>
                                <td>{{ $c->kilometrajeS }}</td>
                                <td>{{$c->horaEntrada}}</td>
                                <td>{{$c->kilometrajeE}}</td>
                                
                                
                                <td>{{$c->observacionS}}</td>
                                <td>{{$c->observacionE}}</td>
                                   <?php $cont++;?>
                                 @if($c->estadoVale==false)
                                    
                                    <td>
                                          Sin Vale
                                    </td>
                                @endif

                                @if($c->estadoVale==true)
                                      
                                      <td>{{$c->galones}} Galones</td>
                                
                                @endif
                                
                                
                                @if($c->estadoC==false)
                                    
                                    <td>
                                          Sin Completar
                                    </td>
                                @endif

                                @if($c->estadoC==true)
                                      
                                      <td>Completada</td>
                                
                                @endif                                    
                              </tr>
                              @endforeach
                            </tbody>
                          </table>