$(function(){
	  $.ajax({
	    url: '/mokshaa/admin_area/chart_data.php',
	    type: 'GET',
	    success : function(data) {
	      chartData = data;
	      var chartProperties = {
	        
	        "xAxisName": "Months",
	        "yAxisName": "Orders",
	        "rotatevalues": "1",
	        "theme": "zune"
	      };
	      apiChart = new FusionCharts({
	        type: 'line',
	        renderAt: 'chart-container',
	        width: '550',
	        height: '250',
	        dataFormat: 'json',
	        dataSource: {
	          "chart": chartProperties,
	          "data": chartData
	        }
	      });
	      apiChart.render();
	    }
	  });
	});