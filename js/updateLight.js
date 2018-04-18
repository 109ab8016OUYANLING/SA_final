
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/phpmyadmin/phptest/SaWeb/web2/updateLight.php",
		type : "POST",
		dataType: "json",
		success : function(data){
			console.log(data);
			document.getElementById('lightSign').innerHTML = "<img src='images/"+data[0]['light']+"' width='60%'>" ;
			
            function appendData()
            {
				
				//cmp2 = data[count]['data'];
				$.ajax({
					url: "http://localhost/phpmyadmin/phptest/SaWeb/web2/updateLight.php",
					type: "POST",
					dataType: "json",
					success: function(Jdata) {
						data = Jdata ;
						console.log(data[0]['light']);
						// document.getElementById('myrate').innerHTML = data ;
					},
					error: function() {
					}
				});
				document.getElementById('lightSign').innerHTML = "<img src='images/"+data[0]['light']+"' width='60%'>" ;
			
               
            }

            //每秒做一次
            setInterval(appendData,1000);
			
			/***************************************************/
			
			
			
		},
		error : function(data) {

		}
	});
});




