
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/showchart.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			var time_follower = [];
			var data_follower = [];
			var data_follower2 = [];
			var data_follower3 = [];
			var data_follower4 = [];
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
							
						label: "產出線速",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 0.75)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						pointRadius: 0,
						data: data_follower
					},
					{
							
						label: "投入線速",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(17,205,134, 1)",
						borderColor: "rgba(17,205,134, 1)",
						pointHoverBackgroundColor: "rgba(255, 136, 0, 1)",
						pointHoverBorderColor: "rgba(255, 136, 0, 1)",
						pointRadius: 0,
						data: data_follower2
					},
					{
							
						label: "溫度",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "rgba(255, 0, 26, 1)",
						borderColor: "rgba(255, 0, 26, 1)",
						pointHoverBackgroundColor: "rgba(255, 136, 0, 1)",
						pointHoverBorderColor: "rgba(255, 136, 0, 1)",
						pointRadius: 0,
						data: data_follower3
					}
					,
					{
							
						label: "目前計米",
						fill: false,
						lineTension: 0.2,
						backgroundColor: "#FCF4D9",
						borderColor: "#FCF4D9",
						pointHoverBackgroundColor: "rgba(255, 136, 0, 1)",
						pointHoverBorderColor: "rgba(255, 136, 0, 1)",
						pointRadius: 0,
						data: data_follower4
					}

				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				
				options: {
					
					scales: {
						yAxes: [{
							ticks: {
								max: 2000,
								min: 0,
								stepSize: 100
								
							}
						}]
					},
					
			
				}
			});
			
			
			/**********************************************/
			var timeFormat = 'HH:mm:ss';
            var  count = 0;
			
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web2/showchart.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata;
						console.log(Jdata[0]['OSpeed']);
						console.log(Jdata[0]['ISpeed']);
						console.log(Jdata[0]['Temp']);
					},
					error: function() {
					}
				});
				

                //超過10 個，就把最早進來的刪掉
                if(time_follower.length>100){
                    time_follower.shift();
                    data_follower.shift();
					data_follower2.shift();
					data_follower3.shift();
					data_follower4.shift();
                }
				
				if (cmp1 == null){
					cmp1 = data[count]['OrderEndTime'];
					time_follower.push(data[count]['OrderEndTime']);
					data_follower.push(data[count]['OSpeed']);
					data_follower2.push(data[count]['ISpeed']);
					data_follower3.push(data[count]['Temp']);
					data_follower4.push(data[count]['O_Meter']);
				}
				else if(cmp1 != data[count]['OrderEndTime']){
					time_follower.push(data[count]['OrderEndTime']);
					data_follower.push(data[count]['OSpeed']);
					data_follower2.push(data[count]['ISpeed']);
					data_follower3.push(data[count]['Temp']);
					data_follower4.push(data[count]['O_Meter']);
					cmp1 = data[count]['OrderEndTime'];
				}
                
				
                //count++;
				
                //更新線圖
                LineGraph.update();
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




