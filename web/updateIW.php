<?php

include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');


$query = sprintf("SELECT * FROM history ORDER BY id DESC limit 1");
$rs = $conn->query($query);

$rowS = mysqli_fetch_assoc($rs);

$sql = "SELECT * FROM iwork WHERE status = '".$rowS['IAxleID']."'";
$result = $conn->query($sql);
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
