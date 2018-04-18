



	<?php
	if(isset($_POST['usr'])){
		//include_once "SA_SQL2.php";
	$username=$_POST['usr'];
	$password=$_POST['pwd'];

	//$sql = "SELECT id FROM test1 WHERE usr = '$username' and pwd = '$password'";
	//$result = mysqli_query($conn,$sql);
	if ($result) {
	    #echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . mysqli_error($conn);
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(strcmp($username,"123")==0 && strcmp($password,"123")==0){
	setcookie("login",'usr', time()+3600);
	header("location:index.php");
	}else{


	header("location:login.php?msg=error");
	}
	}
	?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>機台資訊管理系統</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="assets/buttons.css">
            <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
            <script src="assets/buttons/js/buttons.js"></script>
            <style type="text/css">
            h {
                min-height: 100%;
                position: relative;
            }

            body {
                font-family: Microsoft YaHei;
                margin: 0;
            }

            .header {
                position: fixed;
                width: 100%;
                height: 10%;
                margin: 0;
                background-color: black;
            }

            .a {
                width: 800px;
                position: absolute;
                top: 10%;
                left: 27%;
            }

            h1 {
                color: white;
            }

            h2 {
                color: white;
            }
            </style>
        </head>
        <body background="assets/bg.png">
            <div class="header">
                <h1>&nbsp<i class="fa fa-eye" aria-hidden="true"></i>&nbspReal-Time Surveillance System - 系統登入</h1>
            </div>
            <div class="a" align="center">
                <table style="text-align:center;">
                    <tr>
                        <td colspan="2"><img src="assets/w.png" /></td>
                    </tr>
                </table>
                <form method="post" action="">
                    <h2>員工編號&nbsp&nbsp<input type="text" name="usr" id="usr"></h2>
                    <h2>密碼&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="pwd" id="pwd"></h2>
                    <br>
                    <br>
                    <br>
                    <input type="submit" value="登入" class="button button-rounded button-flat-primary" style="font-size: 35px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="reset" value="取消" class="button button-rounded button-flat-primary" style="font-size: 35px">
                </form>
                <div>

				<?php

				if(!empty($_GET['msg'])=="error"){
				echo'<p class="bg-danger">查無此人</p>';
				}
				?>
                </div>
            </div>
        </body>

        </html>