$(function(){
	  $.ajax({
	    url: '/mokshaa/admin_area/chart_data1.php',
	    type: 'GET',
	    success : function(data) {
	      chartData = data;
	      var chartPropertiess = {
	        
	        "xAxisName": "Dates",
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
	          "chart": chartPropertiess,
	          "data": chartData
	        }
	      });
	      apiChart.render();
	    }
	  });
	});