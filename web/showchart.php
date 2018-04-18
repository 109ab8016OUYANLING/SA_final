<?php
//setting header to json
header('Content-Type: application/json');

// //database
// define('DB_HOST', '127.0.0.1');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'seedfamily0912');
// define('DB_NAME', 'sa');
// //get connection
// $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// if(!$mysqli){
// 	die("Connection failed: " . $mysqli->error);
// }
include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');
//query to get data from the table



$query = sprintf("SELECT * FROM history ORDER BY id DESC limit 1");
//$query = sprintf("SELECT o_meter,time FROM sa_data_5 ORDER BY id DESC limit 2");

//execute query
$result = $conn->query($query);
//$total = $mysqli->query($sql);


//loop through the returned data
$data = array();
foreach ($result as $row) {
	//$data2[] = $row;
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();
/*if(empty($data2[0]["time"])!=1 && empty($data2[1]["time"])!=1){
	
$data[] = $data2[0];
//print $data[0]["i_meter"]-$data[1]["i_meter"];
$data[0]["i_meter"] = ($data2[0]["i_meter"]-$data2[1]["i_meter"])/1;
$data[0]["time"] = $data2[0]["time"];
print json_encode($data);
}
else{
	$data2[0]["i_meter"] = 0;
	$data2[0]["time"] = "00:00:00";
	print json_encode($data2);
}*/
//now print the data
print json_encode($data);

?>
