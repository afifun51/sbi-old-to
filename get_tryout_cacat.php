<?php
require 'access.php';
     //require 'head.php';
require 'kocokan.php';
	
	session_start();
	date_default_timezone_set('Asia/Jakarta');
		
	
	$username =  $_SESSION['username'];
    echo "Username : ".$username;

	if (!isset($_SESSION['username']))
	{
		header('location: index.php');
		exit;
	}	
	
	 $today = date("Y-m-d");
	 // echo "Hari ini : ".time();
	 // echo "Start : ".strtotime("12:00");
	 // echo "End : ".strtotime("14:00");
	
	echo "Username : ".$username;
	
	$username =  $_SESSION['username'];
	
	$temp = mysql_query("SELECT * FROM jadwal WHERE userid = '$username'");	
	$myArray = mysql_fetch_array($temp);
	$sesi = $myArray['sesi'];
	$random_bin = $myArray['random_bin'];
	$random_mat = $myArray['random_mat'];
	$random_bing = $myArray['random_bing'];
	$random_p1 = $myArray['random_p1'];
	$random_p2 = $myArray['random_p2'];
	$random_p3 = $myArray['random_p3'];
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
	
	
	
	if (isset($_POST['tryoutbin_ag'])) {
		
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
			
			header('location: tryout_bin_ag.php');
			$_SESSION['realtryout'] = true;
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Indonesia hanya dapat dilaksanakan sesuai jadwal".'\n'.
						//"";
					   "Sesi anda adalah ".getSessionTest($sesi);
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
			header('location: tryout_bin_ag.php');
			exit;	
				
		}		
		
	}	
	
	
	if (isset($_POST['tryoutbing_ag'])) {
		
		$checkDay=checkDayBING(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ag.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Inggris hanya dapat dilaksanakan sesuai jadwal".'\n'.
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ag.php');
			exit;	
				
		}		
		
	}


	if (isset($_POST['tryoutmat_ag'])) {
		
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ag.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Matematika hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ag.php');
			exit;	
		}		
		
	}

	
	if (isset($_POST['tryoutfiq_ag'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Fiqih';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_fiq'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_fiq'] = getKocokanFiq($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_fiq_ag.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Fiqih hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Fiqih';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_fiq'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_fiq'] = getKocokanFiq($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_fiq_ag.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryouthad_ag'])) {
		
		$checkDay=checkDayHAD(); 
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
			$_SESSION['subject'] = 'Hadist';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_had'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_had'] = getKocokanHad($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_had_ag.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Hadih hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Hadih';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_had'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_had'] = getKocokanHad($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_had_ag.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryouttaf_ag'])) {
		
		$checkDay=checkDayTAF(); 
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
			$_SESSION['subject'] = 'Tafsir';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_taf'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_taf'] = getKocokanTaf($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_taf_ag.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Tafsir hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Tafsir';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_taf'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_taf'] = getKocokanTaf($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_taf_ag.php');
			exit;	
		}

	}		
	
	
	///################################ Peminatan IPA ##############################
	if (isset($_POST['tryoutbin_ipa'])) {
		
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
			
			header('location: tryout_bin_ipa.php');
			$_SESSION['realtryout'] = true;
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Indonesia hanya dapat dilaksanakan sesuai jadwal".'\n'.
						//"";
					   "Sesi anda adalah ".getSessionTest($sesi);
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
			header('location: tryout_bin_ipa.php');
			exit;	
				
		}		
		
	}	
	
	
	if (isset($_POST['tryoutbing_ipa'])) {
		
		$checkDay=checkDayBING(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Inggris hanya dapat dilaksanakan sesuai jadwal".'\n'.
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ipa.php');
			exit;	
				
		}		
		
	}


	if (isset($_POST['tryoutmat_ipa'])) {
		
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Matematika hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ipa.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryoutfis_ipa'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Fisika';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_fis'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_fis'] = getKocokanFis($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_fis_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Fisika hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Fisika';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_fis'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_fis'] = getKocokanFis($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_fis_ipa.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryoutkim_ipa'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Kimia';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_kim'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_kim'] = getKocokanKim($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_kim_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Kimia hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Kimia';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_kim'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_kim'] = getKocokanKim($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_kim_ipa.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryoutbio_ipa'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Biologi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bio'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bio'] = getKocokanBio($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_bio_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Biologi hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Biologi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_bio'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_bio'] = getKocokanBio($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_bio_ipa.php');
			exit;	
		}		
		
	}
	
	
	
	
	
	
	/// ##################### Peminatan IPS ####################################
	if (isset($_POST['tryoutbin_ips'])) {
		
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
			
			header('location: tryout_bin_ips.php');
			$_SESSION['realtryout'] = true;
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Indonesia hanya dapat dilaksanakan sesuai jadwal".'\n'.
						//"";
					   "Sesi anda adalah ".getSessionTest($sesi);
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
			header('location: tryout_bin_ips.php');
			exit;	
				
		}		
		
	}	
	
	
	if (isset($_POST['tryoutbing_ips'])) {
		
		$checkDay=checkDayBING(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {			
			$message = "Mohon maaf, tryout mata pelajaran Bahasa Inggris hanya dapat dilaksanakan sesuai jadwal".'\n'.
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  35;
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
			header('location: tryout_bing_ips.php');
			exit;	
				
		}		
		
	}


	if (isset($_POST['tryoutmat_ips'])) {
		
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Matematika hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['kocokan_mat'] = getKocokanMat($random_mat);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_mat_ips.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryoutgeo_ips'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Geografi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_geo'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_geo'] = getKocokanGeo($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_geo_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Geografi hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Geografi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_geo'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_geo'] = getKocokanGeo($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_geo_ips.php');
			exit;	
		}		
		
	}
	
	if (isset($_POST['tryouteko_ips'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Ekonomi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_eko'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_eko'] = getKocokanFis($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_eko_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Ekonomi hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Ekonomi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_eko'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_eko'] = getKocokanFis($random_p2);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_eko_ips.php');
			exit;	
		}		
		
	}
	
	
	if (isset($_POST['tryoutsos_ips'])) {
		
		$checkDay=checkDayFIQ(); 
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
			$_SESSION['subject'] = 'Sosiologi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_sos'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_sos'] = getKocokanSos($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_sos_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout mata pelajaran Sosiologi hanya dapat dilaksanakan sesuai jadwal".'\n'. 
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
			$_SESSION['subject'] = 'Sosiologi';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_sos'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_sos'] = getKocokanSos($random_p3);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: tryout_sos_ips.php');
			exit;	
		}
	}
	
	
	
	
	if (isset($_POST['cbt_utbk_ips'])) {
		
		$checkDay=checkDayFIQ(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  85;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'UTBK Soshum';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ips'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ips'] = getKocokanIPS($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: cbt_utbk_ips.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout UTBK Soshum hanya dapat dilaksanakan sesuai jadwal".'\n'. 
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  85;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'UTBK Soshum';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ips'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ips'] = getKocokanIPS($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: cbt_utbk_ips.php');
			exit;	
		}		
		
	}
	
	
	
	if (isset($_POST['cbt_utbk_ipa'])) {
		
		$checkDay=checkDayFIQ(); 
		$checkSession=checkSession($sesi);
		if($sesi==0) {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  75;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'UTBK Saintek';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ipa'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ipa'] = getKocokanIPA($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: cbt_utbk_ipa.php');
			exit;	
		}
		if((!$checkDay) || (!$checkSession)) {						
			$message = "Mohon maaf, tryout UTBK Saintek hanya dapat dilaksanakan sesuai jadwal".'\n'. 
						"";
					   //"Sesi anda adalah ".getSessionTest($sesi);
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {
			$startTime=time();
			$endTime=time()+7200;    // time is on second
			$qNumber=1;
			$numberOfQuestion =  75;
			$_SESSION['numberOfQuestion'] = $numberOfQuestion;		
			
			$_SESSION['username']=$username;
			$_SESSION['currentTime'] = $startTime;
			$_SESSION['startTime'] = $startTime;
			$_SESSION['endTime'] = $endTime;
			$_SESSION['qNumber'] = $qNumber;		
			$_SESSION['subject'] = 'UTBK Saintek';
			
			$_SESSION['answer'] = array();
			$_SESSION['mark'] = array();			
			
			//Accesss kocokan
			$_SESSION['kocokan_ipa'] = array();
			$_SESSION['kocokan_pg'] = array();
			$_SESSION['kocokan_ipa'] = getKocokanIPS($random_p1);	
			$_SESSION['kocokan_pg'] = getKocokanPG($random_pg);	
			
			//Mark => 0:blank, 1:sure, 3:doubt
			for ($x = 1; $x <= $numberOfQuestion ; $x++) {
				$_SESSION['answer'][$x] = '_';
				$_SESSION['mark'][$x] = 0;
			} 
			
			$_SESSION['realtryout'] = true;
			header('location: cbt_utbk_ipa.php');
			exit;	
		}		
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Tryout CBT</title>
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
<p>Username : <?php $username ?> </p>
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
   <?php echo "Username : ".$username ;?>
    <!-- <div id="petunjuk" style="height:1100px;"> -->
	
	<div id="petunjuk" style="height:500px;">
      <!-- <div class="title">Selamat Datang di Sistem Try Out CBT</div> -->
	  <h2> Selamat Datang di Sistem Try Out CBT </h2>
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
	  
	  
	  
	  <!--
	  <h2> Peminatan Agama </h2>
	  <table style="font-size: 12pt" cellspacing="0" cellpadding="0" border="0" width="1000">			
			<tbody>
				<tr  align="center">
				<td><a><img href=""  src="images/icon_bahasa.png" width="120" height="120" alt="" /></td>
				<td><a> <img href="get_tryout.php" name="tryoutmat" src="images/icon_mat.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/icon_english.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/fiqih.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/hadist.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/tafsir.png" width="120" height="120" alt="" /></td>
				</tr>			
				<tr  align="center">
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutbin_ag" >Bhs. Indonesia</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;" type="submit" name="tryoutmat_ag" >Matematika</button></form></td>				
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutbing_ag" >Bhs. Inggris</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryoutfiq_ag" >Ilmu Fiqih</button></form></td>
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;" type="submit" name="tryouthad_ag" >Ilmu Hadist</button></form></td>				
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="tryouttaf_ag" >Ilmu Tafsir</button></form></td>
				</tr>
			</tbody>
		</table>	   
		-->
		
	  <h2> Silakan Pilih UTBK Saintek atau Soshum</h2>
	  <table style="font-size: 12pt" cellspacing="0" cellpadding="0" border="0" width="1000">			
			<tbody>
				<tr  align="center">
				<td><a><img href="get_tryout.php"  src="images/fisika.png" width="120" height="120" alt="" /></td>
				<td><a><img href="get_tryout.php"  src="images/ekonomi.png" width="120" height="120" alt="" /></td>
				</tr>			
				<tr  align="center">
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="cbt_utbk_ipa" >UTBK Saintek</button></form></td>		
				<td><form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="cbt_utbk_ips" >UTBK Soshum</button></form></td>
				</tr>
			</tbody>
		</table>	
		

		
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
		<h3> Mencoba Sistem  (Latihan) :</h3>
		<form method="post" action=""><button class="btn btn-default style="width:120px;"  type="submit" name="latihan" >Latihan Tryout</button></form> 
	    -->
	
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


<script	type ="text/javascript">
   //history.pushState(null, null, 'get_tryout.php');
   //window.addEventListener('popstate', function(event) {
   //history.pushState(null, null, 'get_tryout.php');
   //});
</script>
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