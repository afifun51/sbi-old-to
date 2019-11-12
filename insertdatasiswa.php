<?php
require 'access.php';
require 'head.php';
require 'kocokan.php';
?>


<head>
<link rel="stylesheet" type="text/css" href="css/tablestyle.css">
</head>

<script	type ="text/javascript">

// history.pushState(null, null, 'homeadmin.php');
// window.addEventListener('popstate', function(event) {
// history.pushState(null, null, 'homeadmin.php');
// });
</script>

<?php
	
	date_default_timezone_set('Asia/Jakarta');
	
	session_start();
	if (!isset($_SESSION['username']))
	{
		header('location: index.php');
		exit;
	}	
	$username =  $_SESSION['username'];
	
	
?>


<body onload = "set_style_from_cookie()">
<div id="head" class="clearfloat" style="background-color:#FFFA00">
    
  <div id="navbar" class="clearfloat">
	<img src="images/navbar2.png" width="1300" height="20" />
  </div>
  
   <center> <img src="images/top_title.png" width="1300" align="middle" />  </center>
   <!--
  <div class="clearfloat">
  <div id="logo" class="left"> <a><img src="images/logosg.png" width="190" height="80" alt="" style="margin:5px"/></a>      
	</div>
    <div id="tagline"><strong><h1> Try Out CBT </h1></strong></div>    
  </div>
   -->
   
  <div id="navbar" class="clearfloat" height="30">
    <!-- <ul id="page-bar" class="left clearfloat" height="30">
		<li><a href="">&nbsp;</a></li>  -->
		
	 <ul id="page-bar" class="left clearfloat">

		<li><a href="homeadmin.php">Home</a></li>	
		<!--
		<li><a>Theme</a>
			<ul class="children">
				<li class="cat-item"><a href="javascript:switch_style('bright')">Bright</a></li>
				<li class="cat-item"><a href="javascript:switch_style('dark')">Dark</a></li>
			</ul>
		</li> 
		-->
		<li><a href="datasiswa.php">Data Siswa</a>
		<li><a href="datasoal.php">Data Soal</a>
		<li><a href="hasiltryout.php">Hasil Try Out</a>
		<!-- <li><a href="test.php">Insert Data</a></li> --> 
		<li><a>Insert Data</a>
			<ul class="children">
				<li class="cat-item"><a href="insertdatasiswa.php">Insert Data Siswa</a></li>
				<li class="cat-item"><a href="insertdatasoal.php">Insert Data Soal</a></li>
			</ul>
		</li>
		<li><a href="index.php">Logout</a></li>	
		</li>
    </ul>

    <form method="get" id="searchform" action="">
		<div id="search">
			<input type="text" value="" name="s" id="s" class="field" />
			<input type="submit" id="searchsubmit" value="Search" class="button" />
		</div>
    </form>	
  </div>
  
</div>

<div id="page" class="clearfloat">
  <div id="top" class="clearfloat" ">
	<?php
		echo "Username : ".$username ;
	?>    
	<!-- <div id="petunjuk"> -->
	<div class="title">Insert Data Siswa</div>		
	<div style="height:600px; overflow: scroll; background-color:#ffffff; font-size:1.0;" >
      

      	
	<?php			
	?>
	
	
	<div>
	<form method="post" action="">
		
		Isilah data-data berikut :
		</br>
		
		1.	Username : </br>
		<textarea name="username" rows="1" cols="40"></textarea>		
		</br>
		
		2.	Password : </br>
		<textarea name="password" rows="1" cols="40"></textarea>		
		</br>
		
		3.	Ulangi Password : </br>
		<textarea name="re-password" rows="1" cols="40"></textarea>		
		</br>
		
		4.	Nama Lengkap : </br>
		<textarea name="name" rows="1" cols="40"></textarea>		
		</br>
		
		5.	Sekolah : </br>
		<textarea name="school" rows="1" cols="40"></textarea>		
		</br>
		
		6.	Kelas : </br>
		<textarea name="class" rows="1" cols="40"></textarea>		
		</br>
		
		7.	Phone : </br>
		<textarea name="phone" rows="1" cols="40"></textarea>		
		</br>
		
		8.	Email : </br>
		<textarea name="email" rows="1" cols="40"></textarea>		
		</br>
		
		8.	NIS : </br>
		<textarea name="email" rows="1" cols="40"></textarea>		
		</br>
		
		8.	NISN : </br>
		<textarea name="email" rows="1" cols="40"></textarea>		
		</br>
		
		<button style="height:40px; position:absolute;  bottom:0px;  left:330px;"  type="submit" name="submitdata" id="prev">Submit</button> 
		
		</form>
	
	</div>

	
	</div>
  
</div>

<?php
require 'foot.php';
?>