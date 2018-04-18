
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web/showchart2.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			var time_follower = [];
			var data_follower = [];
			var cmp1;
			var cmp2;
			var dataA;
			/*for(var i in data) {
				time_follower.push(data[i].time);
				data_follower.push(data[i].data);
				}*/

			var chartdata = {
				labels: time_follower,
				datasets: [

					{
							
						label: "data",
						fill: false,
						lineTension: 0,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: data_follower
					}

				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				
				options: {
					  
					animation: {
						duration: 0, // general animation time
					},
					hover: {
						animationDuration: 0, // duration of animations when hovering an item
					},
					responsiveAnimationDuration: 0, // animation duration after a resize
					  elements: {
						line: {
							tension: 0, // disables bezier curves
						}
					},
					scales: {
						yAxes: [{
							ticks: {
								max: 3000,
								min: -100,
								stepSize: 200
								
							}
						}]
					}
			
				}
			});
			
			
			/**********************************************/
			var timeFormat = 'HH:mm:ss';
            var  count = 0;
			
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web/showchart2.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata;
						console.log(Jdata[0]['minutespeed']);
					},
					error: function() {
					}
				});
				

                //超過10 個，就把最早進來的刪掉
                if(time_follower.length>100){
                    time_follower.shift();
                    data_follower.shift();
                }
				
				if (cmp1 == null){
					cmp1 = data[count]['time'];
					time_follower.push(data[count]['time']);
					data_follower.push(data[count]['minutespeed']);
				}
				else if(cmp1 != data[count]['time']){
					time_follower.push(data[count]['time']);
					data_follower.push(data[count]['minutespeed']);
					cmp1 = data[count]['time'];
				}
                
				
                //count++;
				
                //更新線圖
                LineGraph.update();
            }

            //每秒做一次
            setInterval(appendData,60000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




