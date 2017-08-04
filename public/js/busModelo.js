$('#selectMarca').on('change',function(e){
  var modelo=$("#idModelo");
  var marca=$("#selectMarca").find('option:selected');
   var ruta="/Kairos/public/vehiculo/create/"+marca.val();
    $.get(ruta,function(res){
      modelo.empty();
  		$(res).each(function(key,value){
  			modelo.append("<option value="+value.id+">"+value.nomModelo+"</option>");
  		});
    });
});
