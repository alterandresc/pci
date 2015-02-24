function drawChart10() {

      params = getFiltersValues();
      params['destino'] = "periodo_indice";
      
      $.post( "RequestHandler.php",params, function(data1) {
      
        var options = {'title':'Satisfacción General Por Periodo',
                 'width':500,
                 'height':450,
                 'colors': ['#109618', '#FF9900', '#DC3912'],
                 'pointSize' : 5,
                 'colors': [ '#0000FF'],
                 'titleTextStyle' : {'fontSize': 12},
                 'vAxis': { 'ticks': [0,25,50,75,100] },
                };

            // Instantiate and draw our chart, passing in some options.
            var data = google.visualization.arrayToDataTable(data1);
            var chart = new google.visualization.LineChart(document.getElementById('chart_div_10'));
            chart.draw(data, options);
            
        },'json');
      }
