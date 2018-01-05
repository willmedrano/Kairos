$('#idActividad').on('change',function(e){
  var modelo=$("#idUbc");
  var marca=$("#idActividad").find('option:selected');
   var ruta="/Kairos/public/salidaEntrada/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
  			modelo.append("<option value="+value.id+">"+value.nombre+"</option>");
  		});
    });
});

$('#idUb').on('change',function(e){
  var modelo=$("#idUbc2");
  var marca=$("#idUb").find('option:selected');
   var ruta="/Kairos/public/salidaEntrada2/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
  			modelo.append("<option value="+value.id+">"+value.nombre+"</option>");
  		});
    });
});

$('#idCoCa').on('change',function(e){
  var modelo=$("#idCC2");
  var marca=$("#idCoCa").find('option:selected');
   var ruta="/Kairos/public/salidaEntrada2/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
      $(res).each(function(key,value){
        modelo.append("<option value="+value.id+">"+value.nombre+"</option>");
      });
    });
});



