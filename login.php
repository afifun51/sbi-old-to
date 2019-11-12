<?php
require 'access.php';
//require 'head.php';
//require 'formlogin.php';
//require 'foot.php';

//header('location: home.php');
//exit;	
    
    // First start a session. This should be right at the top of your login page.
	session_start();	
    	//header('location: home.php');
	//exit;	
	 
	// Check to see if this run of the script was caused by our login submit button being clicked.
	if (isset($_POST['login-submit'])) {
		//header('location: home.php');
		//exit;	

		// Also check that our email address and password were passed along. If not, jump
		// down to our error message about providing both pieces of information.
		if (isset($_POST['userid']) && isset($_POST['userpass'])) {
			$userid = $_POST['userid'];
			$userpass = $_POST['userpass'];

			$temp = mysql_query("SELECT * FROM admin WHERE userid = '$userid' ");
			if (!$temp) { // add this check.
			    die('Invalid query: ' . mysql_error());
			}
			$myArray = mysql_fetch_array($temp);
			$passOnDb = $myArray['password'];
			
			// if ($userpass == $passOnDb) {
				// header('location: homeadmin.php');
				// exit;		
			// }		
			if(($_POST['userid']=='admin') && ($_POST['userpass']=='admin'))  {
				$_SESSION['username'] = $userid;
				header('location: homeadmin.php');
				exit;
			}
			else {
				$temp = mysql_query("SELECT  * FROM siswa WHERE userid = '$userid' ");
				$myArray = mysql_fetch_array($temp);
				$passOnDb = $myArray['password'];
				if ($userpass == $passOnDb) {
					$_SESSION['username'] = $userid;
					header('location: home.php');
					exit;	
				}					
				else {
					$error = "Wrong username or password password to login.";
					echo $error;
				}
				
			}
			
		}
		else {
			$error = "Please enter an email and password to login.";
			echo $error;
		}
	}
	 // echo "<p>$userid </p>";
	 // echo "<p>$userpass </p>";
	 // echo "<p>$passOnDb</p>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Try Out CBT : UTBK 2020</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="assets/vendor/nova-icons/nova-icons.css" rel="stylesheet">

    <!-- CSS Implementing Libraries -->

    <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="assets/vendor/visavail-custom/css/visavail.css">
    <link rel="stylesheet" href="assets/vendor/jquery-shorten/src/jquery.shorten.css">

    <!-- CSS Nova Template -->
    <link rel="stylesheet" href="assets/css/theme.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- CSS SBI Theme -->
    <link rel="stylesheet" href="assets/css/sbi-theme.css">


    <style type="text/css">
            .login-form {
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {  
        margin-bottom: 10px;      
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .input-group-addon .fa {
        font-size: 18px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }


        .center {
              display:block;
                margin:auto;
            }
    </style>
</head>

<body>
    <main class="main">
            <div class="login-form">
                <div>
                    <img class="center" src="assets/img/logo.png" alt="" width="50%">
                </div>

    <form class="mt-10" action="" method="post">
        <h3 class="text-center">Login</h3> 
        <h4>

			<?php
			    if (isset($error)) {
					  echo "<p>$error</p>";
				}
			 ?>
	 	
	 </h4>  
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="nova-user"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="userid" id="userid" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="userpass" id="userpass" required="required">
            </div>
        </div>        
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary btn-block" name="login-submit" id="login-submit">
        </div>
        <!-- <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div> -->        
    </form>
    <p class="text-center small">Don't have an account! <a href="#">Sign up here</a>.</p>
        </div>

</main>
    <footer class="small bg-white p-3 px-md-4 mb-0 d-print-none" style="bottom: 0%;">
        <div class="col-lg text-center">
            &copy; 2020 Developed By Sanggar Belajar Indonesia. All Rights Reserved.
        </div>
        </div>
    </footer>

    <script	type ="text/javascript">
		history.pushState(null, null, 'login.php');
		window.addEventListener('popstate', function(event) {
		history.pushState(null, null, 'login.php');
		});
	</script>

</body>

</html>







