<?php
require 'access.php';
require 'head.php';
require 'kocokan.php';
?>

<script	type ="text/javascript">

// history.pushState(null, null, 'get_tryout.php');
// window.addEventListener('popstate', function(event) {
// history.pushState(null, null, 'get_tryout.php');
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
	
	 $today = date("Y-m-d");
	 // echo "Hari ini : ".time();
	 // echo "Start : ".strtotime("12:00");
	 // echo "End : ".strtotime("14:00");
	
	
	
	$username =  $_SESSION['username'];
	
	$temp = mysql_query("SELECT * FROM jadwal WHERE userid = '$username'");	
	$myArray = mysql_fetch_array($temp);
	$sesi = $myArray['sesi'];
	$random_bin = $myArray['random_bin'];
	$random_mat = $myArray['random_mat'];
	$random_bing = $myArray['random_bing'];
	$random_ipa = $myArray['random_ipa'];
	$random_pg = $myArray['random_pg'];
	$isactive = $myArray['isactive'];
	
	
	
	
	
	$_SESSION['kocokan_pg'] = $random_pg;
		
	//check sesi, kalau gak sesuai langsung balik	
	
	if (isset($_POST['latihan'])) {
		$startTime=time();
		$endTime=time()+2700;    // time is on second
		$qNumber=1;
		$numberOfQuestion =  10;
		$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
		
		$_SESSION['username']=$username;
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		$_SESSION['qNumber'] = $qNumber;		
		$_SESSION['subject'] = 'Matematika';
		
		$_SESSION['answer'] = array();
		$_SESSION['kunci'] = array();
		$_SESSION['mark'] = array();
		
		//Mark => 0:blank, 1:sure, 3:doubt
		for ($x = 1; $x <= $numberOfQuestion ; $x++) {
			$_SESSION['answer'][$x] = '_';
			$_SESSION['mark'][$x] = 0;
		} 
		
		header('location: tryout_latihan.php');
		exit;	
	}
	
	
	
	if (isset($_POST['tryoutbin'])) {
		
		$checkDay=checkDayBIN(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
					
			//window.location("homesiswa.php");			
			
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  50;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Bahasa Indonesia';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bin'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bin'] = getKocokanBin($random_bin);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			header('location: tryout_bin.php');
			$_SESSION['realtryout'] = true;
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Indonesia hanya dapat dilaksanakan pada hari Senin 28 November 2016 ".'\n'.
						//"";
					   "Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			
			
			//echo '<a href="http://stackoverflow.com" onclick="return confirm('Are you sure?');">My Link</a>';
			// $confirmation=confirm("Apakah anda yakin untuk memulai tryout sekarang?");
			// if($confirmation) {
				// //
			// } else {
				// header('location: homesiswa.php');		
				// exit;	
			// }
			
			
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  50;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Bahasa Indonesia';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bin'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bin'] = getKocokanBin($random_bin);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_bin.php');
			exit;	
				
		}		
		
	}	
	
	
	if (isset($_POST['tryoutbing'])) {
		
		$checkDay=checkDayBING(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  50;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Bahasa Inggris';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bing'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bing'] = getKocokanBing($random_bing);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_bing.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Inggris hanya dapat dilaksanakan pada hari Rabu 30 November 2016 ".'\n'.
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  50;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Bahasa Inggris';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bing'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bing'] = getKocokanBing($random_bing);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_bing.php');
			exit;	
				
		}		
		
	}



	if (isset($_POST['tryoutmat'])) {
		
		$checkDay=checkDayMAT(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  40;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Matematika';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_mat'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_mat'] = getKocokanMatIpa($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Matematika hanya dapat dilaksanakan pada hari Selasa 29 November 2016 ".'\n'. 
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  40;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'Matematika';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_mat'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_mat'] = getKocokanMatIpa($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat.php');
			exit;	
		}		
		
	}

	if (isset($_POST['tryoutipa'])) {
		
		$checkDay=checkDayIPA(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  40;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'IPA Terpadu';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ipa'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ipa'] = getKocokanMatIpa($random_ipa);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran IPA Terpadu hanya dapat dilaksanakan pada hari  Kamis 1 Desember 2016 ".'\n'. 
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  40;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'IPA Terpadu';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ipa'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ipa'] = getKocokanMatIpa($random_ipa);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_ipa.php');
			exit;		
		}		
		
	}		

	

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Superfresh Bootstrap Template</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<!-- 
Superfresh Template
http://www.templatemo.com/free-website-templates/
-->
<!-- stylesheet css -->
<link rel="stylesheet" href="css/login_style.css" type="text/css" title = "bright" media="screen" />
<link rel="stylesheet 2" href="css/login_reset.css" type="text/css" title = "dark" media="screen" />
<link rel="stylesheet" href="css/mystyle.css" type="text/css" title = "bright" media="screen" />
<link rel="stylesheet 2" href="css/mystyle2.css" type="text/css" title = "dark" media="screen" />


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">


<!-- google web font css -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" id="top">
<!-- navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span></button>
      <a href="#" class="navbar-brand" style="background-color:#ffd310;">Try Out CBT</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homesiswa.php" class="smoothScroll">HOME</a></li>
        <li><a href="get_tryout.php" class="smoothScroll">TRY OUT</a></li>
        <!--
        <li><a href="evaluation.php" class="smoothScroll">EVALUATION</a></li>
		-->
		<li><a href="index.php" class="smoothScroll">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- Opsi-->
<div id="service">
  <div class="container">
   <?php
		echo "Username : ".$username ;
	?>
    <div id="petunjuk">
      <div class="title">Selamat Datang di Sistem Try Out CBT</div>
	  <p style="font-size: 14pt; space:1.5;" >
		Petunjuk Pengerjaan </br>	
		1. Kerjakan soal sesuai kemampuan anda, dilarang membuka buku atau catatan, menyontek, dan memberikan jawaban kepada peserta lain </br>
		2. Gunakan kertas buram yang disediakan apabila diperlukan untuk membantu pengerjaan </br>
		3. Pilihlah salah satu jawaban anda yang paling tepat. Anda dapat mengerjakan soal-soal yang mudah terlebih dahulu </br>
		   Gunakan tombol "<" untuk menuju ke soal sebelumnya dan tombol ">" untuk menuju ke soal selanjutnya </br>
		4. Apabila anda sudah selesai mengerjakan tekan tombol "Selesai" </br>
		5. Perhatikan sisa waktu yang tersedia untuk mengerjakan soal </br>
		6. Klik tombol mata pelajaran yang kalian pilih untuk memulai mengerjakan soal </br>
		</br>
		Selamat Mengerjakan !
		</br>
	  </p>
	  
	  <table style="font-size: 12pt" cellspacing="0" cellpadding="0" border="0" width="1000">			
			<tbody>
				<tr  align="center">
				<td><a><img href=""  src="images/icon_bahasa.png" width="120" height="120" alt="" /></td>
				<td><a> <img href="get_tryout.php" name="tryoutmat" src="images/icon_mat.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/icon_english.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/icon_ipa.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/excercise.png" width="120" height="120" alt="" /></td>
				</tr>
				<!--
				<tr  align="center">
				<td><h4> Matematika </h4></td>
				<td><h4> Bahasa Indonesia </h4></td>
				<td><h4> Bahasa Inggris </h4></td>
				<td><h4> IPA </h4></td>
				</tr> -->
				<tr  align="center">
				<!-- <td><form method="post" action=""><a href="" class="navbar-brand" style="background-color:#ffd310;">Try Out CBT</a></div> -->
				
				
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutbin" >Bhs. Indonesia</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;" type="submit" name="tryoutmat" >Matematika</button></form></td>				
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutbing" >Bhs. Inggris</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutipa" >IPA</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="latihan" >Latihan</button></form></td>
				</tr>
			</tbody>
		</table>	   	  
	</div>	
  </div>
</div>


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h2>Office.</h2>
        <p>Jalan Kapuk 31 Kel. Pondok Cina Kec. Beji Kota Depok 16424</p>
        <p>Email: <span>sanggarbelajarr@gmail.com</span></p>
        <p>Phone: <span>+6285274163232</span></p>
      </div>
      <div class="col-md-6 col-sm-6">
        <h2>Social Us.</h2>
        <ul class="social-icons">
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
          <li><a href="#" class="fa fa-dribbble"></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>
<!-- copyright section -->
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p>&copy; 2016. All Rights Reserved </a></p>
      </div>
    </div>
  </div>
</div>
<!-- scrolltop section --> 
<a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a> 
<!-- javascript js --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.nav.js"></script> 
<script src="js/isotope.js"></script> 
<script src="js/imagesloaded.min.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>