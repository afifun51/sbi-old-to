<?php

?>





<?php
	// First start a session. This should be right at the top of your login page.
	session_start();	
	 
	// Check to see if this run of the script was caused by our login submit button being clicked.
	if (isset($_POST['login-submit'])) {

		// Also check that our email address and password were passed along. If not, jump
		// down to our error message about providing both pieces of information.
		if (isset($_POST['userid']) && isset($_POST['userpass'])) {
			$userid = $_POST['userid'];
			$userpass = $_POST['userpass'];

			$temp = mysql_query("SELECT * FROM admin WHERE userid = '$userid' ");
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
					header('location: homesiswa.php');
					exit;	
				}					
				else {
					$error = "Wrong username or password password to login.";
				}
				
			}
			
		}
		else {
			$error = "Please enter an email and password to login.";
		}
	}
	 // echo "<p>$userid </p>";
	 // echo "<p>$userpass </p>";
	 // echo "<p>$passOnDb</p>";
?>


<body onload = "set_style_from_cookie()">


<!-- Pen Title-->
<div class="pen-title">
  <a> <img src="images/logosg.png" width="240" height="100" alt="" /></a> </br>
  <h2>Tryout CBT Salemba Group</h2> </br>
  <!-- Pen Title-->
  <h3> Powered by : Sanggar Belajar Indonesia</h3>
</div>

<!-- Form Module-->
<div class="module form-module">
  <div class="form">
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
	

	<?php
	    if (isset($error)) {
			  echo "<p>$error</p>";
		}
	 ?>
    <!-- <form> -->
	<form method="post" action="index.php">
      <input type="text" placeholder="Username" name="userid" id="userid"/>
      <input type="password" placeholder="Password" name="userpass" id="userpass"/>
      <button type="submit" name="login-submit" id="login-submit">Login</button>
    </form>
  </div>
  
  <div class="cta"><a href="">Forgot your password?</a></div>
</div>






