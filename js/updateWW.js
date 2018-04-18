
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/updateWW.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			document.getElementById('IID').innerHTML = data[0]['IWorkID'] ;
			document.getElementById('OID').innerHTML = data[0]['OWorkID'] ;
			document.getElementById('IL').innerHTML = data[0]['ILineID'] ;
			document.getElementById('OL').innerHTML = data[0]['OLineID'] ;
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web2/updateWW.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata ;
						
						// document.getElementById('myrate').innerHTML = data ;
					},
					error: function() {
					}
				});
				document.getElementById('IID').innerHTML = data[0]['IWorkID'] ;
				document.getElementById('OID').innerHTML = data[0]['OWorkID'] ;
				document.getElementById('IL').innerHTML = data[0]['ILineID'] ;
				document.getElementById('OL').innerHTML = data[0]['OLineID'] ;
               
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




