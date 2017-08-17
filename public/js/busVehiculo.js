$('#selectMarca').on('change',function(e){
  var modelo=$("#idModelo");
  var marca=$("#selectMarca2").find('option:selected');
   var ruta="/Kairos/public/salidaEntrada/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
  			modelo.append("<option value="+value.id+">"+value.id+"</option>");
  		});
    });
});
