 function drawChartHAmbiente() {
   
      params = getFiltersValues();
      params['destino'] = "historico_preguntas_ambiente";
      $.post( "RequestHandler.php",params, function(data1) {
        
        var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});
        var data = google.visualization.arrayToDataTable(data1);
        formatter.format(data,1);
        formatter.format(data,2);
        formatter.format(data,3);
        formatter.format(data,4);
        formatter.format(data,5);
        formatter.format(data,6);
        formatter.format(data,7);

        var options = {
          title: 'Histórico',
          'width':800,
          'height':350,
           'vAxis': {format:'#%', 'ticks': [0,0.25,0.50,0.75,1] },
          pointSize: 5
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div_historial_ambiente'));

        chart.draw(data, options);
        
      },'json');
}
