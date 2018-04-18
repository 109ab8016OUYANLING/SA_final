<?php

include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');

$query = sprintf("SELECT MaCon,TempCon FROM history ORDER BY id DESC limit 1");
$rowH = mysqli_fetch_assoc($conn->query($query));
//print $rowH['MaCon'];

if( $rowH['MaCon'] == '1' || $rowH['MaCon'] == '2' || $rowH['MaCon'] == '3' || $rowH['MaCon'] == '4'){
	$query = sprintf("SELECT * FROM img WHERE id = 1");
	$rs = $conn->query($query);
}//green
else if( $rowH['MaCon'] == '5' ){
	$query = sprintf("SELECT * FROM img WHERE id = 2");
	$rs = $conn->query($query);
}//purple
else if( $rowH['MaCon'] == '6' || $rowH['MaCon'] == '7' || $rowH['MaCon'] == '8' || $rowH['MaCon'] == '11' || $rowH['MaCon'] == '12' ){
	$query = sprintf("SELECT * FROM img WHERE id = 3");
	$rs = $conn->query($query);
}//yellow
else{
	$query = sprintf("SELECT * FROM img WHERE id = 4");
	$rs = $conn->query($query);
}//red


$data = array();
foreach ($rs as $row) {
	//$data2[] = $row;
	$data[] = $row;
}
// print_r( $rs['rate']);
$conn->close();

print json_encode($data);

?>
