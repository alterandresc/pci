function drawChartProductos() {

  params = getFiltersValues();
  params['destino'] = "cantidad_producto";
  
  $.post( "RequestHandler.php",params, function(data1) {
      $("#cantidad_productos").empty();
      $("#cantidad_productos").append(data1.productos);
    },'json');
  
  params['destino'] = "cantidad_registros";
    $.post( "RequestHandler.php",params, function(data1) {
      $("#chart_div_cantidad").empty();
      $("#chart_div_cantidad").append(data1.registros);
      
      $("#cantidad_indice_fase").empty();
      $("#cantidad_indice_fase").append(data1.registros+" Datos");
      
      $("#cantidad_venta").empty();
      $("#cantidad_venta").append(data1.registros+" Datos");
      
      $("#cantidad_operacion").empty();
      $("#cantidad_operacion").append(data1.registros+" Datos");
      
      $("#cantidad_imagen").empty();
      $("#cantidad_imagen").append(data1.registros+" Datos");
      
      $("#cantidad_ambiente").empty();
      $("#cantidad_ambiente").append(data1.registros+" Datos");
      
      $("#acumulado_reloj_1").empty();
      $("#acumulado_reloj_1").append(data1.registros+" Datos");
      
    },'json');
    
  params['destino'] = "cantidad_registros_ultimo";
    $.post( "RequestHandler.php",params, function(data1) {
      $("#ultimo_mes").empty();
      $("#ultimo_mes").append(data1.registros+ " Datos");
      
    },'json');

}
