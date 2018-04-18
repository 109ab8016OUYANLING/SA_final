<?php
if(isset($_POST['usr'])){
    include_once "SA_SQL.php";
$username=$_POST['usr'];
$password=$_POST['pwd'];

$sql = "SELECT * FROM admin WHERE usr = '$username' and pwd = '$password'";
$result = mysqli_query($conn,$sql);
if ($result) {
    #echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(strcmp($username,'123')==0 && strcmp($password,'123')==0){
setcookie("login",'usr', time()+3600);
header("location:../index.php");
}else{


header("location:login2.php?msg=error");
}
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <link href='assets/default.css' rel="stylesheet" type='text/css' />
        <link href='assets/loginpage.css' rel="stylesheet" type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>智慧機台資訊管理系統</title>
    </head>

    <body id="likebootstrap" background="assets/bg.png">
        <div class="header " style="background-color: black;">
            <div class="header_inner_wrapper">
                <h1 style="color:white;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp Real-Time Surveillance System - 系統登入</h1>
                <div class="progressbar_wrap ">
                </div>
            </div>
            <div class="both"></div>
        </div>
        <div class="login_page_main_wrapper">
            <div class="login_page_main">
                <div align="center" id="logOn-container1" class="js-login-page login_form" loginFormUniqueIdentifierDetectedByGlobalAjaxHandlers>
                    <img src="assets/ws.png" width="85%" />
                    <form action="" method="post">
                        <div class="dialog_form_wrap clear" id="logOn-container2">
                            <h2 class="top_mar15" align="left">系統登入</h2>
                            <input id="LoginErrorText" type="hidden" name="Count" />
                            <div class="clear">
                                <div class="inp_field bottom_mar15 w100p relative login_inp_wrapper">
                                    <div class="login_inp_bg login_username_icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                    <input data-val="true" data-val-required="The User name field is required." id="usr" name="usr" placeholder="Username" type="text" value="" />
                                    <div class="error_msg"><span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="true"></span></div>
                                </div>
                            </div>
                            <div class="clear">
                                <div class="inp_field bottom_mar15 w100p relative login_inp_wrapper">
                                    <div class="login_inp_bg login_lock_icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    <input data-val="true" data-val-required="The Password field is required." id="pwd" name="pwd" placeholder="Password" type="password" />
                                </div>
                            </div>
                            <div class="clear">
                                <div class="fright">
                                    <input class="btn btn-primary btn_pad25" type="submit" value="Login" id="LoginButton" />
                                </div>
                            </div>
                            <div class="login_page_separator top_mar20"></div>
                            
                                <?php
                                if(!empty($_GET['msg'])=="error"){
                                echo'<div class="clear login_holder_foot"><h1>輸入錯誤</h1></div>';
                                }
                                ?>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>