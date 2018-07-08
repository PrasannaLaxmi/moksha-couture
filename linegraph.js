
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/mokshaa/admin_area/followersdata.php",
		type : "GET",
		  datatype: 'json',
		success : function(data){
			console.log(data);

			var userid = [];
			var months = [];
			var orders = [];
			

			for(var i in data) {
				userid.push("UserID " + data[i].userid);
				months.push(data[i].months);
				orders.push(data[i].orders);
				//googleplus_follower.push(data[i].googleplus);
			}

			var chartdata = {
				labels: userid,
				datasets: [
					{
						label: "months",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: months
					},
					{
						label: "orders",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: orders
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});