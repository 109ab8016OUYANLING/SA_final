
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/update_rate.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			document.getElementById('myrate').innerHTML = data[0]['rate'] ;
			document.getElementById('ISpeed').innerHTML = data[0]['IlineSpeed']+" m/h" ;
			document.getElementById('OSpeed').innerHTML = data[0]['OlineSpeed']+" m/h" ;
			document.getElementById('IISpeed').innerHTML = data[0]['IlineSpeed']+" m/h" ;
			document.getElementById('OOSpeed').innerHTML = data[0]['OlineSpeed']+" m/h" ;
			document.getElementById('Temp').innerHTML = data[0]['temp']+"℃" ;
			document.getElementById('Time').innerHTML = data[0]['time'] ;
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
				document.getElementById('myrate').innerHTML = data[0]['rate'] ;
				document.getElementById('ISpeed').innerHTML = data[0]['IlineSpeed']+" m/h" ;
				document.getElementById('OSpeed').innerHTML = data[0]['OlineSpeed']+" m/h" ;
				document.getElementById('IISpeed').innerHTML = data[0]['IlineSpeed']+" m/h" ;
				document.getElementById('OOSpeed').innerHTML = data[0]['OlineSpeed']+" m/h" ;
				document.getElementById('Temp').innerHTML = data[0]['temp']+"℃" ;
				document.getElementById('Time').innerHTML = data[0]['time'] ;
               
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




