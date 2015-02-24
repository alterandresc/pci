      function drawChartl20() {

			// Set chart options
			var options = {'title':'Satisfacción General Por Periodo',
                 'width':500,
                 'height':450,
                 'colors': ['#109618', '#FF9900', '#DC3912'],
                 'pointSize' : 5,
                 'colors': [ '#0000FF'],
                 'titleTextStyle' : {'fontSize': 12},
                 'vAxis': { 'ticks': [0,25,50,75,100] },
                  curveType: 'function',
                };

      var options = {
              title: 'General',
               'width':500,
               'height':450,
              is3D: true,
              'colors': [ '#109618', '#FF9900','#DC3912'],
              };


     var data = google.visualization.arrayToDataTable([
          ['Respuesta', 'Valor'],
          ['Si',     75],
          ['No',      12],
          ['NS/NR',  13]
        ]);


			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div_l20'));
			chart.draw(data, options);			
      }
