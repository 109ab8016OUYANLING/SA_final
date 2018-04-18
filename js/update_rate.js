
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/update_rate.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			document.getElementById('myrate').innerHTML = "1:"+data[0]['rate'] ;
			document.getElementById('ISpeed').innerHTML = data[0]['ISpeed']+" m/h" ;
			document.getElementById('OSpeed').innerHTML = data[0]['OSpeed']+" m/h" ;
			document.getElementById('IISpeed').innerHTML = data[0]['ISpeed']+" m/h" ;
			document.getElementById('OOSpeed').innerHTML = data[0]['OSpeed']+" m/h" ;
			document.getElementById('Temp').innerHTML = data[0]['Temp']+"℃" ;
			document.getElementById('Time').innerHTML = data[0]['OrderEndTime'] ;
			document.getElementById('i_meter').innerHTML = data[0]['I_Meter'] ;
			document.getElementById('o_meter').innerHTML = data[0]['O_Meter'] ;
			document.getElementById('No_meter').innerHTML = data[0]['O_Meter'] ;
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web2/update_rate.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata ;
						console.log(data[0]['rate']);
						// document.getElementById('myrate').innerHTML = data ;
					},
					error: function() {
					}
				});
				document.getElementById('myrate').innerHTML = "1:"+data[0]['rate'] ;
				document.getElementById('ISpeed').innerHTML = data[0]['ISpeed']+" m/h" ;
				document.getElementById('OSpeed').innerHTML = data[0]['OSpeed']+" m/h" ;
				document.getElementById('IISpeed').innerHTML = data[0]['ISpeed']+" m/h" ;
				document.getElementById('OOSpeed').innerHTML = data[0]['OSpeed']+" m/h" ;
				document.getElementById('Temp').innerHTML = data[0]['Temp']+"℃" ;
				document.getElementById('Time').innerHTML = data[0]['OrderEndTime'] ;
				document.getElementById('i_meter').innerHTML = data[0]['I_Meter'] ;
				document.getElementById('o_meter').innerHTML = data[0]['O_Meter'] ;
				document.getElementById('No_meter').innerHTML = data[0]['O_Meter'] ;
               
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




