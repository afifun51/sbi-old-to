<?php
require 'access.php';
//require 'head.php';
require 'kocokan.php';
    
    session_start();
    date_default_timezone_set('Asia/Jakarta');  
    
    //header('location: tryout_latihan.php');
    //exit; 
    
        
    $username =  $_SESSION['username'];     
    //echo "<p> Username : ".$username. "</p>"; 
    //header('location: tryout_latihan.php');
    //exit; 
    

    if (!isset($_SESSION['username']))
    {
        header('location: index.php');
        exit;
    }   
    
     $today = date("Y-m-d");
     // echo "Hari ini : ".time();
     // echo "Start : ".strtotime("12:00");
     // echo "End : ".strtotime("14:00");
    
    //echo "Username : ".$username;
    
    $username =  $_SESSION['username'];

    $temp = mysql_query("SELECT * FROM siswa WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $fullName = $myArray['name'];
    $school = $myArray['school'];
    $class = $myArray['class']; 
    $nis = $myArray['nis'];
    $nisn = $myArray['nisn'];
    
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
        //header('location: tryout_latihan.php');
        //exit; 
    
    
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
        
    
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //to utbk 

    if (isset($_POST['cbt_simakui_kd'])) {
        
        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
            $_SESSION['numberOfQuestion'] = $numberOfQuestion;      
            
            $_SESSION['username']=$username;
            $_SESSION['currentTime'] = $startTime;
            $_SESSION['startTime'] = $startTime;
            $_SESSION['endTime'] = $endTime;
            $_SESSION['qNumber'] = $qNumber;        
            $_SESSION['subject'] = 'UTBK TPS';
            
            $_SESSION['answer'] = array();
            $_SESSION['mark'] = array();            
            
            //Accesss kocokan
            $_SESSION['kocokan_tps'] = array();
            $_SESSION['kocokan_pg'] = array();
            $_SESSION['kocokan_tps'] = getKocokanTPS($random_p1);   
            $_SESSION['kocokan_pg'] = getKocokanPG($random_pg); 
            
            //Mark => 0:blank, 1:sure, 3:doubt
            for ($x = 1; $x <= $numberOfQuestion ; $x++) {
                $_SESSION['answer'][$x] = '_';
                $_SESSION['mark'][$x] = 0;
            } 
            
            $_SESSION['realtryout'] = true;
            header('location: tps-test-instructions.php');
            exit;   
        }
        if((!$checkDay) || (!$checkSession)) {                      
            $message = "Mohon maaf, tryout UTBK TPS hanya dapat dilaksanakan sesuai jadwal".'\n'. 
                        "";
                       //"Sesi anda adalah ".getSessionTest($sesi);
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
            $_SESSION['numberOfQuestion'] = $numberOfQuestion;      
            
            $_SESSION['username']=$username;
            $_SESSION['currentTime'] = $startTime;
            $_SESSION['startTime'] = $startTime;
            $_SESSION['endTime'] = $endTime;
            $_SESSION['qNumber'] = $qNumber;        
            $_SESSION['subject'] = 'UTBK TPS';
            
            $_SESSION['answer'] = array();
            $_SESSION['mark'] = array();            
            
            //Accesss kocokan
            $_SESSION['kocokan_tps'] = array();
            $_SESSION['kocokan_pg'] = array();
            $_SESSION['kocokan_tps'] = getKocokanTPS($random_p1);   
            $_SESSION['kocokan_pg'] = getKocokanPG($random_pg); 
            
            //Mark => 0:blank, 1:sure, 3:doubt
            for ($x = 1; $x <= $numberOfQuestion ; $x++) {
                $_SESSION['answer'][$x] = '_';
                $_SESSION['mark'][$x] = 0;
            } 
            
            $_SESSION['realtryout'] = true;
            header('location: tps-test-instructions.php');
            exit;   
        }       
        
    }
    
    if (isset($_POST['ks-test-instructions'])) {
        
        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  100;
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
            header('location: tkasoshum-test-instructions.php');
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
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  100;
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
            header('location: tkasoshum-test-instructions.php');
            exit;   
        }       
        
    }
    
    
    
    if (isset($_POST['ka-test-instructions'])) {
        
        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
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
            header('location: tkasaintek-test-instructions.php');
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
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
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
            header('location: tkasaintek-test-instructions.php');
            exit;   
        }       
        
    }
    
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////// UTBK ke-2
	 if (isset($_POST['cbt_simakui_kd2'])) {

        if (has_taken_second_tryout_kd($username)) {
            header('location: cbt_utbk_not_allowed.php');
            exit;
        }
        
        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
            $_SESSION['numberOfQuestion'] = $numberOfQuestion;      
            
            $_SESSION['username']=$username;
            $_SESSION['currentTime'] = $startTime;
            $_SESSION['startTime'] = $startTime;
            $_SESSION['endTime'] = $endTime;
            $_SESSION['qNumber'] = $qNumber;        
            $_SESSION['subject'] = 'UTBK TPS';
            
            $_SESSION['answer'] = array();
            $_SESSION['mark'] = array();            
            
            //Accesss kocokan
            $_SESSION['kocokan_tps'] = array();
            $_SESSION['kocokan_pg'] = array();
            $_SESSION['kocokan_tps'] = getKocokanTPS($random_p1);   
            $_SESSION['kocokan_pg'] = getKocokanPG($random_pg); 
            
            //Mark => 0:blank, 1:sure, 3:doubt
            for ($x = 1; $x <= $numberOfQuestion ; $x++) {
                $_SESSION['answer'][$x] = '_';
                $_SESSION['mark'][$x] = 0;
            } 
            
            $_SESSION['realtryout'] = true;
            header('location: tps-test-instructions2.php');
            exit;   
        }
        if((!$checkDay) || (!$checkSession)) {                      
            $message = "Mohon maaf, tryout UTBK TPS hanya dapat dilaksanakan sesuai jadwal".'\n'. 
                        "";
                       //"Sesi anda adalah ".getSessionTest($sesi);
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
            $_SESSION['numberOfQuestion'] = $numberOfQuestion;      
            
            $_SESSION['username']=$username;
            $_SESSION['currentTime'] = $startTime;
            $_SESSION['startTime'] = $startTime;
            $_SESSION['endTime'] = $endTime;
            $_SESSION['qNumber'] = $qNumber;        
            $_SESSION['subject'] = 'UTBK TPS';
            
            $_SESSION['answer'] = array();
            $_SESSION['mark'] = array();            
            
            //Accesss kocokan
            $_SESSION['kocokan_tps'] = array();
            $_SESSION['kocokan_pg'] = array();
            $_SESSION['kocokan_tps'] = getKocokanTPS($random_p1);   
            $_SESSION['kocokan_pg'] = getKocokanPG($random_pg); 
            
            //Mark => 0:blank, 1:sure, 3:doubt
            for ($x = 1; $x <= $numberOfQuestion ; $x++) {
                $_SESSION['answer'][$x] = '_';
                $_SESSION['mark'][$x] = 0;
            } 
            
            $_SESSION['realtryout'] = true;
            header('location: tps-test-instructions2.php');
            exit;   
        }       
        
    }
    
    if (isset($_POST['ks-test-instructions2'])) {

        if (has_taken_first_tryout_ipa($username)) {
            header('location: cbt_utbk_not_allowed_ips.php');
            exit;
        }

        if (has_taken_second_tryout_ips($username)) {
            header('location: cbt_utbk_not_allowed.php');
            exit;
        }
        
        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  100;
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
            header('location: tkasoshum-test-instructions2.php');
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
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  100;
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
            header('location: tkasoshum-test-instructions2.php');
            exit;   
        }       
        
    }
    
    
    
    if (isset($_POST['ka-test-instructions2'])) {
        if (has_taken_first_tryout_ips($username)) {
            header('location: cbt_utbk_not_allowed_ipa.php');
            exit;
        }

        if (has_taken_second_tryout_ipa($username)) {
            header('location: cbt_utbk_not_allowed.php');
            exit;
        }

        $checkDay=checkDayFIQ(); 
        $checkSession=checkSession($sesi);
        if($sesi==0) {
            $startTime=time();
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
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
            header('location: tkasaintek-test-instructions2.php');
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
            $endTime=time()+5400;    // time is on second
            $qNumber=1;
            $numberOfQuestion =  80;
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
            header('location: tkasaintek-test-instructions2.php');
            exit;   
        }       
        
    }

    function has_taken_first_tryout_ipa($username) {
        $jawaban_tryout_ipa_query_result = mysql_query("SELECT * FROM jawaban_tryout_ipa WHERE userid = '$username' ");
        $jawaban_tryout_ipa_arr_rows = mysql_num_rows($jawaban_tryout_ipa_query_result);
        
        return $jawaban_tryout_ipa_arr_rows > 0;
    }

    function has_taken_first_tryout_ips($username) {
        $jawaban_tryout_ips_query_result = mysql_query("SELECT * FROM jawaban_tryout_ips WHERE userid = '$username' ");
        $jawaban_tryout_ips_arr_rows = mysql_num_rows($jawaban_tryout_ips_query_result);
        
        return $jawaban_tryout_ips_arr_rows > 0;
    }

    function has_taken_second_tryout_ipa($username) {
        $jawaban_tryout_ipa_query_result = mysql_query("SELECT * FROM jawaban_tryout_ipa2 WHERE userid = '$username' ");
        $jawaban_tryout_ipa_arr_rows = mysql_num_rows($jawaban_tryout_ipa_query_result);
        
        return $jawaban_tryout_ipa_arr_rows > 0;
    }

    function has_taken_second_tryout_ips($username) {
        $jawaban_tryout_ips_query_result = mysql_query("SELECT * FROM jawaban_tryout_ips2 WHERE userid = '$username' ");
        $jawaban_tryout_ips_arr_rows = mysql_num_rows($jawaban_tryout_ips_query_result);
        
        return $jawaban_tryout_ips_arr_rows > 0;
    }

    function has_taken_second_tryout_kd($username) {
        $jawaban_tryout_ips_query_result = mysql_query("SELECT * FROM jawaban_tryout_tps2 WHERE userid = '$username' ");
        $jawaban_tryout_ips_arr_rows = mysql_num_rows($jawaban_tryout_ips_query_result);
        
        return $jawaban_tryout_ips_arr_rows > 0;
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Try Out CBT : UTBK</title>

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

                <div class="row align-items-center mb-3 mb-xl-3">
                    <div class="col-md mb-2 mb-md-0">
                      <h1 class="h3 mb-5">Tes UTBK Kedua</h1>
                    </div>
                  </div>
        <form method="post" action="">
        <div class="row">
            <div class="col-md-4 col-xl-4 mb-3 mb-md-4 center">
              <!-- Card -->
              <div class="card">
                <div class="card-body p-4 center">
                    <img src="images/tps-logo.jpg" height="250" width="250">
                </div>
                <div class="p-3 p-md-4 d-print-none">

                  <div class="d-flex align-items-center">
                    <input type="submit" name="cbt_simakui_kd2" class="btn btn-primary mr-2 center" value="Tes Potensi Skolastik (TPS)">
                  </div>
                </div>
              </div>
              <!-- End Card -->
            </div>

            <div class="col-md-4 col-xl-4 mb-3 mb-md-4 center">
              <!-- Card -->
              <div class="card">
                <div class="card-body p-4 center">
                    <img src="images/science-logo.png" height="250" width="250">
                </div>
                <div class="p-3 p-md-4 d-print-none">
                  <div class="d-flex align-items-center">
                    <input type="submit" name="ka-test-instructions2" class="btn btn-primary mr-2 center" value="Tes Kemampuan Akademik (TKA) Saintek">
                  </div>
                </div>
              </div>
              <!-- End Card -->
            </div>

            <div class="col-md-4 col-xl-4 mb-3 mb-md-4 center">
              <!-- Card -->
              <div class="card">
                <div class="card-body p-4 center">
                    <img src="images/social-logo.jpg" height="250" width="250">
                    <img src="">
                </div>
                <div class="p-3 p-md-4 d-print-none">

                  <div class="d-flex align-items-center">
                    
                    <input type="submit" name="ks-test-instructions2" class="btn btn-primary mr-2 center" value="Tes Kemampuan Akademik (TKA) Soshum">
                  </div>
                </div>
              </div>
              <!-- End Card -->
            </div>
          </div>
          </form>
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
