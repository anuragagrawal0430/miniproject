<?php
session_start('admin');
if(isset($_POST['user']) && isset($_POST['admin_pass']))
{
	if(($_POST['user'])=="OVS" && ($_POST['admin_pass'])=="angaar")
	{
		$_SESSION['pass']='true';
		echo "<script type='text/javascript'> location='admin.php';</script>";
		die();
	}
	else
	{
	echo "<script type='text/javascript'> alert('Incorrect Details'); location='admin_login.php';</script>";
		die();	
	}
}
?>


<html>
<head>

    <link type="text/css" href="css/materialize.min.css" rel="stylesheet">
    <link type="text/css" href="css/header.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <title>
        ADMIN-LOGIN
    </title>
</head>
<body>


<div class="container center">
    <div class="section" style="max-width: 70%;margin-left: 100px; margin-top: 8%;">
        <div class="card">
            <div class="row">
                <div class="col l8 m11 s10 offset-l2 offset-s1 offset-m1">
                    <h5 class="pad">Admin-Login</h5>
                    <form method="post">
                        <div class="row">
                            <div class="input-field col l12 m5 s12 ">
                                <input type="text" name="user" id="user" required />
                                <label for="user">User Name</label>
                            </div>

                            <div class="input-field col l12 m5 s12 ">

                                <input name="admin_pass" id="admin_pass" type="password" class="validate">
                                <label for="admin_pass">Password</label>
                            </div>
                            </div>

                        <div class="row center">
                            <button class="btn waves-effect waves-light" id="btn"style="margin-right: 30px;" type="submit" name="action" > in
                                <i class="material-icons"></i>
                            </button>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery-2.x.js"></script>
<script src="js/materialize1.js"></script>

</body>
</html>

