$('#selectMarca2').on('change',function(e){
  var modelo=$("#idModelo");
  var marca=$("#selectMarca2").find('option:selected');
   var ruta="/Kairos/public/vehiculo3/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
                  
                   			
  			modelo.append("<img src='/Kairos/public/imagenesMaquinaria/"+value.nombre_img+"' alt='User Image' width='250px' height='150px' >");
  			modelo.append("<br>");	
  		});
    });
});
