<?php
require 'access.php';
require 'head.php';
require 'kocokan.php';
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
        <li><a href="homeadmin.php" class="smoothScroll">HOME</a></li>
        <li><a href="datasiswa.php" class="smoothScroll">SISWA</a></li>
		<li><a href="datasoal.php" class="smoothScroll">SOAL</a></li>
        <li><a href="hasilto.php" class="smoothScroll">EVALUATION</a></li>
		<li><a href="index.php" class="smoothScroll">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- home section -->
<div id="service">
  <div class="container">
		<a href="data/hasilTO.xlsx" class="btn btn-default smoothScroll" style="background-color:#ffd310;" >Unduh Excel</a>
		<h2>Data Tryout All </h2>
		<table class="table-fill" >
		<?php
		$result = mysql_query("SELECT * FROM hasil_tryout_all");		
		echo "<table>";
		$number = 1;
		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
			echo "<tr><td>". $number . "</td><td>". $row['userid'] . 
			"</td><td>" . $row['name'] . "</td><td>" . $row['school'] .
			"</td><td>" . $row['class'] .
			"</td><td>" .$row['nis'] . "</td><td>" . $row['nisn'] . "</td><td>" . "   ".$row['nilaibin'] . "   " .
			"</td><td>" . "   " .$row['nilaimat'] ."   ". "</td><td>" ."   ". $row['nilaibing'] . "   "."</td><td>" . $row['nilaiipa'] .
			"</td></tr>";  //$row['index'] the index here is a field name
			$number =  $number +1;
		}
		?>
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