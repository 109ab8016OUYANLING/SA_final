<?php 
$url = "http://localhost/url.php"; ?>
<html> <head> <meta http-equiv="refresh" content="1; url=<?php echo $url; ?>"> </head> <body> 頁面隻停留一秒…… </body> </html>
<?php

	$servername = "localhost";
	$username = "root";
	$password = "seedfamily0912";
	$dbname = "sa";


	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$json = file_get_contents('http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11&sid=C11-I1');
	$myJSON = json_encode($json);

	$data = json_decode($json,true);

	$Time = $data['time'];
	$Data = $data['data'];

	$sql = "INSERT INTO timeDate (time,data)
	VALUES ('$Time', '$Data')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	echo "<pre>";

	print_r($Time."  ".$Data);

$conn->close();
?>