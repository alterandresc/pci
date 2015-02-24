function drawChartPersonas() {

  params = getFiltersValues();
  params['destino'] = "cantidad_personas";
  
  $.post( "RequestHandler.php",params, function(data1) {
      $("#cantidad_personas").empty();
      $("#cantidad_personas").append(data1.personas);
    },'json');

}
