<?php
require 'access.php';
require 'kocokan.php';
require 'meanandstdevprodi.php';

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
	
	// $proditype = "";	
	// for ($x = 1; $x <= 9 ; $x++) {
		// $prodi[$x] = "";
		// $nn_prodi[$x] = 0;
		// if($x <= 3) $jenjang_prodi[$x] = "Reguler";
		// else if($x <= 6) $jenjang_prodi[$x] = "Paralel";
		// else if($x <= 9) $jenjang_prodi[$x] = "Vokasi";
		// $keputusan[$x] = "-";
	// }
		
	// $result = $mysqli->query("SELECT * FROM pilihanprodi WHERE userid = '$username'");
	// if($result->num_rows == 0) {
		 // $errorMessage = "Anda belum memilih pilihan prodi.";
	// } else {		
		// $isprodiselected = true;
		// while ($myArray = $result->fetch_assoc()) {
			// $proditype = $myArray['type'];
			// $prodi[1] = $myArray['prodireg1'];
			// $prodi[2] = $myArray['prodireg2'];
			// $prodi[3] = $myArray['prodireg3'];
			// $prodi[4] = $myArray['prodipar1'];
			// $prodi[5] = $myArray['prodipar2'];
			// $prodi[6] = $myArray['prodipar3'];
			// $prodi[7] = $myArray['prodivok1'];
			// $prodi[8] = $myArray['prodivok2'];
			// $prodi[9] = $myArray['prodivok3'];				
		// }		
	// }
	
	// $result = $mysqli->query("SELECT * FROM  hasil_tryout_kd  WHERE userid = '$username'");
	// if($result->num_rows == 0) {
		// $errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KD.";
	// } else {		
		// $iskdComplete = true;
		// while ($myArray = $result->fetch_assoc()) {	
			// $kd_benar = floatval($myArray['benar']);
			// $kd_salah = floatval($myArray['salah']);	
			// $kd_kosong = floatval($myArray['kosong']);	
			// $md_benar = floatval($myArray['mdbenar']);
			// $md_salah = floatval($myArray['mdsalah']);	
			// $md_kosong = floatval($myArray['mdkosong']);	
			// $ind_benar = floatval($myArray['indbenar']);
			// $ind_salah = floatval($myArray['indsalah']);	
			// $ind_kosong = floatval($myArray['indkosong']);	
			// $ing_benar = floatval($myArray['ingbenar']);
			// $ing_salah = floatval($myArray['ingsalah']);	
			// $ing_kosong = floatval($myArray['ingkosong']);		
		// }
	// }
	
	
	// if(strcmp($proditype,"Saintek")==0) {
		// $result = $mysqli->query("SELECT * FROM  hasil_tryout_ka  WHERE userid = '$username'");
		// if($result->num_rows == 0) {			
			// $errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KA.";
		// } else {		
			// $iskaComplete = true;
			// while ($myArray = $result->fetch_assoc()) {	
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
			// }
		// }
	// }
		
	// // $temp = mysql_query("SELECT * FROM hasil_tryout_ka WHERE userid = '$username' ");
	// // $myArray = mysql_fetch_array($temp);
	// // $ka_benar = floatval($myArray['benar']);
	// // $ka_salah = floatval($myArray['salah']);	
	// // $ka_kosong = floatval($myArray['kosong']);	
	// // $mtk_benar = floatval($myArray['mtkbenar']);
	// // $mtk_salah = floatval($myArray['mtksalah']);	
	// // $mtk_kosong = floatval($myArray['mtkkosong']);	
	// // $bio_benar = floatval($myArray['biobenar']);
	// // $bio_salah = floatval($myArray['biosalah']);	
	// // $bio_kosong = floatval($myArray['biokosong']);				
	// // $fis_benar = floatval($myArray['fisbenar']);
	// // $fis_salah = floatval($myArray['fissalah']);	
	// // $fis_kosong = floatval($myArray['fiskosong']);	
	// // $kim_benar = floatval($myArray['kimbenar']);
	// // $kim_salah = floatval($myArray['kimsalah']);	
	// // $kim_kosong = floatval($myArray['kimkosong']);		
				
	
	// if(strcmp($proditype,"Soshum")==0) {
		// $result = $mysqli->query("SELECT * FROM  hasil_tryout_ks  WHERE userid = '$username'");
		// if($result->num_rows == 0) {			
			// $errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KS.";
		// } else {		
			// $isksComplete = true;
			// while ($myArray = $result->fetch_assoc()) {	
				// $ks_benar = floatval($myArray['benar']);
				// $ks_salah = floatval($myArray['salah']);	
				// $ks_kosong = floatval($myArray['kosong']);	
				// $eko_benar = floatval($myArray['ekobenar']);
				// $eko_salah = floatval($myArray['ekosalah']);	
				// $eko_kosong = floatval($myArray['ekokosong']);	
				// $sej_benar = floatval($myArray['sejbenar']);
				// $sej_salah = floatval($myArray['sejsalah']);	
				// $sej_kosong = floatval($myArray['sejkosong']);	
				// $geo_benar = floatval($myArray['geobenar']);
				// $geo_salah = floatval($myArray['geosalah']);	
				// $geo_kosong = floatval($myArray['geokosong']);					
				// $sos_benar = floatval($myArray['sosbenar']);
				// $sos_salah = floatval($myArray['sossalah']);	
				// $sos_kosong = floatval($myArray['soskosong']);	
			// }
		// }
	// }
	
	// if(strcmp($proditype,"Saintek")==0 && $iskdComplete && $iskaComplete) {
		// $jumlah_benar = $kd_benar + $ka_benar;
		// $jumlah_salah = $kd_salah + $ka_salah;
		// $jumlah_kosong =$kd_kosong + $ka_kosong;
		
		// $nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
		// $nilai_baku     = number_format((($nilai_mentah - 12.67)/65.96),3);
		// $nilai_nasional = number_format(500 + (100.0 * $nilai_baku), 3);

	// }
	// else if (strcmp($proditype,"Soshum")==0 && $iskdComplete && $isksComplete)  {		
		// $jumlah_benar = $kd_benar + $ks_benar;
		// $jumlah_salah = $kd_salah + $ks_salah;
		// $jumlah_kosong =$kd_kosong + $ks_kosong;
		
		// $nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
		// $nilai_baku     = number_format((($nilai_mentah - 12.67)/65.96),3);
		// $nilai_nasional = number_format(500 + (100.0 * $nilai_baku), 3);
	// }
	
	// if((strcmp($proditype,"Saintek")==0) || (strcmp($proditype,"Soshum")==0)) {
	
		// for ($x = 1; $x <= 9 ; $x++) {
			// $result = $mysqli->query("SELECT  *  FROM prodi WHERE
															// peminatan = '$proditype' AND
															// jenjang = '$jenjang_prodi[$x]' AND prodi='$prodi[$x]'");
			// if($result->num_rows == 0) {			
			// } else {		
				// while ($myArray = $result->fetch_assoc()){
						// $nn_prodi[$x] = floatval($myArray['nn']);	
				// }
				// if(($iskdComplete && $iskaComplete) || ($iskdComplete && $isksComplete))
				// if($nilai_nasional >= $nn_prodi[$x] ) $keputusan[$x] = "Diterima";
				// else $keputusan[$x] = "Tidak Diterima";
			// }						
		// }
	// }
	
	// //$nilai_nasional = 680;			    
	// $saranprodi = array();
	// $jenjang_saranprodi = array();
	// $nn_saranprodi = array();
	// $margin_saranprodi = array();
	// $idx_saran=0;
	// if((strcmp($proditype,"Saintek")==0 && $iskdComplete && $iskaComplete) || 
		// (strcmp($proditype,"Soshum")==0 && $iskdComplete && $isksComplete)) {
		  	
		// $result = $mysqli->query("SELECT * FROM  prodi  WHERE nn <= '$nilai_nasional' and peminatan='$proditype' ");
		// if($result->num_rows == 0) {
			// // $errorMessage = $errorMessage. " Anda belum menyelesaikan tryout KD.";
		// } else {		
			// while ($row = $result->fetch_array()) {
				// $saranprodi[$idx_saran] = $row['prodi'];
				// $jenjang_saranprodi[$idx_saran] = $row['jenjang'];
				// $nn_saranprodi[$idx_saran] = $row['nn'];
				// $margin_saranprodi[$idx_saran] = number_format($nilai_nasional - $nn_saranprodi[$idx_saran], 3);
				// $idx_saran = $idx_saran + 1;
			// }		
		// }
	// }
	
	

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
	$nn1 = $nn2 = "";
	$peminatan1 = $peminatan2 = "";
	$kelulusan1 = $kelulusan2 = "";
	$nnsiswa = 0;
	$ipaipsipc = 0;
	
	// if($prodi3==NULL) {
		// $ptn3 = "-";
		// $prodi3 = "-";
	// }
	if($prodi1 != NULL){
		$temp = mysql_query("SELECT * FROM prodi WHERE ptn = '$ptn1' AND prodi = '$prodi1' ");
		$myArray = mysql_fetch_array($temp);
		$nn1 = $myArray['nn'];
		$peminatan1 = $myArray['peminatan'];
	}
	if($prodi2 != NULL){
		$temp = mysql_query("SELECT * FROM prodi WHERE ptn  = '$ptn2' AND prodi = '$prodi2' ");
		$myArray = mysql_fetch_array($temp);
		$nn2 = $myArray['nn'];
		$peminatan2 = $myArray['peminatan'];
	}
	
	
	
	///////////////////////////////
	$isTPS1Done = $isIPA1Done = $isIPS1Done = false;
	$isTPS2Done = $isIPA2Done = $isIPS2Done = false;
	$temp = mysql_query("SELECT * FROM  hasil_tryout_tps WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);
	if($myArray) {
		$tps_benar = $myArray['benar'];
		$tps_salah = $myArray['salah'] + $myArray['kosong'];
		$isTPS1Done = true;
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
		$isIPA1Done = true;
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
		$isIPS1Done = true;
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
		$isTPS2Done = true;
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
		$isIPA2Done = true;
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
		$isIPS2Done = true;
	}
	else {
		$ips2_benar = "-";
		$ips2_salah = "-";
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$scoreTPS1 = array();
	$scoreTPS2 = array();
	$scoreTPSM = array();
	$scoreTPS1['kpu'] = $scoreTPS1['kk'] = $scoreTPS1['ppu']  = $scoreTPS1['kmbm']  = 0;
	$scoreTPS2['kpu'] = $scoreTPS2['kk'] = $scoreTPS2['ppu']  = $scoreTPS2['kmbm']  = 0;
	$scoreTPSM['kpu'] = $scoreTPSM['kk'] = $scoreTPSM['ppu']  = $scoreTPSM['kmbm']  = 0;
	
	$scoreIPA1 = array();
	$scoreIPA2 = array();
	$scoreIPAM = array();
	$scoreIPA1['mata'] =  $scoreIPA1['fis'] = $scoreIPA1['kim'] = $scoreIPA1['bio'] = 0;
	$scoreIPA2['mata'] =  $scoreIPA2['fis'] = $scoreIPA2['kim'] = $scoreIPA2['bio'] = 0;
	$scoreIPAM['mata'] =  $scoreIPAM['fis'] = $scoreIPA1['kim'] = $scoreIPAM['bio'] = 0;      	

	$scoreIPS1 = array();
	$scoreIPS2 = array();
	$scoreIPSM = array();
	$scoreIPS1['mats'] =  $scoreIPS1['geo'] = $scoreIPS1['sej'] = $scoreIPS1['sos'] =  $scoreIPS1['eko'] =0;
	$scoreIPS2['mats'] =  $scoreIPS2['geo'] = $scoreIPS2['sej'] = $scoreIPS2['sos'] =  $scoreIPS2['eko'] =0;
	$scoreIPSM['mats'] =  $scoreIPSM['geo'] = $scoreIPSM['sej'] = $scoreIPSM['sos'] =  $scoreIPSM['eko'] =0;
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	$isTPS1Adjusted = $isIPA1Adjusted = $isIPS1Adjusted = false;
	$isTPS2Adjusted = $isIPA2Adjusted = $isIPS2Adjusted = false;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TPS' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isTPS1Adjusted = true;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TA' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isIPA1Adjusted = true;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TS' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isIPS1Adjusted = true;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TPS2' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isTPS2Adjusted = true;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TA2' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isIPA2Adjusted = true;
	$temp = mysql_query("SELECT * FROM  soal where code = 'TS2' AND weight > 0");
	if(mysql_num_rows($temp) > 0) $isIPS2Adjusted = true;
	
	$weightTPS1 = array();
	$kunciTPS1 = array();
	$weightTPS2 = array();
	$kunciTPS2 = array();
	$weightIPA1 = array();
	$kunciIPA1 = array();
	$weightIPA2 = array();
	$kunciIPA2 = array();
	$weightIPS1 = array();
	$kunciIPS1 = array();
	$weightIPS2 = array();
	$kunciIPS2 = array();
	
	$kunciTPS1 = array();
	if($isTPS1Adjusted) {
		//$tw = array();
		// $weightTPS1['kpu'] = $weightTPS1['kk'] = $weightTPS1['ppu']  = $weightTPS1['kmbm']  = 0;
		$temp = mysql_query("SELECT * FROM  soal where code = 'TPS'");
		while($row = mysql_fetch_array($temp)){
			$kunciTPS1[] = $row['answer'];
			//$tw[] = $row['weight'];
			$weightTPS1[] = $row['weight'];
		}
		// for ($x=0; $x < 20; $x++) {
			// $weightTPS1['kpu'] = $weightTPS1['kpu'] + $tw[$x];
		// }
		// for ($x=20; $x < 40; $x++) {
			// $weightTPS1['kk'] = $weightTPS1['kk'] + $tw[$x];
		// }
		// for ($x=40; $x < 60; $x++) {
			// $weightTPS1['ppu'] = $weightTPS1['ppu'] + $tw[$x];
		// }
		// for ($x=60; $x < 80; $x++) {
			// $weightTPS1['kmbm'] = $weightTPS1['kmbm'] + $tw[$x];
		// }
	}
	if($isTPS2Adjusted) {
		$temp = mysql_query("SELECT * FROM  soal where code = 'TPS2'");
		while($row = mysql_fetch_array($temp)){
			$kunciTPS2[] = $row['answer'];
			$weightTPS2[] = $row['weight'];
		}
	}
	if($isIPA1Adjusted) {
		$temp = mysql_query("SELECT * FROM  soal where code = 'TA'");
		while($row = mysql_fetch_array($temp)){
			$kunciIPA1[] = $row['answer'];
			$weightIPA1[] = $row['weight'];
		}
	}
	if($isIPA2Adjusted) {
	$temp = mysql_query("SELECT * FROM  soal where code = 'TA2'");
		while($row = mysql_fetch_array($temp)){
			$kunciIPA2[] = $row['answer'];
			$weightIPA2[] = $row['weight'];
		}
	}
	if($isIPS1Adjusted) {
		$temp = mysql_query("SELECT * FROM  soal where code = 'TS'");
		while($row = mysql_fetch_array($temp)){
			$kunciIPS1[] = $row['answer'];
			$weightIPS1[] = $row['weight'];
		}
	}
	if($isIPS2Adjusted) {
		$temp = mysql_query("SELECT * FROM  soal where code = 'TS2'");
		while($row = mysql_fetch_array($temp)){
			$kunciIPS2[] = $row['answer'];
			$weightIPS2[] = $row['weight'];
		}
	}

	
	if(($isTPS1Done && $isIPA1Done) && ($isTPS1Adjusted && $isIPA1Adjusted)) {
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanTPS1=$myArray['jawabantps'];
		//$jawabanTPS1=$jawabanTPS1[0];
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_ipa WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanIPA1=$myArray['jawabanipa'];
		//$jawabanIPA1=$jawabanIPA1[0];
		
		$arrJawabanTPS1 = explode(';', $jawabanTPS1);
		$arrJawabanIPA1 = explode(';', $jawabanIPA1);
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=0; $x < 20; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kpu'] = $scoreTPS1['kpu'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPA1[$x];
			if($arrJawabanIPA1[$x] == $kunciIPA1[$x]) 
				$scoreIPA1['mata'] = $scoreIPA1['mata'] + $weightIPA1[$x];
		}
		$scoreTPS1['kpu'] = $scoreTPS1['kpu']/$tw1;
		$scoreIPA1['mata'] = $scoreIPA1['mata']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=20; $x < 40; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kk'] = $scoreTPS1['kk'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPA1[$x];
			if($arrJawabanIPA1[$x] == $kunciIPA1[$x]) 
				$scoreIPA1['fis'] = $scoreIPA1['fis'] + $weightIPA1[$x];
		}
		$scoreTPS1['kk'] = $scoreTPS1['kk']/$tw1;
		$scoreIPA1['fis'] = $scoreIPA1['fis']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=40; $x < 60; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['ppu'] = $scoreTPS1['ppu'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPA1[$x];
			if($arrJawabanIPA1[$x] == $kunciIPA1[$x]) 
				$scoreIPA1['kim'] = $scoreIPA1['kim'] + $weightIPA1[$x];
		}
		$scoreTPS1['ppu'] = $scoreTPS1['ppu']/$tw1;
		$scoreIPA1['kim'] = $scoreIPA1['kim']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=60; $x < 80; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kmbm'] = $scoreTPS1['kmbm'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPA1[$x];
			if($arrJawabanIPA1[$x] == $kunciIPA1[$x]) 
				$scoreIPA1['bio'] = $scoreIPA1['bio'] + $weightIPA1[$x];
		}
		$scoreTPS1['kmbm'] = $scoreTPS1['kmbm']/$tw1;
		$scoreIPA1['bio'] = $scoreIPA1['bio']/$tw2;
		
		$meanTPSIPA = getMeanTPSIPA();
		$stdevTPSIPA = getStdevTPSIPA();
		$scoreTPS1['kpu'] = 500 + 100*((1000*$scoreTPS1['kpu'] - $meanTPSIPA['kpu'])/$stdevTPSIPA['kpu']);
		$scoreTPS1['kk'] = 500 + 100*((1000*$scoreTPS1['kk'] - $meanTPSIPA['kk'])/$stdevTPSIPA['kk']);
		$scoreTPS1['ppu']  = 500 + 100*((1000*$scoreTPS1['ppu'] - $meanTPSIPA['ppu'])/$stdevTPSIPA['ppu']);
		$scoreTPS1['kmbm']  = 500 + 100*((1000*$scoreTPS1['kmbm'] - $meanTPSIPA['kmbm'])/$stdevTPSIPA['kmbm']);
		$scoreIPA1['mata'] =  500 + 100*((1000*$scoreIPA1['mata'] - $meanTPSIPA['mata'])/$stdevTPSIPA['mata']);
		$scoreIPA1['fis'] = 500 + 100*((1000*$scoreIPA1['fis'] - $meanTPSIPA['fis'])/$stdevTPSIPA['fis']);
		$scoreIPA1['kim'] = 500 + 100*((1000*$scoreIPA1['kim'] - $meanTPSIPA['kim'])/$stdevTPSIPA['kim']);
		$scoreIPA1['bio'] = 500 + 100*((1000*$scoreIPA1['bio'] - $meanTPSIPA['bio'])/$stdevTPSIPA['bio']);
		
		
		$scoreTPSM['kpu'] = $scoreTPS1['kpu'];
		$scoreTPSM['kk'] = $scoreTPS1['kk'];
		$scoreTPSM['ppu'] = $scoreTPS1['ppu'];
		$scoreTPSM['kmbm'] = $scoreTPS1['kmbm'];
		$scoreIPAM['mata'] = $scoreIPA1['mata'];
		$scoreIPAM['fis'] = $scoreIPA1['fis'];
		$scoreIPAM['kim'] = $scoreIPA1['kim'];
		$scoreIPAM['bio'] = $scoreIPA1['bio'];
		
	}
	
	else if(($isTPS1Done && $isIPS1Done) && ($isTPS1Adjusted && $isIPS1Adjusted)) {
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanTPS1=$myArray['jawabantps'];
		//$jawabanTPS1=$jawabanTPS1[0];
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_ips WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanIPS1=$myArray['jawabanips'];
		//$jawabanIPS1=$jawabanIPS1[0];
		
		$arrJawabanTPS1 = explode(';', $jawabanTPS1);
		$arrJawabanIPS1 = explode(';', $jawabanIPS1);
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=0; $x < 20; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kpu'] = $scoreTPS1['kpu'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPS1[$x];
			if($arrJawabanIPS1[$x] == $kunciIPS1[$x]) 
				$scoreIPS1['mats'] = $scoreIPS1['mats'] + $weightIPS1[$x];
		}
		$scoreTPS1['kpu'] = $scoreTPS1['kpu']/$tw1;
		$scoreIPS1['mats'] = $scoreIPS1['mats']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=20; $x < 40; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kk'] = $scoreTPS1['kk'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPS1[$x];
			if($arrJawabanIPS1[$x] == $kunciIPS1[$x]) 
				$scoreIPS1['geo'] = $scoreIPS1['geo'] + $weightIPS1[$x];
		}
		$scoreTPS1['kk'] = $scoreTPS1['kk']/$tw1;
		$scoreIPS1['geo'] = $scoreIPS1['geo']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=40; $x < 60; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['ppu'] = $scoreTPS1['ppu'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPS1[$x];
			if($arrJawabanIPS1[$x] == $kunciIPS1[$x]) 
				$scoreIPS1['sej'] = $scoreIPS1['sej'] + $weightIPS1[$x];
		}
		$scoreTPS1['ppu'] = $scoreTPS1['ppu']/$tw1;
		$scoreIPS1['sej'] = $scoreIPS1['sej']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=60; $x < 80; $x++) {
			$tw1 = $tw1 + $weightTPS1[$x];
			if($arrJawabanTPS1[$x] == $kunciTPS1[$x]) 
				$scoreTPS1['kmbm'] = $scoreTPS1['kmbm'] + $weightTPS1[$x];
			
			$tw2 = $tw2 + $weightIPS1[$x];
			if($arrJawabanIPS1[$x] == $kunciIPS1[$x]) 
				$scoreIPS1['sos'] = $scoreIPS1['sos'] + $weightIPS1[$x];
		}
		$scoreTPS1['kmbm'] = $scoreTPS1['kmbm']/$tw1;
		$scoreIPS1['sos'] = $scoreIPS1['sos']/$tw2;
		
		$tw1 = 0;
		$tw2 = 0;
		for ($x=80; $x < 100; $x++) {
			$tw2 = $tw2 + $weightIPS1[$x];
			if($arrJawabanIPS1[$x] == $kunciIPS1[$x]) 
				$scoreIPS1['eko'] = $scoreIPS1['eko'] + $weightIPS1[$x];
		}
		$scoreIPS1['eko'] = $scoreIPS1['eko']/$tw2;
		
		$meanTPSIPS = getMeanTPSIPS();
		$stdevTPSIPS = getStdevTPSIPS();
		$scoreTPS1['kpu'] = 500 + 100*((1000*$scoreTPS1['kpu'] - $meanTPSIPS['kpu'])/$stdevTPSIPS['kpu']);
		$scoreTPS1['kk'] = 500 + 100*((1000*$scoreTPS1['kk'] - $meanTPSIPS['kk'])/$stdevTPSIPS['kk']);
		$scoreTPS1['ppu']  = 500 + 100*((1000*$scoreTPS1['ppu'] - $meanTPSIPS['ppu'])/$stdevTPSIPS['ppu']);
		$scoreTPS1['kmbm']  = 500 + 100*((1000*$scoreTPS1['kmbm'] - $meanTPSIPS['kmbm'])/$stdevTPSIPS['kmbm']);
		$scoreIPS1['mats'] =  500 + 100*((1000*$scoreIPS1['mats'] - $meanTPSIPS['mats'])/$stdevTPSIPS['mats']);
		$scoreIPS1['geo'] = 500 + 100*((1000*$scoreIPS1['geo'] - $meanTPSIPS['geo'])/$stdevTPSIPS['geo']);
		$scoreIPS1['sej'] = 500 + 100*((1000*$scoreIPS1['sej'] - $meanTPSIPS['sej'])/$stdevTPSIPS['sej']);
		$scoreIPS1['sos'] = 500 + 100*((1000*$scoreIPS1['sos'] - $meanTPSIPS['sos'])/$stdevTPSIPS['sos']);
		$scoreIPS1['eko'] = 500 + 100*((1000*$scoreIPS1['eko'] - $meanTPSIPS['eko'])/$stdevTPSIPS['eko']);
		
		
		$scoreTPSM['kpu'] = $scoreTPS1['kpu'];
		$scoreTPSM['kk'] = $scoreTPS1['kk'];
		$scoreTPSM['ppu'] = $scoreTPS1['ppu'];
		$scoreTPSM['kmbm'] = $scoreTPS1['kmbm'];
		$scoreIPSM['mats'] = $scoreIPS1['mats'];
		$scoreIPSM['geo'] = $scoreIPS1['geo'];
		$scoreIPSM['sej'] = $scoreIPS1['sej'];
		$scoreIPSM['sos'] = $scoreIPS1['sos'];
		$scoreIPSM['eko'] = $scoreIPS1['eko'];
	}
	
	if(($isTPS2Done && $isIPA2Done) && ($isTPS2Adjusted && $isIPA2Adjusted)) {
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps2 WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanTPS2=$myArray['jawabantps'];
		//$jawabanTPS2=$jawabanTPS2[0];
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_ipa2 WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanIPA2=$myArray['jawabanipa'];
		//$jawabanIPA2=$jawabanIPA2[0];
		
		$arrJawabanTPS2 = explode(';', $jawabanTPS2);
		$arrJawabanIPA2 = explode(';', $jawabanIPA2);
		
		$tw = 0;
		$tww = 0;
		for ($x=0; $x < 20; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kpu'] = $scoreTPS2['kpu'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPA2[$x];
			if($arrJawabanIPA2[$x] == $kunciIPA2[$x]) 
				$scoreIPA2['mata'] = $scoreIPA2['mata'] + $weightIPA2[$x];
		}
		$scoreTPS2['kpu'] = $scoreTPS2['kpu']/$tw;
		$scoreIPA2['mata'] = $scoreIPA2['mata']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=20; $x < 40; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kk'] = $scoreTPS2['kk'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPA2[$x];
			if($arrJawabanIPA2[$x] == $kunciIPA2[$x]) 
				$scoreIPA2['fis'] = $scoreIPA2['fis'] + $weightIPA2[$x];
		}
		$scoreTPS2['kk'] = $scoreTPS2['kk']/$tw;
		$scoreIPA2['fis'] = $scoreIPA2['fis']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=40; $x < 60; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['ppu'] = $scoreTPS2['ppu'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPA2[$x];
			if($arrJawabanIPA2[$x] == $kunciIPA2[$x]) 
				$scoreIPA2['kim'] = $scoreIPA2['kim'] + $weightIPA2[$x];
		}
		$scoreTPS2['ppu'] = $scoreTPS2['ppu']/$tw;
		$scoreIPA2['kim'] = $scoreIPA2['kim']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=60; $x < 80; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kmbm'] = $scoreTPS2['kmbm'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPA2[$x];
			if($arrJawabanIPA2[$x] == $kunciIPA2[$x]) 
				$scoreIPA2['bio'] = $scoreIPA2['bio'] + $weightIPA2[$x];
		}
		$scoreTPS2['kmbm'] = $scoreTPS2['kmbm']/$tw;
		$scoreIPA2['bio'] = $scoreIPA2['bio']/$tww;
		
		$meanTPSIPA = getMeanTPSIPA();
		$stdevTPSIPA = getStdevTPSIPA();
		$scoreTPS2['kpu'] = 500 + 100*((1000*$scoreTPS2['kpu'] - $meanTPSIPA['kpu'])/$stdevTPSIPA['kpu']);
		$scoreTPS2['kk'] = 500 + 100*((1000*$scoreTPS2['kk'] - $meanTPSIPA['kk'])/$stdevTPSIPA['kk']);
		$scoreTPS2['ppu']  = 500 + 100*((1000*$scoreTPS2['ppu'] - $meanTPSIPA['ppu'])/$stdevTPSIPA['ppu']);
		$scoreTPS2['kmbm']  = 500 + 100*((1000*$scoreTPS2['kmbm'] - $meanTPSIPA['kmbm'])/$stdevTPSIPA['kmbm']);
		$scoreIPA2['mata'] =  500 + 100*((1000*$scoreIPA2['mata'] - $meanTPSIPA['mata'])/$stdevTPSIPA['mata']);
		$scoreIPA2['fis'] = 500 + 100*((1000*$scoreIPA2['fis'] - $meanTPSIPA['fis'])/$stdevTPSIPA['fis']);
		$scoreIPA2['kim'] = 500 + 100*((1000*$scoreIPA2['kim'] - $meanTPSIPA['kim'])/$stdevTPSIPA['kim']);
		$scoreIPA2['bio'] = 500 + 100*((1000*$scoreIPA2['bio'] - $meanTPSIPA['bio'])/$stdevTPSIPA['bio']);
		
		$scoreTPSM['kpu'] = max($scoreTPSM['kpu'],$scoreTPS2['kpu']);
		$scoreTPSM['kk'] = max($scoreTPSM['kk'],$scoreTPS2['kk']);
		$scoreTPSM['ppu'] = max($scoreTPSM['ppu'],$scoreTPS2['ppu']);
		$scoreTPSM['kmbm'] = max($scoreTPSM['kmbm'], $scoreTPS2['kmbm']);
		$scoreIPAM['mata'] = max($scoreIPAM['mata'],$scoreIPA2['mata']);
		$scoreIPAM['fis'] = max($scoreIPAM['fis'], $scoreIPA2['fis']);
		$scoreIPAM['kim'] = max($scoreIPAM['kim'],$scoreIPA2['kim']);
		$scoreIPAM['bio'] = max($scoreIPAM['bio'], $scoreIPA2['bio']);
	}
	
	else if(($isTPS2Done && $isIPS2Done) && ($isTPS2Adjusted && $isIPS2Adjusted)) {
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps2 WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanTPS2=$myArray['jawabantps'];
		//$jawabanTPS2=$jawabanTPS2[0];
		$temp = mysql_query("SELECT * FROM  jawaban_tryout_ips2 WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$jawabanIPS2=$myArray['jawabanips'];
		//$jawabanIPS2=$jawabanIPS2[0];
		
		$arrJawabanTPS2 = explode(';', $jawabanTPS2);
		$arrJawabanIPS2 = explode(';', $jawabanIPS2);
		
		$tw = 0;
		$tww = 0;
		for ($x=0; $x < 20; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kpu'] = $scoreTPS2['kpu'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPS2[$x];
			if($arrJawabanIPS2[$x] == $kunciIPS2[$x]) 
				$scoreIPS2['mats'] = $scoreIPS2['mats'] + $weightIPS2[$x];
		}
		$scoreTPS2['kpu'] = $scoreTPS2['kpu']/$tw;
		$scoreIPS2['mats'] = $scoreIPS2['mats']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=20; $x < 40; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kk'] = $scoreTPS2['kk'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPS2[$x];
			if($arrJawabanIPS2[$x] == $kunciIPS2[$x]) 
				$scoreIPS2['geo'] = $scoreIPS2['geo'] + $weightIPS2[$x];
		}
		$scoreTPS2['kk'] = $scoreTPS2['kk']/$tw;
		$scoreIPS2['geo'] = $scoreIPS2['geo']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=40; $x < 60; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['ppu'] = $scoreTPS2['ppu'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPS2[$x];
			if($arrJawabanIPS2[$x] == $kunciIPS2[$x]) 
				$scoreIPS2['sej'] = $scoreIPS2['sej'] + $weightIPS2[$x];
		}
		$scoreTPS2['ppu'] = $scoreTPS2['ppu']/$tw;
		$scoreIPS2['sej'] = $scoreIPS2['sej']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=60; $x < 80; $x++) {
			$tw = $tw + $weightTPS2[$x];
			if($arrJawabanTPS2[$x] == $kunciTPS2[$x]) 
				$scoreTPS2['kmbm'] = $scoreTPS2['kmbm'] + $weightTPS2[$x];
			
			$tww = $tww + $weightIPS2[$x];
			if($arrJawabanIPS2[$x] == $kunciIPS2[$x]) 
				$scoreIPS2['sos'] = $scoreIPS2['sos'] + $weightIPS2[$x];
		}
		$scoreTPS2['kmbm'] = $scoreTPS2['kmbm']/$tw;
		$scoreIPS2['sos'] = $scoreIPS2['sos']/$tww;
		
		$tw = 0;
		$tww = 0;
		for ($x=80; $x < 200; $x++) {
			$tww = $tww + $weightIPS2[$x];
			if($arrJawabanIPS2[$x] == $kunciIPS2[$x]) 
				$scoreIPS2['eko'] = $scoreIPS2['eko'] + $weightIPS2[$x];
		}
		$scoreIPS2['eko'] = $scoreIPS2['eko']/$tww;
		
		$meanTPSIPS = getMeanTPSIPS();
		$stdevTPSIPS = getStdevTPSIPS();
		$scoreTPS2['kpu'] = 500 + 100*((1000*$scoreTPS2['kpu'] - $meanTPSIPS['kpu'])/$stdevTPSIPS['kpu']);
		$scoreTPS2['kk'] = 500 + 100*((1000*$scoreTPS2['kk'] - $meanTPSIPS['kk'])/$stdevTPSIPS['kk']);
		$scoreTPS2['ppu']  = 500 + 100*((1000*$scoreTPS2['ppu'] - $meanTPSIPS['ppu'])/$stdevTPSIPS['ppu']);
		$scoreTPS2['kmbm']  = 500 + 100*((1000*$scoreTPS2['kmbm'] - $meanTPSIPS['kmbm'])/$stdevTPSIPS['kmbm']);
		$scoreIPS2['mats'] =  500 + 100*((1000*$scoreIPS2['mats'] - $meanTPSIPS['mats'])/$stdevTPSIPS['mats']);
		$scoreIPS2['geo'] = 500 + 100*((1000*$scoreIPS2['geo'] - $meanTPSIPS['geo'])/$stdevTPSIPS['geo']);
		$scoreIPS2['sej'] = 500 + 100*((1000*$scoreIPS2['sej'] - $meanTPSIPS['sej'])/$stdevTPSIPS['sej']);
		$scoreIPS2['sos'] = 500 + 100*((1000*$scoreIPS2['sos'] - $meanTPSIPS['sos'])/$stdevTPSIPS['sos']);
		$scoreIPS2['eko'] = 500 + 100*((1000*$scoreIPS2['eko'] - $meanTPSIPS['eko'])/$stdevTPSIPS['eko']);
		
		$scoreTPSM['kpu'] = max($scoreTPSM['kpu'],$scoreTPS2['kpu']);
		$scoreTPSM['kk'] = max($scoreTPSM['kk'],$scoreTPS2['kk']);
		$scoreTPSM['ppu'] = max($scoreTPSM['ppu'],$scoreTPS2['ppu']);
		$scoreTPSM['kmbm'] = max($scoreTPSM['kmbm'], $scoreTPS2['kmbm']);
		$scoreIPSM['mats'] = max($scoreIPSM['mats'],$scoreIPS2['mats']);
		$scoreIPSM['geo'] = max($scoreIPSM['geo'], $scoreIPS2['geo']);
		$scoreIPSM['sej'] = max($scoreIPSM['sej'],$scoreIPS2['sej']);
		$scoreIPSM['sos'] = max($scoreIPSM['sos'], $scoreIPS2['sos']);
		$scoreIPSM['eko'] = max($scoreIPSM['eko'], $scoreIPS2['eko']);
	}
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if((($isTPS1Done && $isIPA1Done) && ($isTPS1Adjusted && $isIPA1Adjusted)) ||
		(($isTPS2Done && $isIPA2Done) && ($isTPS2Adjusted && $isIPA2Adjusted)) ) {
		
		$nnsiswa = $scoreTPSM['kpu'] + $scoreTPSM['kk'] + $scoreTPSM['ppu'] + $scoreTPSM['kmbm'];
		$nnsiswa = $nnsiswa + $scoreIPAM['mata'] + $scoreIPAM['fis'] + $scoreIPAM['kim'] + $scoreIPAM['bio'];
		$nnsiswa = $nnsiswa/8;
		$ipaipsipc = 0;
	}	

	else if((($isTPS1Done && $isIPS1Done) && ($isTPS1Adjusted && $isIPS1Adjusted)) ||
		(($isTPS2Done && $isIPS2Done) && ($isTPS2Adjusted && $isIPS2Adjusted)) ) {
		
		$nnsiswa = $scoreTPSM['kpu'] + $scoreTPSM['kk'] + $scoreTPSM['ppu'] + $scoreTPSM['kmbm'];
		$nnsiswa = $nnsiswa + $scoreIPSM['mats'] + $scoreIPSM['geo'] + $scoreIPSM['sej'] + $scoreIPSM['sos'] + $scoreIPSM['eko'];
		$nnsiswa = $nnsiswa/9;
		$ipaipsipc = 1;
	}
	
	if($nnsiswa > $nn1) $kelulusan1 = "Lulus";
	else $kelulusan1 = "Tidak Lulus";
	
	if($nnsiswa > $nn2) $kelulusan2 = "Lulus";
	else $kelulusan2 = "Tidak Lulus";
	
	
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
							
                        </div>
                        </div>																	
                    </div>
                </div>
		
		<div class="content">
			<div class="py-4 px-3 px-md-4">
                <div class="row">
                    <div class="col-xl-8 mb-3 mb-xl-8 center">
                        <div class="card mb-3 mb-md-4">     
								<table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Mata Uji</th>     
                                            <th class="text-left">Sub Mata Uji</th> 
											<th class="text-left">NN Ujian 1</th>
											<th class="text-left">NN Ujian 2</th>
 											<th class="text-left">NN Max</th>
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                                  
                                            <tr>
											<td class="text-left">1.</td>
                                            <td class="text-left">TPS</td>
											<td class="text-left">Kemampuan Penalaran Umum  </td>
											<th class="text-left"><?php echo number_format($scoreTPS1['kpu'],3); ?></th>
											<th class="text-left"><?php if($scoreTPS2['kpu']==0) echo '-';else echo number_format($scoreTPS2['kpu'],3); ?></th>
											<th class="text-left"><?php echo number_format($scoreTPSM['kpu'],3); ?></th>
                                            </tr>
											<tr>
											<td class="text-left">2.</td>
                                            <td class="text-left">TPS</td>
											<td class="text-left">Kemampuan Kuantitatif  </td>
											<th class="text-left"><?php echo number_format($scoreTPS1['kk'],3); ?></th>
											<th class="text-left"><?php if($scoreTPS2['kk']==0) echo '-';else echo number_format($scoreTPS2['kk'],3); ?></th>
											<th class="text-left"><?php echo number_format($scoreTPSM['kk'],3); ?></th>
                                            </tr>
											<tr>
											<td class="text-left">3.</td>
                                            <td class="text-left">TPS</td>
											<td class="text-left">Pengetahuan dan Pemahaman Umum  </td>
											<th class="text-left"><?php echo number_format($scoreTPS1['ppu'],3); ?></th>
											<th class="text-left"><?php if($scoreTPS2['ppu']==0) echo '-';else echo number_format($scoreTPS2['ppu'],3); ?></th>
											<th class="text-left"><?php echo number_format($scoreTPSM['ppu'],3); ?></th>
                                            </tr>
											<tr>
											<td class="text-left">4.</td>
                                            <td class="text-left">TPS</td>
											<td class="text-left">Kemampuan Memahami Bacaan dan Menulis   </td>
											<th class="text-left"><?php echo number_format($scoreTPS1['kmbm'],3); ?></th>
											<th class="text-left"><?php if($scoreTPS2['kmbm']==0) echo '-';else echo number_format($scoreTPS2['kmbm'],3); ?></th>
											<th class="text-left"><?php echo number_format($scoreTPSM['kmbm'],3); ?></th>
                                            </tr>
											
											<td class="text-left">5.</td>
                                            <td class="text-left"><?php if($ipaipsipc==0) echo 'TKA Saintek';else echo 'TKA Soshum'; ?></td>
											<td class="text-left"><?php if($ipaipsipc==0) echo 'Matematika Saintek';else echo 'Matematika Soshum'; ?></td>
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPA1['mata'],3); else  echo number_format($scoreIPS1['mats'],3);; ?></th>
											<th class="text-left">
												<?php 
													if($ipaipsipc==0) {
														if($scoreIPA2['mata']==0) echo '-';
														else echo number_format($scoreIPA2['mata'],3);
													}
													else {
														if($scoreIPS2['mats']==0) echo '-';
														else echo number_format($scoreIPS2['mats'],3);
													}
												?>
											</th>				
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPAM['mata'],3); else  echo number_format($scoreIPSM['mats'],3);; ?></th>
                                            </tr>
											
											<td class="text-left">6.</td>
                                            <td class="text-left"><?php if($ipaipsipc==0) echo 'TKA Saintek';else echo 'TKA Soshum'; ?></td>
											<td class="text-left"><?php if($ipaipsipc==0) echo 'Fisika';else echo 'Geografi'; ?></td>
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPA1['fis'],3); else  echo number_format($scoreIPS1['geo'],3);; ?></th>
											<th class="text-left">
												<?php 
													if($ipaipsipc==0) {
														if($scoreIPA2['fis']==0) echo '-';
														else echo number_format($scoreIPA2['fis'],3);
													}
													else {
														if($scoreIPS2['geo']==0) echo '-';
														else echo number_format($scoreIPS2['geo'],3);
													}
												?>
											</th>				
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPAM['fis'],3); else  echo number_format($scoreIPSM['geo'],3);; ?></th>
                                            </tr>
											
											<td class="text-left">7.</td>
                                            <td class="text-left"><?php if($ipaipsipc==0) echo 'TKA Saintek';else echo 'TKA Soshum'; ?></td>
											<td class="text-left"><?php if($ipaipsipc==0) echo 'Kimia';else echo 'Sejarah'; ?></td>
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPA1['kim'],3); else  echo number_format($scoreIPS1['sej'],3);; ?></th>
											<th class="text-left">
												<?php 
													if($ipaipsipc==0) {
														if($scoreIPA2['kim']==0) echo '-';
														else echo number_format($scoreIPA2['kim'],3);
													}
													else {
														if($scoreIPS2['sej']==0) echo '-';
														else echo number_format($scoreIPS2['sej'],3);
													}
												?>
											</th>				
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPAM['kim'],3); else  echo number_format($scoreIPSM['sej'],3);; ?></th>
                                            </tr>
											
											<td class="text-left">8.</td>
                                            <td class="text-left"><?php if($ipaipsipc==0) echo 'TKA Saintek';else echo 'TKA Soshum'; ?></td>
											<td class="text-left"><?php if($ipaipsipc==0) echo 'Biologi';else echo 'Sosiologi'; ?></td>
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPA1['bio'],3); else  echo number_format($scoreIPS1['sos'],3);; ?></th>
											<th class="text-left">
												<?php 
													if($ipaipsipc==0) {
														if($scoreIPA2['bio']==0) echo '-';
														else echo number_format($scoreIPA2['bio'],3);
													}
													else {
														if($scoreIPS2['sos']==0) echo '-';
														else echo number_format($scoreIPS2['sos'],3);
													}
												?>
											</th>				
											<th class="text-left"><?php if($ipaipsipc==0) echo number_format($scoreIPAM['bio'],3); else  echo number_format($scoreIPSM['sos'],3);; ?></th>
                                            </tr>
											
											<td class="text-left">9.</td>
                                            <td class="text-left"><?php if($ipaipsipc==0) echo '';else echo 'TKA Soshum'; ?></td>
											<td class="text-left"><?php if($ipaipsipc==0) echo '';else echo 'Ekonomi'; ?></td>
											<th class="text-left"><?php if($ipaipsipc==0) echo ''; else  echo number_format($scoreIPS1['eko'],3);; ?></th>
											<th class="text-left">
												<?php 
													if($ipaipsipc==0) {
														echo '';
													}
													else {
														if($scoreIPS2['sos']==0) echo '-';
														else echo number_format($scoreIPS2['sos'],3);
													}
												?>
											</th>				
											<th class="text-left"> <?php if($ipaipsipc==0) echo ''; else  echo number_format($scoreIPSM['eko'],3);; ?></th>
                                            </tr>
											
											<tr>
											<td class="text-left">-</td>
                                            <td class="text-left">Total </td>
											<td class="text-left">NN Total </td>
											<th class="text-left"><?php //($ipaipsipc==0)? ?></th>
											<th class="text-left">-</th>
											<th class="text-left"><?php echo number_format($nnsiswa,3);?></th>
                                            </tr>
																					
											
                                        </tbody>
							</table>
					</div>
				</div>
			</div>
			</div>
		</div>
		
        <div class="content">
            <div class="py-4 px-3 px-md-4">
                <div class="row">
                    <div class="col-xl-8 mb-3 mb-xl-8 center">
                        <div class="card mb-3 mb-md-4">     
								<table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Perguruan Tinggi</th>     
                                            <th class="text-left">Program Studi</th> 
											<th class="text-left">NN Prodi</th>
											<th class="text-left">NN Siswa</th>
 											<th class="text-left">Kelulusan</th>
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                    
                                            <tr>
											<td class="text-left"> 1. </td>
                                            <td class="text-left"> <?php echo $ptn1;?> </td>
											<td class="text-left"> <?php echo $prodi1." - ". $peminatan2;?> </td>
											<th class="text-left"> <?php echo $nn1;?></th>
											<th class="text-left"> <?php echo number_format($nnsiswa,3);?></th>
											<th class="text-left"><?php echo $kelulusan1;?></th>
                                            </tr>
                                            </tr>
                                            
											<tr>
											<td class="text-left"> 2. </td>
                                            <td class="text-left"> <?php echo $ptn2;?> </td>
											<td class="text-left"> <?php echo $prodi2." - ". $peminatan2;?> </td>
											<th class="text-left"> <?php echo $nn2;?></th>
											<th class="text-left"> <?php echo number_format($nnsiswa,3);?></th>
											<th class="text-left"><?php echo $kelulusan2;?></th>
                                            </tr>
																					
											
                                        </tbody>
							</table>
					</div>
				</div>
			</div>
			</div>
				
				
				
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