      function drawChartl10() {

			// Set chart options
			var options = {'title':'General',
                 'width':500,
                 'height':450,
                 'colors': ['#109618', '#FF9900', '#DC3912'],
                 'pointSize' : 5,
                 'colors': [ '#0000FF'],
                 'titleTextStyle' : {'fontSize': 12},
                 'vAxis': { 'ticks': [0,25,50,75,100] },
                  curveType: 'function',
                };

     var data = google.visualization.arrayToDataTable([
          ['Periodo', ''],
          ['2014 05',  98],
          ['2014 06',  87],
          ['2014 07',  89]
       ]);

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.LineChart(document.getElementById('chart_div_l10'));
			chart.draw(data, options);			
      }
