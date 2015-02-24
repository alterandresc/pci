	
$( document ).ready(function() {
  //favor mantener buena identación en el código
  //esto es lo primero que se ejecuta conado el html carga completamente, 
  //aca deben ir los llamados a las peticiones para dibujar las   gráficas
  // por ejemplo acá voy a llamar el post que revisa la cantidad de encuestas y las carga 

  $( ".priority-value" ).change(function() {
    cargarSiguienteFiltro($(this));
    drawGraphs();
  });

  $( ".periods" ).change(function() {
    drawGraphs();
  });

  iniciarFiltrosPais();

});

function iniciarFiltrosPais()
{
      params = {"destino":"filtros", "filtros_por":"pais_ini"};
     // alert($('#type_name').val());
      $.post( "RequestHandler.php",params, function(data) {
        
        llenarFiltroSimple(data.paises, "#select-pais");
        
                  },'json');
}

function cargarSiguienteFiltro(filtro_padre)
{
        if(filtro_padre.attr('id') == "select-pais")
        {
            actualizarFiltrosPorRegion(filtro_padre.val()); 
        }
        if(filtro_padre.attr('id') == "select-region")
        {
            actualizarFiltrosPorZona(filtro_padre.val()); 
        }
        if(filtro_padre.attr('id') == "select-zona")
        {
            actualizarFiltrosPorCiudad(filtro_padre.val()); 
        }
        if(filtro_padre.attr('id') == "select-ciudad")
        {
            actualizarFiltrosPorPDV(filtro_padre.val()); 
        }
}

function actualizarFiltrosPorRegion(valor)
{
      
      params = {"destino":"filtros", "filtros_por": 'pais', "valor": valor, "obtener":'regional', "retornar": 'regionales'};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.regionales, "#select-region");
                  },'json');
}

function actualizarFiltrosPorZona(valor)
{
      
      params = {"destino":"filtros", "filtros_por": 'regional', "valor": valor, "obtener":'zona', "retornar": 'zonas'};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.zonas, "#select-zona");
                  },'json');
}

function actualizarFiltrosPorCiudad(valor)
{
      
      params = {"destino":"filtros", "filtros_por": 'zona', "valor": valor, "obtener":'ciudad', "retornar": 'ciudades'};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.ciudades, "#select-ciudad");
                  },'json');
}

function actualizarFiltrosPorPDV(valor)
{
      
      params = {"destino":"filtros", "filtros_por": 'ciudad', "valor": valor, "obtener":'c_costo_nombre', "retornar": 'pdvs', "llave": 'c_costo_id'};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroPDVS(data.pdvs, "#select-ciudad");
                  },'json');
}

function llenarFiltroSimple(elementos, id_filtro)
{
  $(id_filtro).empty();
  $(id_filtro).append('<option value="todo">Todas</option>');
        elementos.forEach(function(entry) {
        $(id_filtro).append('<option value="'+ entry +'">'+entry+'</option>');
        });
}

function llenarFiltroPDVS(elementos)
{
  $("#select-PDV").empty();
  $("#select-PDV").append('<option value="todo">Todas</option>');
        elementos.forEach(function(entry) {
        $("#select-PDV").append('<option value="'+ entry.c_costo_id +'">'+entry.c_costo_nombre+'</option>');
        });
}

function hacerPeticion()
{  

  //un post es como si con javascritp uno visitara una página web y todo el contenido de esa pagina web
  //queda guardado en una variable en este caso "datosRecibidosDelPost" 
  //esto esta configurado para que la respuesta llegue como un array en json así que se lee facil
  //
  params = {"destino":"total_preguntas"} ;

  // la posición destino define que es lo que se está preguntando en este caso el total de las preguntas 

  $.post( "RequestHandler.php",params, function(datosRecibidosDelPost) {

        //esta es la funcion que se ejecuta cuando el post acaba
        $('#contenedor_de_total_respuestas').empty(); //con esto limpiamos el div con contenedor_de_total_respuestas
        // la función append le mete cosas a un div u otros elementos html en este caso le estamos metiendo 
        //el valor que retornó el post,  ver el archivo aplications/visor/TotalEncuestas.class.php
        //en esa clase el return es un array que en la posición  'total_encuestas' trae el total de las encuestas 
        //así que como ya tenemos ese array acá lo leemos en la posicion 'total_encuestas' y se lo metemos al div
        //#contenedor_de_total_respuestas 
        $('#contenedor_de_total_respuestas').append(datosRecibidosDelPost['total_encuestas']); //c
		  },'json');

}


