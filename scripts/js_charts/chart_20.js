function drawChart20() {

  
      params = getFiltersValues();
      params['destino'] = "grafica_reloj";
      
      $.post( "RequestHandler.php",params, function(data1) {
        
        var data = google.visualization.arrayToDataTable(data1);
         
             var options = {
            width: 400, height: 350,
            redFrom: 0, redTo:70,
            yellowFrom:70, yellowTo: 95,
            greenFrom:95, greenTo: 100,
            minorTicks: 5,
          };

            


            var chart = new google.visualization.Gauge(document.getElementById('chart_div_20'));
            chart.draw(data, options);
        

              
             },'json');
        
        
      }
