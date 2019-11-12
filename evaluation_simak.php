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
	 $mysqli = new mysqli($db_server, $db_username, $db_password, $db_database_name);
	
	
	$username =  $_SESSION['username'];
    $temp = mysql_query("SELECT * FROM siswa WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $fullName = $myArray['name'];
    $school = $myArray['school'];
    $class = $myArray['class']; 
    $nis = $myArray['nis'];
    $nisn = $myArray['nisn'];
	
	// for($x=0; $x<50; $x++) {
		// echo $arrayAnswerBin[$x]." ";
	// }
	$errorMessage="";
	$isprodiSelected=false;
	$iskdComplete=false;
	$iskaComplete=false;
	$isksComplete=false;
	$prodi = array();
	$nn_prodi = array();
	$jenjang_prodi = array();
	$keputusan= array();
	
	$proditype = "";	
	for ($x = 1; $x <= 9 ; $x++) {
		$prodi[$x] = "";
		$nn_prodi[$x] = 0;
		if($x <= 3) $jenjang_prodi[$x] = "Reguler";
		else if($x <= 6) $jenjang_prodi[$x] = "Paralel";
		else if($x <= 9) $jenjang_prodi[$x] = "Vokasi";
		$keputusan[$x] = "-";
	}
		
	$result = $mysqli->query("SELECT * FROM pilihanprodi WHERE userid = '$username'");
	if($result->num_rows == 0) {
		 $errorMessage = "Anda belum memilih pilihan prodi.";
	} else {		
		$isprodiselected = true;
		while ($myArray = $result->fetch_assoc()) {
			$proditype = $myArray['type'];
			$prodi[1] = $myArray['prodireg1'];
			$prodi[2] = $myArray['prodireg2'];
			$prodi[3] = $myArray['prodireg3'];
			$prodi[4] = $myArray['prodipar1'];
			$prodi[5] = $myArray['prodipar2'];
			$prodi[6] = $myArray['prodipar3'];
			$prodi[7] = $myArray['prodivok1'];
			$prodi[8] = $myArray['prodivok2'];
			$prodi[9] = $myArray['prodivok3'];				
		}		
	}
	
	$result = $mysqli->query("SELECT * FROM  hasil_tryout_kd  WHERE userid = '$username'");
	if($result->num_rows == 0) {
		$errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KD.";
	} else {		
		$iskdComplete = true;
		while ($myArray = $result->fetch_assoc()) {	
			$kd_benar = floatval($myArray['benar']);
			$kd_salah = floatval($myArray['salah']);	
			$kd_kosong = floatval($myArray['kosong']);	
			$md_benar = floatval($myArray['mdbenar']);
			$md_salah = floatval($myArray['mdsalah']);	
			$md_kosong = floatval($myArray['mdkosong']);	
			$ind_benar = floatval($myArray['indbenar']);
			$ind_salah = floatval($myArray['indsalah']);	
			$ind_kosong = floatval($myArray['indkosong']);	
			$ing_benar = floatval($myArray['ingbenar']);
			$ing_salah = floatval($myArray['ingsalah']);	
			$ing_kosong = floatval($myArray['ingkosong']);		
		}
	}
	
	
	if(strcmp($proditype,"Saintek")==0) {
		$result = $mysqli->query("SELECT * FROM  hasil_tryout_ka  WHERE userid = '$username'");
		if($result->num_rows == 0) {			
			$errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KA.";
		} else {		
			$iskaComplete = true;
			while ($myArray = $result->fetch_assoc()) {	
				$ka_benar = floatval($myArray['benar']);
				$ka_salah = floatval($myArray['salah']);	
				$ka_kosong = floatval($myArray['kosong']);	
				$mtk_benar = floatval($myArray['mtkbenar']);
				$mtk_salah = floatval($myArray['mtksalah']);	
				$mtk_kosong = floatval($myArray['mtkkosong']);	
				$bio_benar = floatval($myArray['biobenar']);
				$bio_salah = floatval($myArray['biosalah']);	
				$bio_kosong = floatval($myArray['biokosong']);				
				$fis_benar = floatval($myArray['fisbenar']);
				$fis_salah = floatval($myArray['fissalah']);	
				$fis_kosong = floatval($myArray['fiskosong']);	
				$kim_benar = floatval($myArray['kimbenar']);
				$kim_salah = floatval($myArray['kimsalah']);	
				$kim_kosong = floatval($myArray['kimkosong']);		
			}
		}
	}
		
	// $temp = mysql_query("SELECT * FROM hasil_tryout_ka WHERE userid = '$username' ");
	// $myArray = mysql_fetch_array($temp);
	// $ka_benar = floatval($myArray['benar']);
	// $ka_salah = floatval($myArray['salah']);	
	// $ka_kosong = floatval($myArray['kosong']);	
	// $mtk_benar = floatval($myArray['mtkbenar']);
	// $mtk_salah = floatval($myArray['mtksalah']);	
	// $mtk_kosong = floatval($myArray['mtkkosong']);	
	// $bio_benar = floatval($myArray['biobenar']);
	// $bio_salah = floatval($myArray['biosalah']);	
	// $bio_kosong = floatval($myArray['biokosong']);				
	// $fis_benar = floatval($myArray['fisbenar']);
	// $fis_salah = floatval($myArray['fissalah']);	
	// $fis_kosong = floatval($myArray['fiskosong']);	
	// $kim_benar = floatval($myArray['kimbenar']);
	// $kim_salah = floatval($myArray['kimsalah']);	
	// $kim_kosong = floatval($myArray['kimkosong']);		
				
	
	if(strcmp($proditype,"Soshum")==0) {
		$result = $mysqli->query("SELECT * FROM  hasil_tryout_ks  WHERE userid = '$username'");
		if($result->num_rows == 0) {			
			$errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KS.";
		} else {		
			$isksComplete = true;
			while ($myArray = $result->fetch_assoc()) {	
				$ks_benar = floatval($myArray['benar']);
				$ks_salah = floatval($myArray['salah']);	
				$ks_kosong = floatval($myArray['kosong']);	
				$eko_benar = floatval($myArray['ekobenar']);
				$eko_salah = floatval($myArray['ekosalah']);	
				$eko_kosong = floatval($myArray['ekokosong']);	
				$sej_benar = floatval($myArray['sejbenar']);
				$sej_salah = floatval($myArray['sejsalah']);	
				$sej_kosong = floatval($myArray['sejkosong']);	
				$geo_benar = floatval($myArray['geobenar']);
				$geo_salah = floatval($myArray['geosalah']);	
				$geo_kosong = floatval($myArray['geokosong']);					
				$sos_benar = floatval($myArray['sosbenar']);
				$sos_salah = floatval($myArray['sossalah']);	
				$sos_kosong = floatval($myArray['soskosong']);	
			}
		}
	}
	
	if(strcmp($proditype,"Saintek")==0 && $iskdComplete && $iskaComplete) {
		$jumlah_benar = $kd_benar + $ka_benar;
		$jumlah_salah = $kd_salah + $ka_salah;
		$jumlah_kosong =$kd_kosong + $ka_kosong;
		
		$nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
		$nilai_baku     = number_format((($nilai_mentah - 12.67)/65.96),3);
		$nilai_nasional = number_format(500 + (100.0 * $nilai_baku), 3);

	}
	else if (strcmp($proditype,"Soshum")==0 && $iskdComplete && $isksComplete)  {		
		$jumlah_benar = $kd_benar + $ks_benar;
		$jumlah_salah = $kd_salah + $ks_salah;
		$jumlah_kosong =$kd_kosong + $ks_kosong;
		
		$nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
		$nilai_baku     = number_format((($nilai_mentah - 12.67)/65.96),3);
		$nilai_nasional = number_format(500 + (100.0 * $nilai_baku), 3);
	}
	
	if((strcmp($proditype,"Saintek")==0) || (strcmp($proditype,"Soshum")==0)) {
	
		for ($x = 1; $x <= 9 ; $x++) {
			$result = $mysqli->query("SELECT  *  FROM prodi WHERE
															peminatan = '$proditype' AND
															jenjang = '$jenjang_prodi[$x]' AND prodi='$prodi[$x]'");
			if($result->num_rows == 0) {			
			} else {		
				while ($myArray = $result->fetch_assoc()){
						$nn_prodi[$x] = floatval($myArray['nn']);	
				}
				if(($iskdComplete && $iskaComplete) || ($iskdComplete && $isksComplete))
				if($nilai_nasional >= $nn_prodi[$x] ) $keputusan[$x] = "Diterima";
				else $keputusan[$x] = "Tidak Diterima";
			}						
		}
	}
	
	//$nilai_nasional = 680;	
		    
	$saranprodi = array();
	$jenjang_saranprodi = array();
	$nn_saranprodi = array();
	$margin_saranprodi = array();
	$idx_saran=0;
	if((strcmp($proditype,"Saintek")==0 && $iskdComplete && $iskaComplete) || 
		(strcmp($proditype,"Soshum")==0 && $iskdComplete && $isksComplete)) {
		  	
		$result = $mysqli->query("SELECT * FROM  prodi  WHERE nn <= '$nilai_nasional' and peminatan='$proditype' ");
		if($result->num_rows == 0) {
			// $errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KD.";
		} else {		
			while ($row = $result->fetch_array()) {
				$saranprodi[$idx_saran] = $row['prodi'];
				$jenjang_saranprodi[$idx_saran] = $row['jenjang'];
				$nn_saranprodi[$idx_saran] = $row['nn'];
				$margin_saranprodi[$idx_saran] = number_format($nilai_nasional - $nn_saranprodi[$idx_saran], 3);
				$idx_saran = $idx_saran + 1;
			}		
		}
	}
	
	

	
  //echo "Val = " . $proditype ."  ".$ka_kosong ."  ".$iskaComplete. " " . $iskdComplete;
  //for ($x = 1; $x <= 9 ; $x++) echo "-".$prodi[$x];

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$temp = mysql_query("SELECT * FROM pilihanprodi WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	$ptn1 = $myArray['ptn1'];
	$prodi1 = $myArray['prodi1'];
	$ptn2 = $myArray['ptn2'];
	$prodi2 = $myArray['prodi2'];
	$ptn3 = $myArray['ptn3'];
	$prodi3 = $myArray['prodi3'];
	
	///////////////////////////////
	$temp = mysql_query("SELECT * FROM  hasil_tryout_tps WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$tps_benar = $myArray['benar'];
		$tps_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$tps_benar = "-";
		$tps_salah = "-";
	}
	
	$temp = mysql_query("SELECT * FROM  hasil_tryout_ipa WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$ipa_benar = $myArray['benar'];
		$ipa_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$ipa_benar = "-";
		$ipa_salah = "-";
	}
	
	$temp = mysql_query("SELECT * FROM  hasil_tryout_ips WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$ips_benar = $myArray['benar'];
		$ips_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$ips_benar = "-";
		$ips_salah = "-";
	}
	
	/////////////////////////////
	$temp = mysql_query("SELECT * FROM  hasil_tryout_tps2 WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$tps2_benar = $myArray['benar'];
		$tps2_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$tps2_benar = "-";
		$tps2_salah = "-";
	}
	
	$temp = mysql_query("SELECT * FROM  hasil_tryout_ipa2 WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$ipa2_benar = $myArray['benar'];
		$ipa2_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$ipa2_benar = "-";
		$ipa2_salah = "-";
	}
	
	$temp = mysql_query("SELECT * FROM  hasil_tryout_ips2 WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$ips2_benar = $myArray['benar'];
		$ips2_salah = $myArray['salah'] + $myArray['kosong'];
	}
	else {
		$ips2_benar = "-";
		$ips2_salah = "-";
	}
	
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


    <!-- CSS SBI Theme -->
    <link rel="stylesheet" href="assets/css/sbi-theme.css">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    
    <?php require 'header.php' ?>

    <main class="main">
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="row">
                    <div class="col-xl-5 mb-3 mb-xl-5 center">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Ringkasan Hasil Try Out</h5>
                            </div>
							
                            <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Hasil Tryout Pertama</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Mata Uji</th>     
                                            <th class="text-left">Benar</th>     
                                            <th class="text-left">Salah</th>     
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                           
                                            <tr>
                                            <td class="text-left">1.</td>
                                            <td class="text-left">Tes Potensi Skolastik (TPS)</td>
                                            <td class="text-left"><?php echo $tps_benar?> </td>
                                            <td class="text-left"><?php echo $tps_salah?> </td>
                                            </tr>  
											
											<tr>
                                            <td class="text-left">2.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Saintek</td>
                                            <td class="text-left"><?php echo $ipa_benar?> </td>
                                            <td class="text-left"><?php echo $ipa_salah?> </td>
                                            </tr>   
											
											<tr>
                                            <td class="text-left">3.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Soshum</td>
                                            <td class="text-left"><?php echo $ips_benar?> </td>
                                            <td class="text-left"><?php echo $ips_salah?> </td>
                                            </tr>   
											
                                        </tbody>
                                    </table>
                            </div>
                            </div>
							
							<div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Hasil Tryout Kedua</h5>
                            </div>
							
							<div class="card-body p-0">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Mata Uji</th>     
                                            <th class="text-left">Benar</th>     
                                            <th class="text-left">Salah</th>     
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                           
                                            <tr>
                                            <td class="text-left">1.</td>
                                            <td class="text-left">Tes Potensi Skolastik (TPS)</td>
                                            <td class="text-left"><?php echo $tps2_benar?> </td>
                                            <td class="text-left"><?php echo $tps2_salah?> </td>
                                            </tr>  
											
											<tr>
                                            <td class="text-left">2.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Saintek</td>
                                            <td class="text-left"><?php echo $ipa2_benar?> </td>
                                            <td class="text-left"><?php echo $ipa2_salah?> </td>
                                            </tr>   
											
											<tr>
                                            <td class="text-left">3.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Soshum</td>
                                            <td class="text-left"><?php echo $ips2_benar?> </td>
                                            <td class="text-left"><?php echo $ips2_salah?> </td>
                                            </tr>   
											
                                        </tbody>
                                    </table>
                            </div>
                            </div>
							
                            <div class="card-footer">
                                <a href="evaluation.php" class="btn btn-sm btn-primary">Lihat Hasil Kelulusan</a>
                            </div>
                        </div>
                        </div>																	
                    </div>
                </div>
											
				// <?php
				// if($iskdComplete) echo'
				  // <div class="row">
                    // <div class="col-xl-5 mb-3 mb-xl-5 center">
                        // <div class="card mb-3 mb-md-4">
                            // <div class="card-header border-bottom d-flex align-items-center">
                                // <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Detil Hasil Try Out KD</h5>
                            // </div>
							
                            // <div class="card-body p-0">
                                // <div class="table-responsive-xl">

                                    // <table class="table table-striped mb-0">
										// <thead>
										// <tr>
										// <th class="text-left">Mata Pelajaran</th>
										// <th class="text-center">Benar</th>
										// <th class="text-center">Salah</th>
										// <th class="text-center">Kosong</th>
										
										// </tr>
										// </thead>
										// <tbody class="table-hover">
										// <tr>
										// <td class="text-left">Matematika Dasar</td>
										// <td class="text-center">'. $md_benar.'</td>
										// <td class="text-center">'. $md_salah.'</td>
										// <td class="text-center">'. $kd_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Bahasa Indonesia</td>
										// <td class="text-center">'. $ind_benar.'</td>
										// <td class="text-center">'. $ind_salah.'</td>
										// <td class="text-center">'. $ind_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Bahasa Inggris</td>
										// <td class="text-center">'. $ing_benar.'</td>
										// <td class="text-center">'. $ing_salah.'</td>
										// <td class="text-center">'. $ing_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Jumlah KD</td>
										// <td class="text-center">'. $kd_benar.'</td>
										// <td class="text-center">'. $kd_salah.'</td>
										// <td class="text-center">'. $kd_kosong.'</td>
										// </tr>
										
										// </tbody>
										// </table>
                            	// </div>
                            // </div>
                        // </div>																	
                    // </div>
                // </div>							
				// ';				
				// ?>
				
				// <?php
				// if($iskaComplete) echo'
				  // <div class="row">
                    // <div class="col-xl-5 mb-3 mb-xl-5 center">
                        // <div class="card mb-3 mb-md-4">
                            // <div class="card-header border-bottom d-flex align-items-center">
                                // <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Detil Hasil Try Out KA</h5>
                            // </div>
							
                            // <div class="card-body p-0">
                                // <div class="table-responsive-xl">

                                    // <table class="table table-striped mb-0">
										// <thead>
										// <tr>
										// <th class="text-left">Mata Pelajaran</th>
										// <th class="text-center">Benar</th>
										// <th class="text-center">Salah</th>
										// <th class="text-center">Kosong</th>
										
										// </tr>
										// </thead>
										// <tbody class="table-hover">
										// <tr>
										// <td class="text-left">Matematika</td>
										// <td class="text-center">'. $mtk_benar.'</td>
										// <td class="text-center">'. $mtk_salah.'</td>
										// <td class="text-center">'. $mtk_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Biologi</td>
										// <td class="text-center">'. $bio_benar.'</td>
										// <td class="text-center">'. $bio_salah.'</td>
										// <td class="text-center">'. $bio_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Fisika</td>
										// <td class="text-center">'. $fis_benar.'</td>
										// <td class="text-center">'. $fis_salah.'</td>
										// <td class="text-center">'. $fis_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Kimia</td>
										// <td class="text-center">'. $kim_benar.'</td>
										// <td class="text-center">'. $kim_salah.'</td>
										// <td class="text-center">'. $kim_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Jumlah KA</td>
										// <td class="text-center">'. $ka_benar.'</td>
										// <td class="text-center">'. $ka_salah.'</td>
										// <td class="text-center">'. $ka_kosong.'</td>
										// </tr>
										
										// </tbody>
										// </table>
                            	// </div>
                            // </div>
                        // </div>																	
                    // </div>
                // </div>							
				// ';				
				// ?>
				
				// <?php
				// if($isksComplete) echo'
				  // <div class="row">
                    // <div class="col-xl-5 mb-3 mb-xl-5 center">
                        // <div class="card mb-3 mb-md-4">
                            // <div class="card-header border-bottom d-flex align-items-center">
                                // <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Detil Hasil Try Out KS</h5>
                            // </div>
							
                            // <div class="card-body p-0">
                                // <div class="table-responsive-xl">

                                    // <table class="table table-striped mb-0">
										// <thead>
										// <tr>
										// <th class="text-left">Mata Pelajaran</th>
										// <th class="text-center">Benar</th>
										// <th class="text-center">Salah</th>
										// <th class="text-center">Kosong</th>
										
										// </tr>
										// </thead>
										// <tbody class="table-hover">
										// <tr>
										// <td class="text-left">Ekonomi</td>
										// <td class="text-center">'. $eko_benar.'</td>
										// <td class="text-center">'. $eko_salah.'</td>
										// <td class="text-center">'. $eko_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Sejarah</td>
										// <td class="text-center">'. $sej_benar.'</td>
										// <td class="text-center">'. $sej_salah.'</td>
										// <td class="text-center">'. $sej_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Geogragi</td>
										// <td class="text-center">'. $geo_benar.'</td>
										// <td class="text-center">'. $geo_salah.'</td>
										// <td class="text-center">'. $geo_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Sosiologi</td>
										// <td class="text-center">'. $sos_benar.'</td>
										// <td class="text-center">'. $sos_salah.'</td>
										// <td class="text-center">'. $sos_kosong.'</td>
										// </tr>
										// <tr>
										// <td class="text-left">Jumlah KS</td>
										// <td class="text-center">'. $ks_benar.'</td>
										// <td class="text-center">'. $ks_salah.'</td>
										// <td class="text-center">'. $ks_kosong.'</td>
										// </tr>
										
										// </tbody>
										// </table>
                            	// </div>
                            // </div>
                        // </div>																	
                    // </div>
                // </div>							
				// ';				
				// ?>
				
			
                <div class="row mt-3">

                    <div class="col-xl-5 mb-3 mb-xl-5 center">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Hasil Pengolahan Nilai</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive-xl">
                                	<table class="table table-striped mb-0">
										<thead>
										<tr>
										<th class="text-left">Penilaian</th>
										<th class="text-center">Nilai</th>		
										</tr>
										</thead>
										
										<tbody class="table-hover">
										
										<tr>
										<td class="text-left">Nilai Mentah (NM)</td>
										<td class="text-center"><?php echo $nilai_mentah ?> </td>
										</tr>
										
										<tr>
										<td class="text-left">Nilai Baku (NB)</td>
										<td class="text-center"><?php echo $nilai_baku ?> </td>
										</tr>
										
										<tr>
										<td class="text-left">Nilai Nasional (NN)</td>
										<td class="text-center"><?php echo $nilai_nasional ?> </td>
										</tr>
										
										</tbody>
										</table>
                            	</div>
                            </div>
                        </div>
                    </div>

                </div>
				
				<?php
				if ((strcmp($proditype,"Saintek")==0 ) ||(strcmp($proditype,"Soshum")==0 ))
				{
				echo'
                <div class="row mt-3">
                    <div class="col-7 mb-3 mb-xl-5 center">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Kelulusan</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive-xl">

                                    		<table class="table table-striped mb-0">
												<thead>
												<tr>
												<th class="text-center">No</th>
												<th class="text-left">Prodi Pilihan</th>
												<th class="text-left">Jenjang</th>
												<th class="text-center">NN Prodi</th>		
												<th class="text-center">NN Siswa</th>		
												<th class="text-center">Hasil</th>		
												</tr>
												</thead>
												
												<tbody class="table-hover">
				';
												
												for($x = 1; $x <= 9; $x++) {
														echo '
														<tr>
														<td class="text-center">'.$x.'</td>														
														<td class="text-left">'.$prodi[$x].'</td>														
														<td class="text-center">'.$jenjang_prodi[$x].'</td>
														<td class="text-center">'.$nn_prodi[$x].'</td>
														<td class="text-center">'.$nilai_nasional.'</td>
														<td class="text-center">'.$keputusan[$x].'</td>
														</tr>
													 ';
												}
											
												 
												
											
					echo '							
												</tbody>
												</table>
                            	</div>
							</div>
                        </div>
                    </div>

                </div>
				';
				}
				?>
				
				
				<?php
				if ((strcmp($proditype,"Saintek")==0 && $iskdComplete && $iskaComplete) || 
				 (strcmp($proditype,"Soshum")==0 && $iskdComplete && $isksComplete)) 
				{
				echo'
                <div class="row mt-3">
                    <div class="col-7 mb-3 mb-xl-5 center">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Saran Prodi</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive-xl">

                                    		<table class="table table-striped mb-0">
												<thead>
												<tr>
												<th class="text-center">No</th>
												<th class="text-left">Prodi Pilihan</th>
												<th class="text-center">Jenjang</th>
												<th class="text-center">NN Prodi</th>		
												<th class="text-center">NN Siswa</th>		
												<th class="text-center">Margin</th>		
												</tr>
												</thead>
												
												<tbody class="table-hover">
				';
												
												for($x = 0; $x<$idx_saran; $x++) {
														echo '
														<tr>
														<td class="text-center">'.$x.'</td>														
														<td class="text-left">'.$saranprodi[$x].'</td>														
														<td class="text-center">'.$jenjang_saranprodi[$x].'</td>
														<td class="text-center">'.$nn_saranprodi[$x].'</td>
														<td class="text-center">'.$nilai_nasional.'</td>
														<td class="text-center">'.$margin_saranprodi[$x].'</td>
														</tr>
													 ';
												}
											
												 
												
											
					echo '							
												</tbody>
												</table>
							';
							if ($idx_saran == 0) echo "Note : Belum ada saran yang sesuai dengan nilai nasional (NN) anda";
							
                     echo'       	</div>
                            </div>
                        </div>
                    </div>

                </div>
				';
				}
				?>
				
				
                <div class="row">
                	<div class="col-xl-5 mb-3 mb-xl-5 center">
                    	<center>
                    		<a class="btn btn-primary" href="home.php">Ke Halaman Home</a>
                    	</center>
                	</div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="small bg-white p-3 px-md-4 mt-auto d-print-none">
        <div class="col-lg text-center">
            &copy; 2020 Developed By Sanggar Belajar Indonesia. All Rights Reserved.
        </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Implementing Libraries -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/vendor/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/vendor/chartist/dist/chartist.min.js"></script>
    <script src="assets/vendor/chartist-bar-labels/src/scripts/chartist-bar-labels.js"></script>
    <script src="assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/vendor/resize-sensor/dist/resizeSensor.min.js"></script>
    <script src="assets/vendor/jquery-shorten/src/jquery.shorten.js"></script>
    <script src="assets/vendor/visavail-custom/js/visavail.js"></script>
    <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>

    <!-- JS Nova -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="assets/js/components/hs.side-nav.js"></script>
    <script src="assets/js/components/hs.unfold.js"></script>
    <script src="assets/js/components/hs.flatpickr.js"></script>
    <script src="assets/js/components/hs.header-search.js"></script>
    <script src="assets/js/components/hs.select2.js"></script>
    <script src="assets/js/components/hs.chartist-area.js"></script>
    <script src="assets/js/components/hs.chartist-bar.js"></script>
    <script src="assets/js/components/hs.chartist-donut.js"></script>
    <script src="assets/js/components/hs.visavail-timeline.js"></script>
    <script src="assets/js/components/hs.clipboard.js"></script>

    <!-- JS Libraries Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of custom scroll
            $.HSCore.components.HSMalihuScrollBar.init($('.js-custom-scroll'));

            // initialization of sidebar navigation component
            $.HSCore.components.HSSideNav.init('.js-side-nav');

            // initialization of dropdown component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                unfoldHideOnScroll: false,
                afterOpen: function() {
                    // initialization of charts
                    $.HSCore.components.HSChartistBar.init('#activity .js-bar-chart');

                    setTimeout(function() {
                        $('#activity .js-bar-chart').css('opacity', 1);
                    }, 100);

                    // help function for accordions in hidden block
                    $('#headerProjects .accordion-header').on('click', function() {
                        // vars
                        var target = $(this).data('target');

                        $(target).collapse('show');
                    });
                }
            });

            // initialization of range datepicker
            $.HSCore.components.HSFlatpickr.init('#headerRightSidebarDatepicker', {
                locale: {
                    weekdays: {
                        shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
                    }
                },
                nextArrow: '<i class="nova-arrow-right icon-text icon-text-xs"></i>',
                prevArrow: '<i class="nova-arrow-left icon-text icon-text-xs"></i>'
            });
            $.HSCore.components.HSFlatpickr.init('#rangeDatepicker2');
            $.HSCore.components.HSFlatpickr.init('#rangeDatepicker, #rangeDatepickerSales', {
                locale: {
                    weekdays: {
                        shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
                    },
                    rangeSeparator: ' - '
                },
                nextArrow: '<em class="nova-arrow-right"></em>',
                prevArrow: '<em class="nova-arrow-left"></em>'
            });

            // initialization of show on type module
            $.HSCore.components.HSHeaderSearch.init('.js-header-search');

            // initialization of show on type module
            $.HSCore.components.HSSelect2.init('.js-custom-select');

            // initialization of charts
            $.HSCore.components.HSChartistArea.init('.js-area-chart');
            $.HSCore.components.HSChartistBar.init('.js-bar-chart');
            $.HSCore.components.HSChartistDonut.init('.js-donut-chart');
            $.HSCore.components.HSVisavailTimeline.init('#chartTimeline');

            // initialization of clipboard
            $.HSCore.components.HSClipboard.init('.js-clipboard');

            $("input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    var group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                } else {
                    $box.prop("checked", false);
                }
            });
        });
    </script>
</body>

</html>