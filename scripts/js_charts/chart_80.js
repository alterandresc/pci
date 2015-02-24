function drawChart80() {

      params = getFiltersValues();
      params['destino'] = "general_imagen";
      
        $.post( "RequestHandler.php",params, function(data1) {
          var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});

          var data = google.visualization.arrayToDataTable(data1);

          formatter.format(data,1);
//           formatter.format(data,2);
                  var options = {'title':'',
                                'width':500,
                                'height':450,
                                'vAxis': {format:'#%'},
                                'colors': [ '#109618','#DC3912'],
                                'pointSize' : 5,
                                'titleTextStyle' : {'fontSize': 12},
                                isStacked: true,
                              };

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_80'));
          chart.draw(data, options);
        },'json');
}
