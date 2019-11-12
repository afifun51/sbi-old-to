<?php
require 'access.php';
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
	
	
	// for($x=0; $x<50; $x++) {
		// echo $arrayAnswerBin[$x]." ";
	// }
	
	$temp = mysql_query("SELECT * FROM hasil_tryout_kd WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	$kd_benar = floatval($myArray['benar']);
	$kd_salah = floatval($myArray['salah']);	
	$kd_kosong = floatval($myArray['kosong']);	
	
		
	$temp = mysql_query("SELECT * FROM hasil_tryout_ka WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	$ka_benar = floatval($myArray['benar']);
	$ka_salah = floatval($myArray['salah']);	
	$ka_kosong = floatval($myArray['kosong']);	
	
	
	$jumlah_benar = $kd_benar + $ka_benar;
	$jumlah_salah = $kd_salah + $ka_salah;
	$jumlah_kosong =$kd_kosong + $ka_kosong;
	
	$nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
	$nilai_baku     = ($nilai_mentah - 12.67)/65.96;
	$nilai_nasional = 500 + (100.0 * $nilai_baku);

	
	$prodi1 = "Ilmu Komputer - Reguler";
	$prodi2 = "Teknik Kimia - Reguler";
	$prodi3 = "Teknik Elektro - Reguler";	
	$nn_prodi1 = 695.6807;
	$nn_prodi2 = 681.7731;
	$nn_prodi3 = 678.7929;
	
	$keputusan1 = "NA";
	$keputusan2 = "NA";
    $keputusan3 = "NA";	

    if($nilai_nasional > $nn_prodi1) $keputusan1 = "Diterima";
	else $keputusan1 = "Tidak diterima";
	if($nilai_nasional > $nn_prodi2) $keputusan2 = "Diterima";
	else $keputusan2 = "Tidak diterima";
	if($nilai_nasional > $nn_prodi3) $keputusan3 = "Diterima";
	else $keputusan3 = "Tidak diterima";
	

	
	
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
<link rel="stylesheet" href="css/newtablestyle.css">


<link rel="stylesheet" href="css/bootstrap.min.css">
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
        <li><a href="evaluation.php" class="smoothScroll">EVALUATION</a></li>
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
	</br>
		<h2>Ringkasan Hasil Tryout.</h2>
		
		<table class="table-fill">
		<thead>
		<tr>
		<th class="text-left">Mata UJI</th>
		<th class="text-left">Benar</th>
		<th class="text-left">Salah</th>
		<th class="text-left">Kosong</th>
		
		</tr>
		</thead>
		<tbody class="table-hover">
		<tr>
		<td class="text-left">Kemampuan Dasar (KD)</td>
		<td class="text-left"><?php echo $kd_benar ?> </td>
		<td class="text-left"><?php echo $kd_salah ?></td>
		<td class="text-left"><?php echo $kd_kosong ?></td>
		</tr>
		<tr>
		<td class="text-left">Kemampuan Alam (KA)</td>
		<td class="text-left"><?php echo $ka_benar ?> </td>
		<td class="text-left"><?php echo $ka_salah ?></td>
		<td class="text-left"><?php echo $ka_kosong ?></td>
		</tr>
		<tr>
		<td class="text-left">Jumlah</td>
		<td class="text-left"><?php echo $jumlah_benar ?> </td>
		<td class="text-left"><?php echo $jumlah_salah ?></td>
		<td class="text-left"><?php echo $jumlah_kosong ?></td>
		</tr>
		</tbody>
		</table>
		
		
		
		<h2>Hasil Pengolahan Nilai</h2>
		<table class="table-fill">
		<thead>
		<tr>
		<th class="text-left">Penilaian</th>
		<th class="text-left">Nilai</th>		
		</tr>
		</thead>
		
		<tbody class="table-hover">
		
		<tr>
		<td class="text-left">Nilai Mentah (NM)</td>
		<td class="text-left"><?php echo $nilai_mentah ?> </td>
		</tr>
		
		<tr>
		<td class="text-left">Nilai Baku (NB)</td>
		<td class="text-left"><?php echo $nilai_baku ?> </td>
		</tr>
		
		<tr>
		<td class="text-left">Nilai Nasional (NN)</td>
		<td class="text-left"><?php echo $nilai_nasional ?> </td>
		</tr>
		
		</tbody>
		</table>
		
		
		<h2>Kelulusan</h2>
		<table class="table-fill">
		<thead>
		<tr>
		<th class="text-left">Prodi Pilihan</th>
		<th class="text-left">NN Prodi</th>		
		<th class="text-left">NN Siswa</th>		
		<th class="text-left">NN Hasil</th>		
		</tr>
		</thead>
		
		<tbody class="table-hover">
		
		<tr>
		<td class="text-left"> <?php echo $prodi1 ?> </td>
		<td class="text-left"><?php echo $nn_prodi1 ?> </td>
		<td class="text-left"><?php echo $nilai_nasional?> </td>
		<td class="text-left"><?php echo $keputusan1?> </td>
		</tr>
		
		<tr>
		<td class="text-left"> <?php echo $prodi2 ?> </td>
		<td class="text-left"><?php echo $nn_prodi2 ?> </td>
		<td class="text-left"><?php echo $nilai_nasional?> </td>
		<td class="text-left"><?php echo $keputusan2?> </td>
		</tr>
		
		<tr>
		<td class="text-left"> <?php echo $prodi3 ?> </td>
		<td class="text-left"><?php echo $nn_prodi3 ?> </td>
		<td class="text-left"><?php echo $nilai_nasional?> </td>
		<td class="text-left"><?php echo $keputusan3?> </td>
		</tr>
		
	
		
		</tbody>
		</table>
		
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
<!--
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>
-->
<!-- copyright section -->
<!--
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p>&copy; 2016. All Rights Reserved </a></p>
      </div>
    </div>
  </div>
</div>
-->



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