	
$( document ).ready(function() {
  //favor mantener buena identación en el código
  //esto es lo primero que se ejecuta conado el html carga completamente, 
  //aca deben ir los llamados a las peticiones para dibujar las   gráficas
  // por ejemplo acá voy a llamar el post que revisa la cantidad de encuestas y las carga 

//   $( ".priority-value" ).change(function() {
//       cargarSiguienteFiltro($(this));
//       loadMap();
//       hacerPeticion();
//     });
// 
//   $( ".periods" ).change(function() {
//     loadMap();
//     hacerPeticion();
//   });
// 
// 
  loadMap();
//   iniciarFiltrosRegion();
});

function iniciarFiltrosRegion()
{
      params = {"destino":"filtros", "filtros_por":"region"};

      $.post( "RequestHandler.php",params, function(data) {

        if($('#type_name').val() == "region")
        {
            //alert("hay que hacer correcciones ");
            var regiones = [$('#valor').val()];
            llenarFiltroSimpleNo(regiones, "#select-regional"); 
        }

        if($('#type_name').val() == "ciudad")
        {
            //alert("hay que hacer correcciones ciudad ");
            var ciudades = [$('#valor').val()];
            llenarFiltroSimpleNo(ciudades, "#select-ciudad"); 
        }
        else
        {
          llenarFiltroSimple(data.regiones, "#select-regional");
        }  
        
		  },'json');
}

function cargarSiguienteFiltro(filtro_padre)
{
	if(filtro_padre.attr('id') == "select-regional")
	{
		actualizarFiltrosPorCiudad(filtro_padre.val());
    actualizarFiltrosPorRestaurante(filtro_padre.val(), 'regional');
    actualizarFiltrosPorJefe(filtro_padre.val(), 'regional')    
	}
	if(filtro_padre.attr('id') == "select-ciudad")
	{
		actualizarFiltrosPorTipo(filtro_padre.val());
    actualizarFiltrosPorRestaurante(filtro_padre.val(), 'ciudad');
    actualizarFiltrosPorJefe(filtro_padre.val(), 'ciudad')   
	}
	if(filtro_padre.attr('id') == "select-tipo")
	{
		actualizarFiltrosPorTipoRestaurante(filtro_padre.val());
    actualizarFiltrosPorRestaurante(filtro_padre.val(), 'tipo');
    actualizarFiltrosPorJefe(filtro_padre.val(), 'tipo')   
	}
	if(filtro_padre.attr('id') == "select-tiporestaurante")
	{
    actualizarFiltrosPorRestaurante(filtro_padre.val(), 'tipo_restaurante');
    actualizarFiltrosPorJefe(filtro_padre.val(), 'tipo_restaurante')   
	}
}

function actualizarFiltrosPorCiudad(valor)
{
      
      params = {"destino":"filtros", "filtros_por": 'regional', "valor": valor, "obtener":'ciudad', "retornar": 'ciudades'};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.ciudades, "#select-ciudad");
		  },'json');
}

function actualizarFiltrosPorTipo(valor)
{
      region = $("#select-regional").val();
      ciudad = $("#select-ciudad").val();
      params = {"destino":"filtros", "filtros_por": 'ciudad', "valor": valor, "obtener":'tipo', "retornar": 'tipos',
                "multi_constraints": {"regional": region,
                                     "ciudad": ciudad} };

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.tipos, "#select-tipo");
		  },'json');

      
}

function actualizarFiltrosPorTipoRestaurante(valor)
{
      region = $("#select-regional").val();
      ciudad = $("#select-ciudad").val();
      tipo = $("#select-tipo").val();
      params = {"destino":"filtros", "filtros_por": 'tipo', "valor": valor, "obtener":'tipo_restaurante', "retornar": 'tiposres',
        "multi_constraints": {"regional": region,
                             "ciudad": ciudad,
                             "tipo": tipo}};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.tiposres, "#select-tiporestaurante");
		  },'json');
}

function actualizarFiltrosPorRestaurante(valor, base)
{
      region = $("#select-regional").val();
      ciudad = $("#select-ciudad").val();
      tipo = $("#select-tipo").val();
      tiporestaurante = $("#select-tiporestaurante").val();

      params = {"destino":"filtros", "filtros_por": base, "valor": valor, "obtener":'restaurante', "retornar": 'restaurantes',
                "llave": 'codigo', "multi_constraints": {"regional": region,
                                                         "ciudad": ciudad,
                                                         "tipo": tipo,
                                                         "tipo_restaurante":tiporestaurante } };

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroRestaurantes(data.restaurantes);
		  },'json');
}

function actualizarFiltrosPorJefe(valor, base)
{
      region = $("#select-regional").val();
      ciudad = $("#select-ciudad").val();
      tipo = $("#select-tipo").val();
      tiporestaurante = $("#select-tiporestaurante").val();

      params = {"destino":"filtros", "filtros_por": base, "valor": valor, "obtener":'jefe_zona', "retornar": 'jefes',
                 "multi_constraints": {"regional": region,
                                       "ciudad": ciudad,
                                       "tipo": tipo,
                                       "tipo_restaurante":tiporestaurante }};

      $.post( "RequestHandler.php",params, function(data) {
        llenarFiltroSimple(data.jefes,"#select-jefe");
		  },'json');
}









//funciones de llenado de los filtros
function llenarFiltroSimple(elementos, id_filtro)
{
  $(id_filtro).empty();
  $(id_filtro).append('<option value="todo">Todas</option>');
	elementos.forEach(function(entry) {
  	$(id_filtro).append('<option value="'+ entry +'">'+entry+'</option>');
	});
}

function llenarFiltroSimpleNo(elementos, id_filtro)
{
  $(id_filtro).empty();
	elementos.forEach(function(entry) {
    $(id_filtro).append('<option value="'+ entry +'">Todas</option>');
  	$(id_filtro).append('<option value="'+ entry +'">'+entry+'</option>');
	});
}

function llenarFiltroRestaurantes(elementos)
{
  $("#select-restaurante").empty();
  $("#select-restaurante").append('<option value="todo">Todas</option>');
	elementos.forEach(function(entry) {
  	$("#select-restaurante").append('<option value="'+ entry.codigo +'">'+entry.restaurante+'</option>');
	});
}




function hacerPeticion()
{  

  //un post es como si con javascritp uno visitara una página web y todo el contenido de esa pagina web
  //queda guardado en una variable en este caso "datosRecibidosDelPost" 
  //esto esta configurado para que la respuesta llegue como un array en json así que se lee facil
  //
  params = getFiltersValues();
  params['destino'] = "total_preguntas";

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


