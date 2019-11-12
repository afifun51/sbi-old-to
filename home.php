<?php       
    require 'access.php';
    
    session_start();        
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!isset($_SESSION['username']))
    {
        header('location: login.php');
        exit;
    }
    
    $isempty=false;
    $error="";
        
    $username =  $_SESSION['username'];
    $temp = mysql_query("SELECT * FROM siswa WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $fullName = $myArray['name'];
    $school = $myArray['school'];
    $class = $myArray['class']; 
    $nis = $myArray['nis'];
    $nisn = $myArray['nisn'];
	
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
	
	$bolehpilihprodi = false;
	$kodeprodi = -1;
	if($tps_benar!="-" && $ipa_benar!="-") {
		$bolehpilihprodi = true;
		$kodeprodi = 0;
	}
	else if($tps_benar!="-" && $ips_benar!="-") {
		$bolehpilihprodi = true;
		$kodeprodi = 1;
	}
	if($tps2_benar!="-" && $ipa2_benar!="-") {
		$bolehpilihprodi = true;
		$kodeprodi = 0;
	}
	else if($tps2_benar!="-" && $ips2_benar!="-") {
		$bolehpilihprodi = true;
		$kodeprodi = 1;
	}
	
	if (isset($_POST['ubahprodi'])) {
		if($bolehpilihprodi) {
			$_SESSION['errorprodi']="";
			if($kodeprodi==0) {
				header('location: course-selection-ipa.php');
				exit;   
			} else {
				header('location: course-selection-ips.php');
				exit;   
			}			
		}
		else {
			$_SESSION['errorprodi']="Anda belum diizinkan memilih prodi. Anda harus menyelesaikan 1 paket Try Out terlebih dahulu";
			header('location: home.php');
			exit;
		}
	}
	
	if (isset($_POST['evaluation'])) {
		// if($prodi1 == NULL) {
			// $_SESSION['errorevaluation']="Anda belum diizinkan melihat hasil Try Out. Anda harus menyelesaikan 1 paket Try Out terlebih dahulu dan memilih program study";
			// header('location: home.php');
			// exit;
		// }
		// else {
			// $_SESSION['errorevaluation']="";
			// header('location: evaluation.php');
			// exit;
		// }
		if(!$bolehpilihprodi) {
			$_SESSION['errorevaluation']="Anda belum diizinkan melihat hasil Try Out. Anda harus menyelesaikan 1 paket Try Out terlebih dahulu";
			header('location: home.php');
			exit;
		}
		else {
			$_SESSION['errorevaluation']="";
			header('location: evaluation.php');
			exit;
		}

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
                    <div class="col-xl-5 mb-xl-5">

                    <div class="col-xl-12 mb-xl-6">
                        <div class="card">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Data Siswa</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-6">Username</div>
                                    <div class="col-xl-4"><strong><?php echo $username; ?></strong></div>

                                    <div class="col-xl-6">Nama</div>
                                    <div class="col-xl-6"><strong><?php echo $fullName; ?> </strong></div>

                                    <div class="col-xl-6">Sekolah</div>
                                    <div class="col-xl-6"><strong><?php echo $school; ?></strong></div>

                                    <div class="col-xl-6">Kelas</div>
                                    <div class="col-xl-6"><strong><?php echo $class; ?></strong></div>

                                    <div class="col-xl-6">NIS</div>
                                    <div class="col-xl-6"><strong><?php echo $nis; ?></strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mb-xl-12">
                        <div class="card">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Pilihan Program Studi (Prodi)</h5>                   
                            </div>
							
							<table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Perguruan Tinggi</th>     
                                            <th class="text-left">Program Studi</th> 
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                    
                                            <tr>
											<td class="text-left"> 1. </td>
                                            <td class="text-left"> <?php echo $ptn1?> </td>
											<td class="text-left"> <?php echo $prodi1?> </td>
                                            </tr>
                                            
											<tr>
											<td class="text-left"> 2. </td>
                                            <td class="text-left"> <?php echo $ptn2?> </td>
											<td class="text-left"> <?php echo $prodi2?> </td>
                                            </tr>
											


                                        </tbody>
							</table>
							
							<div class="card-footer">
								
								<form method="post" action="">
									<?php echo '<h7>'.$_SESSION['errorprodi'].'</h7>'; ?>
									<div class="d-flex align-items-center">
										<input type="submit" name="ubahprodi" class="btn btn-primary mr-2 center" value="Ubah Pilihan Prodi">
									</div>
								</form>
							</div>
                        </div>
                    </div>

                    </div>
                    <div class="col-xl-7 mb-3 mb-xl-7">

                    <div class="col-xl-12 mb-3 mb-xl-12">
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
								<?php echo '<h7>'.$_SESSION['errorevaluation'].'</h7>'; ?>
								<form method="post" action="">
									<div class="d-flex align-items-center">
										<input type="submit" name="evaluation" class="btn btn-primary mr-2 center" value="Lihat Hasil Kelulusan">
									</div>
								</form>
							</div>
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