function drawChart90() {
    params = getFiltersValues();
    params['destino'] = "periodo_imagen";
    // Set chart options
    $.post( "RequestHandler.php",params, function(data1) {
                        var options = {'title':'',
                                      'width':500,
                                      'height':450,
                                      'colors': ['#109618', '#FF9900', '#DC3912'],
                                      'pointSize' : 5,
                                      'titleTextStyle' : {'fontSize': 12},
                                      'vAxis': {format:'#%','ticks': [0,0.25,0.50,0.75,1]},
                                    };
      var data = google.visualization.arrayToDataTable(data1);
      var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});
      formatter.format(data,1);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div_90'));
      chart.draw(data, options);
    },'json');
}
