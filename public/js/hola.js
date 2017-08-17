$('#selectMarca').on('change',function(e){
  var modelo=$("#idModelo");
  var marca=$("#selectMarca").find('option:selected');
   var ruta="/Kairos/public/vehiculo2/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
                  
                   			
  			modelo.append("<img src='/Kairos/public/imagenesVehiculos/"+value.nombre_img+"' alt='User Image' width='250px' height='150px' >");
  			modelo.append("<br>");	
  		});
    });
});
