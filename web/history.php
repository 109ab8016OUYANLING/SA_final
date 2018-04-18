<?php
include_once "SA_SQL.php";
header('content-type:text/html;charset=utf-8');
	$getDate= date("Y-m-d");
	$selected_val = 'None';
	if(isset($_POST['submit'])){
		$selected_val = $_POST['Order'];  // Storing Selected Value In Variable
	}
	
	if( $selected_val != 'None' ){
		$sql = "SELECT * FROM history WHERE POrder = '$selected_val' ";
		$result3 = $conn->query($sql);
		$row = mysqli_fetch_array($result3);
		
		$sql = "SELECT * FROM history WHERE POrder = '$selected_val' ORDER BY id DESC limit 1";
		$result = $conn->query($sql);
		$rowNew = mysqli_fetch_array($result);
		
	}
	
	$sql = "SELECT * FROM makeorder";
	$result2 = $conn->query($sql);
	
	
														
													
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.adminbootstrap.com/right/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 13:14:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>即時監控系統－歷史紀錄</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/jquery.scrollbar.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link class="demo__css" href="css/right.dark.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
	<link href="css/buttons.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script><![endif]-->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/Chart.min.js"></script>
</head>

<body class="framed main-scrollable">
    <div class="wrapper">
        <nav class="navbar navbar-static-top header-navbar">
            <div class="header-navbar-mobile">
                <div class="header-navbar-mobile__menu">
                    <button class="btn" type="button"><i class="fa fa-bars"></i></button>
                </div>
                <div class="header-navbar-mobile__settings dropdown"><a class="btn dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="login/login2.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <div class="logo text-nowrap">
                        <div class="logo__img"><i class="fa fa-eye"></i></div><span class="logo__text">即時監控系統</span>
                    </div>
                </a>
            </div>
            <div class="topnavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php"><span>Dashboard</span></a></li>
                    <li class="active"><a href="#"><span>History</span></a></li>
                </ul>
                <ul class="userbar nav navbar-nav">
                    <li class="dropdown"><a class="userbar__settings dropdown-toggle" href="login/login2.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
						<ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="login/login2.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="dashboard">
            <div class="sidebar">
                <div class="quickmenu">
                    <div class="quickmenu__cont">
                        <div class="quickmenu__list">
                            <div class="quickmenu__item active">
                                <div class="fa fa-fw fa-home"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scrollable scrollbar-macosx">
                    <div class="sidebar__cont">
                        <div class="sidebar__menu">
                            <!--<div class="sidebar__title">Pages</div>-->
                            <ul class="nav nav-menu">
                                <li>
                                    <a href="index.php">
                                        <div class="nav-menu__ico"><i class="fa fa-tachometer"></i></div>
                                        <div class="nav-menu__text"><span>Dashboard</span></div>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        <div class="nav-menu__ico"><i class="fa fa-history"></i></div>
                                        <div class="nav-menu__text"><span>History</span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main__scroll scrollbar-macosx">
                    <div class="main__cont">
                        <div class="main-heading">
                            <div class="main-title">
                                <ol class="breadcrumb">
                                    <li class="active">History</li>
                                </ol>
                            </div>
                        </div>
                        <div class="container-fluid half-padding">
                            <div class="pages pages_dashboard">
                                <div class="row">
                                    <div class="col-md-14">
                                        <!--圖表 左上-->
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-table" aria-hidden="true"></i>Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="st-widget__label">製令編號：</div>
                                                <div class="st-widget__select">
													<form action="#" method="post">
                                                    <select class="selectpicker form-control" placeholder="Variable" name="Order">
														<option value="None">None</option>
														<?php
														
															foreach ($result2 as $rowOrder) {															
																echo "<option value='".$rowOrder['OrderID']."'>".$rowOrder['OrderID']."</option>";															
															}
														?>
                                                        
                                                        
                                                    </select>
													<input type="submit" name="submit" value="Send" class="button button-pill button-primary" />
													<!--style="width:60px;font-size:14px;color:black;float:right;"-->
													</form>
													
                                                </div>
                                                <br/>
                                                <table width="100%">
                                                    <!--<tr>
                                                        <td colspan="12" style="font-size:12pt">
                                                        </td>
                                                    </tr>-->
                                                    <tr style="font-size:12pt">
                                                        <td>日期：<?php if( $selected_val != 'None' )echo $rowNew['Date'];?></td>
                                                       
                                                        <td>製令編號：<?php if( $selected_val != 'None' )echo $rowNew['POrder'];   ?></td>
                                                       
                                                        <td>投入段長度：<?php if( $selected_val != 'None' )echo 100   ?></td>
                                                        
                                                        <td>產出段長度：<?php if( $selected_val != 'None' )echo 200   ?></td>
                                                       
                                                        <td>開始時間：<?php if( $selected_val != 'None' )echo $rowNew['OrderStartTime'];   ?></td>
                                                       
                                                        <td>結束時間：<?php if( $selected_val != 'None' )echo $rowNew['OrderEndTime'];   ?></td>
                                                       
                                                    </tr>
                                                   
                                                </table>
                                                <br/>
                                                <table width="100%" style="font-size: 12pt;text-align: center;">
                                                  <tr style="border-bottom-style:solid;">
                                                    <td>產出線段ID</td>
													<td>時間</td>
													<td>產出長度</td>
                                                    <td>產出線速</td>
                                                    <td>溫度</td>
                                                    <td>狀態</td>
                                                  </tr>
												  <?php
													if( $selected_val != 'None' ){
														foreach ($result3 as $row) {
															echo "<tr><td>".$row['OLineID']."</td>";
															echo "<td>".$row['OrderEndTime']."</td>";
															echo "<td>".$row['O_Meter']."</td>";
															echo "<td>".$row['OSpeed']."</td>";
															echo "<td>".$row['TempCon']."</td>";
															if( $row['MaCon'] == '1' ) echo "<td>穩定生產</td>";													
															else if( $row['MaCon'] == '2' ) echo "<td>穩定增速</td>";
															else if( $row['MaCon'] == '3' ) echo "<td>穩定降速</td>";
															else if( $row['MaCon'] == '4' ) echo "<td>整備中</td>";
															else if( $row['MaCon'] == '5' ) echo "<td>異常停機</td>";
															else if( $row['MaCon'] == '6' ) echo "<td>線速過低</td>";
															else if( $row['MaCon'] == '7' ) echo "<td>線速過高</td>";
															else if( $row['MaCon'] == '8' ) echo "<td>線速不穩定 </td>";
															else if( $row['MaCon'] == '9' ) echo "<td>正常停機</td>";
															else if( $row['MaCon'] == '10' ) echo "<td>固定維修</td>";
															else if( $row['MaCon'] == '11' ) echo "<td>溫度過高</td>";
															else if( $row['MaCon'] == '12' ) echo "<td>轉換率異常</td>";
															else if( $row['MaCon'] == '13' ) echo "<td>超出工時</td>";
															else if( $row['MaCon'] == '14' ) echo "<td>結束</td>";
															else if( $row['MaCon'] == '15' ) echo "<td>結束且超過總工時</td>";
															else echo "<td>不知名狀態</td>";
															echo "</tr>";	
															
														}	
													}
												  ?>
                                                
												  
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="js/jquery.min.js"></script>
                                    <script src="js/bootstrap.min.js"></script>
                                    <script src="js/jquery.scrollbar.min.js"></script>
                                    <script src="js/bootstrap-tabdrop.min.js"></script>
                                    <script src="js/jquery.sparkline.min.js"></script>
                                    <script src="js/ion.rangeSlider.min.js"></script>
                                    <script src="js/inputNumber.js"></script>
                                    <script src="js/bootstrap-switch.min.js"></script>
                                    <script src="js/raphael.min.js"></script>
                                    <script src="js/morris.min.js"></script>
                                    <script src="js/bootstrap-select.min.js"></script>
                                    <script src="js/index.js"></script>
                                    <script src="js/main.js"></script>
                                    <script src="js/demo.js"></script>
                                    <!-- Analytics and visitor tracking scripts can be placed here -->
                                    <!-- Yandex.Metrika counter -->
                                    <script type="text/javascript">
                                    (function(d, w, c) {
                                        (w[c] = w[c] || []).push(function() {
                                            try {
                                                w.yaCounter34743530 = new Ya.Metrika({
                                                    id: 34743530,
                                                    clickmap: true,
                                                    trackLinks: true,
                                                    accurateTrackBounce: true,
                                                    webvisor: true
                                                });
                                            } catch (e) {}
                                        });

                                        var n = d.getElementsByTagName("script")[0],
                                            s = d.createElement("script"),
                                            f = function() { n.parentNode.insertBefore(s, n); };
                                        s.type = "text/javascript";
                                        s.async = true;
                                        s.src = "js/watch.js";

                                        if (w.opera == "[object Opera]") {
                                            d.addEventListener("DOMContentLoaded", f, false);
                                        } else { f(); }
                                    })(document, window, "yandex_metrika_callbacks");
                                    </script>
                                    <noscript>
                                        <div><img src="https://mc.yandex.ru/watch/34743530" style="position:absolute; left:-9999px;" alt="" /></div>
                                    </noscript>
                                    <!-- /Yandex.Metrika counter -->
                                    <script type="text/javascript">
                                    $('body').on('click', '.datalist-filter__search button', function() {
                                        yaCounter34743530.reachGoal('Filter');
                                    });
                                    $('body').on('click', '.quickmenu__item', function() {
                                        yaCounter34743530.reachGoal('Quick');
                                    });
                                    $('body').on('click', '.demo__theme', function() {
                                        yaCounter34743530.reachGoal('Theme');
                                    });
                                    </script>
									<!--<script type="text/javascript" src="../js/update_history.js"></script>-->
</body>
<!-- Mirrored from demo.adminbootstrap.com/right/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 13:14:29 GMT -->

</html>