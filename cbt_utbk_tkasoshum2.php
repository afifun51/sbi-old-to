<?php

    require 'access.php';
    require 'kocokan.php';

    $test_page = 'cbt_utbk_tkasoshum2';

	session_start();	

	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['realtryout'])))
	{
		header('location: index.php');
		exit;
	}	

	$startTime = $_SESSION['startTime'];
	$endTime = $_SESSION['endTime'];	
	$qNumber = $_SESSION['qNumber'];
	
	if (isset($_GET['qNum']))
    {
        $qNumber =  $_GET['qNum'];
		$_SESSION['qNumber'] = $qNumber;
    }

	
	$username =  $_SESSION['username'];
	$temp = mysql_query("SELECT * FROM siswa WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);	
	$fullName = $myArray['name'];
	$school = $myArray['school'];
	$class = $myArray['class'];
	
	
	$numberOfQuestion =  $_SESSION['numberOfQuestion'];
	
	//$diff=strtotime($endTime)-strtotime($startTime); 
	$diff=($endTime)-time(); 
    $temp=$diff; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
	$temp=$diff/86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
	
	
	for ($x = 1; $x <= $numberOfQuestion ; $x++) {
			$qAnswer[$x] = $_SESSION['answer'][$x];
			$qMark[$x] = $_SESSION['mark'][$x];
	} 
	
	// $_SESSION['quisAnswer'] = array();
	// for ($x = 1; $x <= 10 ; $x++) {
			// $_SESSION['quisAnswer'][$x] = "F";
	// } 
	
	// $_SESSION['quisAnswer8']= ""; 
	// $_SESSION['quisAnswer9']= ""; 
	
	// days 
	//$days=floor($temp); $temp=24*($temp-$days); 
	//$hours=floor($temp); $temp=60*($temp-$hours); 
	//$minutes=floor($temp); $temp=60*($temp-$minutes); 
	//$seconds=floor($temp);
	
	//$days = 0;
	//$hours= floor($diff / 3600); 
	//$minutes= $diff - (3600* $hours); 
	//$seconds= $diff % 3600;
	
	//Random first
	$qNumberAfterRandom = $_SESSION['kocokan_ips'][$qNumber-1] ;
	
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TS2' and number = '$qNumberAfterRandom' ");
	$myArray = mysql_fetch_array($temp);
	$desc = $myArray['description'];
	$imageFile = $myArray['fileimage'];
	
	$opt[1] = $myArray['optionA'];
	$opt[2] = $myArray['optionB'];
	$opt[3]= $myArray['optionC'];
	$opt[4]= $myArray['optionD'];
	$opt[5]= $myArray['optionE'];
			 	
	$optABCD[1] = $opt[$_SESSION['kocokan_pg'][0]];
	$optABCD[2] = $opt[$_SESSION['kocokan_pg'][1]];
	$optABCD[3]= $opt[$_SESSION['kocokan_pg'][2]];
	$optABCD[4]= $opt[$_SESSION['kocokan_pg'][3]];
	$optABCD[5]= $opt[$_SESSION['kocokan_pg'][4]];
	
	
	//if (isset($_POST['prev']) && $qNumber >1) {  
	if (isset($_POST['prev'])) {  
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		
		$_SESSION['subject'] = 'UTBK TKA Soshum';
		
		
		if( $qNumber >1) {
			$_SESSION['qNumber'] = $qNumber-1;
		} else {
			$_SESSION['qNumber'] = $numberOfQuestion;
		}
			
			
		if(isset($_POST['option']))
		{
			$choice =  $_POST['option'];
			$qAnswer[$qNumber] = $coice;			
			$_SESSION['answer'][$qNumber] = $choice;			
			if(!$qMark[$qNumber] == 2) {
				$qMark[$qNumber] = 1;
				$_SESSION['mark'][$qNumber] = 1;
			}
			
		}
		else {

			$_SESSION['answer'][$qNumber]="_";		
			$_SESSION['mark'][$qNumber] = 0;
		}
		
		
		header('location: cbt_utbk_tkasoshum2.php');
		exit;
	}
	
	//if (isset($_POST['next']) && $qNumber < $numberOfQuestion) { //Nanti diisi jumlah soal max
	if (isset($_POST['next']) ) { //Nanti diisi jumlah soal max
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		
		if( $qNumber < $numberOfQuestion) {
			$_SESSION['qNumber'] = $qNumber+1;
		} else {
			$_SESSION['qNumber'] = 1;
		}
		
		
		$_SESSION['subject'] = 'UTBK TKA Soshum';
		
		if(isset($_POST['option']))
		{
			$choice =  $_POST['option'];
			$qAnswer[$qNumber] = $coice;					
			$_SESSION['answer'][$qNumber] = $choice;			
			if(!$qMark[$qNumber] == 2) {
				$qMark[$qNumber] = 1;
				$_SESSION['mark'][$qNumber] = 1;
			}		
		}
		else {

			$_SESSION['answer'][$qNumber]="_";		
			$_SESSION['mark'][$qNumber] = 0;
		}
		
		header('location: cbt_utbk_tkasoshum2.php');		
		exit;
	}
	
	if (isset($_POST['raguragu'])) { //Nanti diisi jumlah soal max
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		$_SESSION['qNumber'] = $qNumber;
		$_SESSION['subject'] = 'UTBK TKA Soshum';
		
		if( $qNumber < $numberOfQuestion) {
			$_SESSION['qNumber'] = $qNumber+1;
		} else {
			$_SESSION['qNumber'] = 1;
		}

		if(isset($_POST['option']))
		{
			$choice =  $_POST['option'];
			$qAnswer[$qNumber] = $coice;			
			$_SESSION['answer'][$qNumber] = $choice;	
		}
		else {

			$_SESSION['answer'][$qNumber]="_";		
			$_SESSION['mark'][$qNumber] = 0;
		}
		
		if(($qMark[$qNumber] == 0)|| ($qMark[$qNumber] == 1)) {
				$qMark[$qNumber] = 2;
				$_SESSION['mark'][$qNumber] = 2;
		} else {
			if($qAnswer[$qNumber] == "_" || $_SESSION['answer'][$qNumber]=="_") {
				$qMark[$qNumber] = 0;
				$_SESSION['mark'][$qNumber] = 0;
			} else {
				$qMark[$qNumber] = 1;
				$_SESSION['mark'][$qNumber] = 1;
			}
		}
		
		
		
		header('location: cbt_utbk_tkasoshum2.php');		
		exit;
	}
	
	if (isset($_POST['kosongkan'])) { //Nanti diisi jumlah soal max
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		$_SESSION['qNumber'] = $qNumber;
		$_SESSION['subject'] = 'UTBK TKA Soshum';
		
		
		$_SESSION['answer'][$qNumber]="_";		
		$_SESSION['mark'][$qNumber] = 0;
		
		header('location: cbt_utbk_tkasoshum2.php');		
		exit;
	}
	
	if (isset($_POST['selesai'])) { //Nanti diisi jumlah soal max
		$_SESSION['currentTime'] = $startTime;
		$_SESSION['startTime'] = $startTime;
		$_SESSION['endTime'] = $endTime;
		$_SESSION['qNumber'] = $qNumber;
		$_SESSION['subject'] = 'UTBK TKA Soshum';
		
		if(isset($_POST['option']))
		{
			$choice =  $_POST['option'];
			$qAnswer[$qNumber] = $coice;					
			$_SESSION['answer'][$qNumber] = $choice;			
			$qMark[$qNumber] = 1;
			$_SESSION['mark'][$qNumber] = 1;			
		}
		else {

			$_SESSION['answer'][$qNumber]="_";		
			$_SESSION['mark'][$qNumber] = 0;
		}
		
		
		
		header('location: cbt_utbk_tkasoshum_result2.php');		
		exit;			
		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Try Out CBT : UTBK TKA Soshum</title>

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

<script	type ="text/javascript">
history.pushState(null, null, 'cbt_utbk_tkasoshum2.php');
window.addEventListener('popstate', function(event) {
history.pushState(null, null, 'cbt_utbk_tkasoshum2.php');
});
  
  
window.onerror = handleError;

function handleError(errType, errURL, errLine) {
	window.status = "Error: " + errType + " on line " + 
			errLineNum ;
	return true;
}


function set_cookie ( cookie_name, cookie_value,
		lifespan_in_days, valid_domain ) {
    var domain_string = valid_domain ?
                       ("; domain=" + valid_domain) : '' ;
    document.cookie = cookie_name +
                       "=" + encodeURIComponent( cookie_value ) +
                       "; max-age=" + 60 * 60 *
                       24 * lifespan_in_days +
                       "; path=/" + domain_string ;
}

function get_cookie ( cookie_name ) {
    var cookie_string = document.cookie ;
    if (cookie_string.length != 0) {
        var cookie_value = cookie_string.match (
                        '(^|;)[\s]*' +
                        cookie_name +
                        '=([^;]*)' );
        return decodeURIComponent ( cookie_value[2] ) ;
    }
    return '' ;
}

function switch_style ( css_title )
{
  var i, link_tag ;
  for (i = 0, link_tag = document.getElementsByTagName("link") ;
    i < link_tag.length ; i++ ) {
    if ((link_tag[i].rel.indexOf( "stylesheet" ) != -1) &&
      link_tag[i].title) {
      link_tag[i].disabled = true ;
      if (link_tag[i].title == css_title) {
        link_tag[i].disabled = false ;
      } 
	   set_cookie( "page-theme", css_title, 2);
	}
  }
}

function set_style_from_cookie()
{
  var css_title = get_cookie("page-theme");
  if (css_title.length) {
    switch_style( css_title );
  }
}

isSet = false
var seconds = '<?php echo $diff; ?>';	
var menit =  seconds
var jam = seconds


//var seconds = 8;
	setInterval(
        function(){
          if (seconds <= 0) {
			window.location = 'cbt_utbk_tkasoshum_result2.php';
          }
          else {
			seconds = seconds -1;
			var detik = seconds % 60;
			var menit =  (seconds-detik) / 60;
			var jam = 0;
			if (menit > 60) {				
				var sisa = menit % 60;
				jam = (menit-sisa) / 60; 
				menit = sisa;				
			}										
			
			//document.getElementById('seconds').innerHTML = seconds;
			document.getElementById('jam').innerHTML = jam;
			document.getElementById('menit').innerHTML = menit;
			document.getElementById('detik').innerHTML = detik;

			document.getElementById('m-jam').innerHTML = jam;
			document.getElementById('m-menit').innerHTML = menit;
			document.getElementById('m-detik').innerHTML = detik;
			
			
			temp=seconds; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 						
			//hours=Fish.floor(temp/3600); 
			//minutes=Fish.floor((temp-(3600*hours))/60); 
			//seconds=Fish.floor(temp-(3600*hours)-(60 * minutes));
			//document.getElementById('jam').innerHTML = hours;
			//document.getElementById('menit').innerHTML = minutes;
            //document.getElementById('detik').innerHTML = seconds;
          }
        },
        1000
      );

</script>

</head>


<body class="has-sidebar has-fixed-sidebar-and-header">
    
    <?php require 'test-header.php' ?>

    <main class="main">
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="row">
                    <div class="col-xl-8 mb-3 mb-xl-5">
                    	<form method="post" action="" id="form">
                        <div class="card mb-3 mb-md-4">

                            <div class="card-header d-flex border-bottom align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="badge badge-blue mb-1 mr-2">Tes Kemampuan Akademik (TKA) Soshum Ke-2</span></h5>
                            </div>
                            <div class="card-body">
                                <h5>Soal Nomor : <?php echo"$qNumber"?>  </h5>
                                <p class="mb-0"> <?php echo"$desc" ?></p>
                                <?php
									if(!($imageFile=='white.png')) {
									//	 echo '<img src="images-file/'.$imageFile.'" width="600" height="200" class="left"/>';
									echo '<center> <table style="font-size: 12pt" cellspacing="0" cellpadding="0" border="0" height="120">					
									<tbody> <tr><td>  <img src="images-file/'.$imageFile.'" style="width: 100%; height: auto;"/> </td></tr></tbody> </table>
									</center> ';
									
									}
									
								?>
                                <br>
                                <div class="row mb-3 mb-md-4">
                                    <div class="col-md">
                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="customCheckboxes1" name="option" <?php echo ($_SESSION['answer'][$qNumber]== "A") ? 'checked="checked"' : ''; ?> value="A">
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes1" data-icon="">A. <span><?php echo"$optABCD[1]"?></span></label>
                                        </div>

                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="customCheckboxes2" name="option" <?php echo ($_SESSION['answer'][$qNumber]== "B") ? 'checked="checked"' : ''; ?> value="B">
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes2" data-icon="">B. <span><?php echo"$optABCD[2]"?></span></label>
                                        </div>

                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="customCheckboxes3" name="option" <?php echo ($_SESSION['answer'][$qNumber]== "C") ? 'checked="checked"' : ''; ?> value="C">
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes3" data-icon="">C. <span><?php echo"$optABCD[3]"?></span></label>
                                        </div>

                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="customCheckboxes4" name="option" <?php echo ($_SESSION['answer'][$qNumber]== "D") ? 'checked="checked"' : ''; ?> value="D">
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes4" data-icon="">D. <span><?php echo"$optABCD[4]"?></span></label>
                                        </div>

                                        <div class="form-check position-relative mb-2">
                                            <input type="checkbox" class="form-check-input d-none" id="customCheckboxes5" name="option" <?php echo ($_SESSION['answer'][$qNumber]== "E") ? 'checked="checked"' : ''; ?> value="E">
                                            <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes5" data-icon="">E. <span><?php echo"$optABCD[5]"?></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="card-footer border-top">
                                <div class="d-flex flex-wrap mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary mb-3 mr-2" href="#" name="prev" id="prev"><span class="nova-arrow-circle-left"> </span> Soal Sebelumnya</button>
                                    <button class="btn btn-sm btn-primary mb-3 mr-2" href="#" name="next" id="next">Soal Berikutnya <span class="nova-arrow-circle-right"></span></button>

                                    <button type="submit" name="raguragu" id="raguragu" class="btn btn-sm btn-light mb-3 mr-2">Tandai Ragu-ragu & Lanjut ke Soal Berikutnya</button>
                                    <button type="button" name="selesai" id="prev" class="btn btn-sm btn-secondary mb-3 mr-2" href="#" onclick="getConfirmation()"><span class="nova-save"></span> Selesai & Simpan</button>

                                </div>
                            </footer>
                        </div>
                        </form>
                    </div>

                    <div class="col-xl-4 mb-3 mb-xl-5">
                        <div class="row">
                            <div class="col-xl-12 mb-3 mb-xl-5 d-print-none">
                                <!-- Card -->

                                <div class="card card-desktop mb-3 mb-md-4">
                                    <div class="card-header border-bottom d-flex align-items-center">
                                        <h5 class="font-weight-semi-bold mb-0 "><span class="nova-alarm-clock"></span>&nbsp;&nbsp;Sisa Waktu</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="text-center" style="margin-left: auto; margin-right: auto;">
                                            <tr style="color: #1d809f; !important">
                                                <td>
                                                    <h1 id="jam"></h1></td>
                                                <td>
                                                    <h1>&nbsp;:&nbsp;</h1></td>
                                                <td>
                                                    <h1 id="menit"></h1></td>
                                                <td>
                                                    <h1>&nbsp;:&nbsp;</h1></td>
                                                <td>
                                                    <h1 id="detik"></h1></td>
                                            </tr>
                                            <tr>

                                                <td>jam</td>
                                                <td></td>
                                                <td>menit</td>
                                                <td></td>
                                                <td>detik</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>

                            <div class="col-xl-12 mb-3 mb-xl-5 d-print-none">

                                <div class="card card-desktop mb-3 mb-md-4">
                                    <div class="card-header border-bottom d-flex align-items-center">
                                        <h5 class="font-weight-semi-bold mb-0 "><span class="nova-id-badge"></span>&nbsp;&nbsp;Informasi Ujian</h5>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-xl-6">Mata Pelajaran</div>
                                            <div class="col-xl-6"><strong>UTBK TKA Soshum</strong></div>

                                            <div class="col-xl-6">Tingkat</div>
                                            <div class="col-xl-6"><strong>SMA / MA</strong></div>

                                            <div class="col-xl-6">Jumlah Soal</div>
                                            <div class="col-xl-6"><strong>100</strong></div>

                                            <div class="col-xl-6">Waktu Pengerjaan</div>
                                            <div class="col-xl-6"><strong>1.5 jam (90 menit)</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 mb-3 mb-xl-5 d-print-none">
                                <!-- Card -->

                                <div class="card card-desktop mb-3 mb-md-4">
                                    <div class="card-header border-bottom d-flex align-items-center">
                                        <h5 class="font-weight-semi-bold  mb-0"><span class="nova-write"></span>&nbsp;&nbsp;Status Jawaban Soal</h5>
                                    </div>
                                    <div class="card-body" style="overflow-y: scroll; height: 300px; padding-left: 2.5rem">
                                        <div class="d-flex flex-wrap mb-3 mb-md-4">

                                        	<?php				    
					$numberOfLine =  $numberOfQuestion/10 ;
					$count = 0;
					for ($r = 0; $r < $numberOfLine ; $r++) {
						for ($c = 1; $c <= 10 && $count < $numberOfQuestion ; $c++) {							
							$mark = $qMark[($r*10)+$c] ;
							$num = ($r*10)+$c;
							$count = $count+1;
							if($mark == 0) {
								//echo '<td width="50" style="background-color:#FF0000">';
								//echo '<a href="?qNum='.(($r*5)+$c).'>'.(($r*5)+$c).'</a>'.". ". $qAnswer[($r*5)+$c];;
								//echo ". " ;
								//echo $qAnswer[($r*5)+$c];
								//echo "</td>";								
								echo '<a href="cbt_utbk_tkasoshum2.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">'.$num.'</span>'.$qAnswer[$num];
                                            echo '</a>';
							} else if ($mark == 1) {			
								echo '<a href="cbt_utbk_tkasoshum2.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-blue badge-sm-question-status rounded-circle">'.$num.'</span> <span class="">'.$qAnswer[$num]."</span>";
                                            echo '</a>';
							}  else if ($mark == 2) {			
								echo '<a href="cbt_utbk_tkasoshum2.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-warning badge-sm-question-status rounded-circle">'.$num.'</span>'.$qAnswer[$num];
                                            echo '</a>';
							}
						} 
					}
					
				?>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                    </footer>
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="text-center border rounded p-3 p-md-4">
                <i class="nova-help icon-text icon-text-xxl d-block text-warning mb-3 mb-md-4"></i>
                <div class="h5 font-weight-semi-bold mb-2">Apakah Kamu yakin untuk menyelesaikan Try Out?</div>
                <p class="mb-3 mb-md-4">Apabila Anda klik <strong>OK</strong>, Anda tidak dapat mengerjakan soal kembali.</p>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" id="submit" onclick="submitForm()">OK</button>
                    <a class="btn btn-light ml-2" href="#">Batal</a>
                </div>
            </div>
        </div>
    </div>

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

    <script>
            function getConfirmation() {
               var retVal = confirm("Apakah kamu yakin untuk menyimpan dan menyeselaikan Try Out?");
               if( retVal == true ) {
                      $('<input />').attr('type', 'hidden')
                          .attr('name', "selesai")
                          .attr('value', "selesai")
                          .appendTo('#form');
                  $('#form').submit();
                  return true;
               } else {
                  return false;
               }
            }
      </script>     

    </script>
</body>

<?php
require 'foot.php';
?>