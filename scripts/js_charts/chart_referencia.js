function drawChartReferencia() {

  params = getFiltersValues();
  params['destino'] = "resumen_pila";

  $.post( "RequestHandler.php",params, function(data1) {

    var data = google.visualization.arrayToDataTable([['', 'Venta y Facturación', 'Operación', 'Imagen Personal', 'Ambiente y Otros' ],
        ['', 50, 16.6, 16.6, 16.6],
        ['', 50, 16.6, 16.6, 16.6]
      ]);

        var options = {
                      'width':500,
                      'height':650,
//                       'colors': ['#3366cc','#f84848'],
//                       'vAxis': {format:'#%', 'ticks': [0,0.25,0.50,0.75,1] },
                      isStacked: true,
                      title : '',
                      seriesType: "bars",
                      vAxes:{1:{textStyle:{color: 'black'}, }}
                    };
        var data = google.visualization.arrayToDataTable(data1);
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_referencia'));
        chart.draw(data, options);

  },'json');

}


