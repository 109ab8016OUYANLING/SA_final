<?php

include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');


$query = sprintf("SELECT * FROM history ORDER BY id DESC limit 1");

//execute query
$result = $conn->query($query);

$query = sprintf("SELECT * FROM owork WHERE ");
$result2 = $conn->query($query);
//echo $rs['rate'];
$data = array();
foreach ($result as $row) {
	//$data2[] = $row;
	$data[] = $row;
}
// print_r( $rs['rate']);
$conn->close();
print json_encode($data);

?>
