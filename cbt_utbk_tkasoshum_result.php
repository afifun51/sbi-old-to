<?php
//ini_set('max_execution_time', 0); 

	require 'access.php';
	require 'kocokan.php';
	ini_set('max_execution_time', 0); 


	//if(session_id() == '' || !isset($_SESSION)) {
	session_start();	
	$conn = mysqli_connect($server, $username, $password, $database);
	
	//if (!isset($_SESSION['username']))
	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['realtryout'])))
	{
		header('location: home.php');
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
	$nis = $myArray['nis'];
	$nisn = $myArray['nisn'];
	
	$temp = mysql_query("SELECT * FROM jadwal WHERE userid = '$username' ");
	$myArray = mysql_fetch_array($temp);	
	$sesi = $myArray['sesi'];
	$random_ips= $myArray['random_p1'];
	$random_pg = $myArray['random_pg'];
		
	
	
	$numberOfQuestion =  $_SESSION['numberOfQuestion'];
	
	//$diff=strtotime($endTime)-strtotime($startTime); 
	//$diff=($endTime)-time(); 
	$diff = 0;
    $temp=$diff; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
	$temp=$diff/86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day 
	
	
	for ($x = 1; $x <= $numberOfQuestion ; $x++) {
		    //str_replace('*','',$_SESSION['answer'][$x]);
			$qAnswer[$x] = $_SESSION['answer'][$x];
			//echo $qAnswer[$x]." ";
			$qMark[$x] = $_SESSION['mark'][$x];
	}
	
	
	//echo "UTBK Soshum ";		
	$answerArray = $qAnswer;
	$normalizedAnswer = array(); 	  
	
	$kocokanIPS = getKocokanIPS($random_ips);
	$kocokanPilGan = getKocokanPG($random_pg); 			
	//echo $random_ips." ".$random_pg" : " ; 
	$stringAnswer = "";	
	$score = 0;
	
	//Get Answer
	$kunci = array(); 	
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TS'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunci[] = $row['answer'];
		//Edited - added semicolon at the End of line.1st and 4th(prev) line
	}
	
	//$kunci = $myArray['answer'];
	$kunci[] = $row['answer'];
	
	
	for($x=1; $x <= $numberOfQuestion; $x++) {
		$numIndex = $kocokanIPS[$x-1];
		//echo $answerArray[$x]." ";
		//echo getAnswer($random_pg, $answerArray[$x])." "; 
		//$normalizedAnswer[$numIndex] = getAnswer($random_pg, $answerArray[$x]); 		
	    $normalizedAnswer[$numIndex] = $answerArray[$x];	
	}			
	
	$jawabanBenar=0;
	$jawabanSalah=0;
	$jawabanKosong=0;
	for($x=1; $x <= $numberOfQuestion; $x++) {
		$stringAnswer = $stringAnswer.$normalizedAnswer[$x].";" ; 			
        //echo $normalizedAnswer[$x]. " ";		
		if($normalizedAnswer[$x] == "_" || $normalizedAnswer[$x] == '_') {
			$jawabanKosong=$jawabanKosong+1;
		}
		else if($normalizedAnswer[$x] == $kunci[$x-1]) {
			$jawabanBenar=$jawabanBenar+1;
		}
		else {
			$jawabanSalah=$jawabanSalah+1;
		}
	}	
	$stringAnswer = $stringAnswer."#" ;
	
	
	//Update table result fis
	//$conn = mysqli_connect($server, $username, $password, $database);
	
	$sql = "INSERT INTO  jawaban_tryout_ips (userid, name, school, class)
		VALUES ('$username', '$fullName', '$school', '$class')";
	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
	} else {
		//echo "Data sudah ada";
	}
	
	$sql = "UPDATE jawaban_tryout_ips SET jawabanips='$stringAnswer' WHERE userid='$username'";			
	mysqli_query($conn, $sql);
		if (mysqli_query($conn, $sql)) {
			//echo $stringAnswer."";
		} else {
		echo "Error updating record: " . mysqli_error($conn);
	
	}
	
	$sql = "INSERT INTO  hasil_tryout_ips (userid, name, school, class)
				VALUES ('$username', '$fullName', '$school', '$class')";
	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
	} else {
		//echo "Data sudah ada";
	}
	
	$sql = "UPDATE hasil_tryout_ips SET benar='$jawabanBenar', salah='$jawabanSalah', kosong='$jawabanKosong'  WHERE userid='$username'";				
	mysqli_query($conn, $sql);
		if (mysqli_query($conn, $sql)) {
			//echo " Update Database Success ";
		} else {
		echo "Error updating record: " . mysqli_error($conn);
	
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

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <?php require 'header.php' ?>
    <!-- End Header -->

    <main class="main">
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="row">
                    <div class="col-xl-6 mb-3 mb-xl-6 center" style="margin-top: 5rem;">
                        <div class="card mb-3 mb-md-4" style="border: 1px solid #ffa500;">
                            <div class="card-body" style="text-align: center">
                            	<h2><strong>Selamat!</strong></h2>
                            	<h4>Anda telah berhasil menyelesaikan Try Out untuk</h4> 

                            	<h4>UTBK TKA Soshum</h4>
                            	<br>
                            	<h4>Jawaban anda sudah disimpan di dalam sistem.</h4>
                            </div>
                            <div class="card-footer">
                            	<center>
                            		<a class="btn btn-primary" href="home.php">Kembali Ke Home</a>
                            	</center>
                            </div>
                        </div>
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

    <!-- JS Global Compolsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Implementing Libraries -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/vendor/select2/dist/js/select2.foll.min.js"></script>
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

            // initialization of show on type modole
            $.HSCore.components.HSHeaderSearch.init('.js-header-search');

            // initialization of show on type modole
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