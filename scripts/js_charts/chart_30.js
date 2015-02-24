function drawChart30() {

      params = getFiltersValues();
      params['destino'] = "resumen_secciones";
      $.post( "RequestHandler.php",params, function(data1) {
        
        var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});
        var data = google.visualization.arrayToDataTable(data1);
        formatter.format(data,1);
      
        var options = {
                      'width':500,
                      'height':650,
                      'colors': ['#3366cc','#f84848'],
                      'vAxis': {format:'#%', 'ticks': [0,0.25,0.50,0.75,1] },
                      title : '',
                      seriesType: "bars",
                      series:{1:{type: "line",targetAxisIndex:1,pointSize: 10}}, vAxes:{1:{textStyle:{color: 'black'}, }}
                    };
  
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_30'));
        chart.draw(data, options);
        
      },'json');
      
}
      

