$('#idAccion').on('change',function(e){
 // var modelo=$("#idModelo");
  //var marca=$("#selectMarca").find('option:selected');
   // var combo=$("#combo").find('option:selected'); // el item selecionado
   valido = document.getElementById('labe');
    //input al que se le agrega valor
   	
    var combo=$('#idAccion').val();
    if(combo==2)
    {
      valido.innerText = "*Cargar ";
    }
    else
    {
    	valido.innerText = "*Descargar ";
    }
})