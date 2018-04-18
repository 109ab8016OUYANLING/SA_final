
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/update.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			document.getElementById('OStartT').innerHTML = data[0]['StartTime'] ;
			document.getElementById('OEndT').innerHTML = data[0]['EndTime'] ;
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web2/update.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata ;
						
						// document.getElementById('myrate').innerHTML = data ;
					},
					error: function() {
					}
				});
				document.getElementById('OStartT').innerHTML = data[0]['StartTime'] ;
			document.getElementById('OEndT').innerHTML = data[0]['EndTime'] ;
               
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




