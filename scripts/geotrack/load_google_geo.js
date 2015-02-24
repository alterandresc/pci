function  loadMap()
{
        var icono1 = "vendor/img/verde.png"
        var mapOptions = {
          center: new google.maps.LatLng(4.4279158, -74.2704962),
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
         map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        params = getFiltersValues();
        params['destino'] = "puntos_mapa";
// 	$.post( "RequestHandler.php",params, function(data1)
// 	{
//             var icono0 = "vendor/img/gris.png";
//             var icono1 = "vendor/img/rojo.png";
//             var icono2 = "vendor/img/naranja.png";
//             var icono3 = "vendor/img/verde.png";
// 
//             var i =0 ;
//             data1.forEach(function(entry)
//             {
//                 i++;
//                 if (entry.icono == 0) {icono = icono0};
//                 if (entry.icono == 1) {icono = icono1};
//                 if (entry.icono == 2) {icono = icono2};
//                 if (entry.icono == 3) {icono = icono3};
// 		
// 
//                 marker = new google.maps.Marker(
//                               {position: new google.maps.LatLng(entry.latitud, entry.longitud),
//                                 map: map,
//                                 icon: icono,
//                                 content: entry.punto,
//                                 title: entry.punto + " puntaje: "+entry.indice + " datos: " + entry.datos, 
//                                 id: i});
// 				
// 				
// 		    // Procedmiento deCLick 
// 		    google.maps.event.addListener(marker, 'click',(function(marker_inner)
//                     {
//                             return function()
//                                     {
//                                             map.setZoom(15);
//                                             map.setCenter(marker_inner.getPosition());
//                                     }
//                     })(marker)			
// 		    ); 
//                     
//             });
//             
//             },'json');


}
