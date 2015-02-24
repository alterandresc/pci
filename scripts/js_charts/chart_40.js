function drawChart40() {

    params = getFiltersValues();
    params['destino'] = "general_venta_facturacion";

      //necesary for display "80%" instead of  "0.8", must format every single line
      $.post( "RequestHandler.php",params, function(data1) {
                  var data = google.visualization.arrayToDataTable(data1);
                  var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});
		  formatter.format(data,1);

		  // Set chart options
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
		  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_40'));
		  chart.draw(data , options);
        },'json');

}
