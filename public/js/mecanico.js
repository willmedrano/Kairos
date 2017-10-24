$('#idTaller').on('change',function(e){
  var mecanicos=$("#mecanico");
  var taller=$("#idTaller").find('option:selected');
   var ruta="/Kairos/public/busqEquipo/"+taller.val();
    $.get(ruta,function(res){
      mecanicos.empty();
  		$(res).each(function(key,value){
  			mecanicos.append("<option value="+value.id+">"+value.nombresMec+' '+value.apellidosMec+"</option>");
  		});
    });
});