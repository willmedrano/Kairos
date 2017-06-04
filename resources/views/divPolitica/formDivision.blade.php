@extends('index')
@section('content')
<style type="text/css" >
    


.bigicon {
    font-size: 35px;
    color: #337ab7;
}
legend{
    color: #36A0FF;
}
h2
{
    color: #36A0FF;
}
</style>
 <article class="content forms-page">
                           
           <div class="title-block">
                    <span class=""><i class="fa fa-archive bigicon icon_nav" > Barrios/Caserios</i></span>
                        <h2 >
        
    </h2>
                        <p class="title-description"> Registro de Barrios y Caserios </p>
                    </div>
            <!--<div class="subtitle-block">
                        <h3 class="subtitle">
        Formulario de Producto
    </h3> </div>-->
                    <section class="section">
                        <div class="row sameheight-container">
                            <div >
                                <div class=\ >
                                    

                  


                
<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title">Formulario de Barrios y Caserios</h1>

                             </div>
                             <div align="center">
                             
                             <br>
</div>
                 {!! Form::open(['route'=>'division.store','method'=>'POST','class'=>'form-horizontal']) !!}
                
                    <fieldset>
                        

                        <div class="form-group">
            
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-barcode bigicon icon_nav" ></i></span >
                             <div class="col-xs-3">
                                <select class=" form-control" name="idTipo">
                                    <option  value="1" >Barrio</option> 
                                    <option  value="2" >Barrio</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-book bigicon"></i></span>
                            <div class="col-md-3">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombre del Lugar" required class="form-control">
                                
                            </div>

                            <span class="col-md-1  text-center"><i class="fa fa-dropbox bigicon"></i></span>
                            <div class="col-md-3">
                                <input id="uniCaja" name="uniCaja" type="number" min="1" placeholder="Unidades de una Caja" class="form-control" required pattern="[0-9]{1,3}" max="1000">
                                
                            </div>
                        </div>

                        
<br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-tags bigicon"></i></span>
                            <div class="col-md-3">
                                <input id="marca" required name="marca" type="text" required placeholder="Marca" class="form-control" >
                            </div>

                            <span class="col-md-1  text-center"><i class="fa bigicon" style=" font-weight: bold;">M</i></span>
                            <div class="col-xs-3">
                                <input id="minimo" name="minimo" type="number" placeholder="unidades minimas requeridas" class="form-control" pattern="[0-9]{1,3}" required min="0" max="99999"> 
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa  bigicon" style=" font-weight: bold;">%</i></span>
                            <div class="col-xs-3">
                                <input id="gUni"
                                 name="gUni" type="number" placeholder="porcentaje de ganancia por unidad" pattern="[0-9]{1,3}"  class="form-control" required="" min="0" max="999">
                            </div>

                            <span class="col-md-1  text-center"><i class="fa bigicon" style=" font-weight: bold;">%</i></span>
                            <div class="col-xs-3">
                                <input id="gCaja" name="gCaja" type="text" placeholder="porcentaje de ganancia por Caja" class="form-control" pattern="[0-9]{1,3}"  required >
                            </div>

                        </div>
                      
                        <br>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-7">
                                <textarea rows="2" class="form-control" id="desc" name="desc" placeholder="Agregue la descripcion del producto" rows="7" required=></textarea>
                            </div>
                        </div>
                            <br>
                        <div class="form-group">
                            <div class="col-md-12 text-center" align="center">
                                <button type="submit"  class="btn btn-primary btn-lg">Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
</section> 
</article>

@stop