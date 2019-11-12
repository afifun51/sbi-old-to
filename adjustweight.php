<?php       
    require 'access.php';
    require 'adjustandresetweight.php';
    
	
    session_start();        
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!isset($_SESSION['username']))
    {
        header('location: login.php');
        exit;
    }
    
    $isempty=false;
    $error="";
        
	///////////////////////////////
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps ");
	// $myArray = mysql_fetch_array($temp);
	$num_tps = mysql_num_rows($temp);
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_ipa ");
	// $myArray = mysql_fetch_array($temp);
	$num_ipa = mysql_num_rows($temp);
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_ips ");
	// $myArray = mysql_fetch_array($temp);
	$num_ips = mysql_num_rows($temp);
	
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_tps2 ");
	// $myArray = mysql_fetch_array($temp);
	$num_tps2 = mysql_num_rows($temp);
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_ipa2 ");
	// $myArray = mysql_fetch_array($temp);
	$num_ipa2 = mysql_num_rows($temp);
	$temp = mysql_query("SELECT * FROM  jawaban_tryout_ips2 ");
	// $myArray = mysql_fetch_array($temp);
	$num_ips2 = mysql_num_rows($temp);
	
	
	$kunciTPS = array();
	$weightTPS = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TPS'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTPS[] = $row['answer'];
		$weightTPS[] = $row['weight'];		
	}
	// for($x=0; $x <= 80; $x++) {
		// echo ($x+1) . " " .$kunciTPS[$x]." ".$weight[$x]."</br>";
	// }
	$kunciTA = array();
	$weightTA = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TA'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTA[] = $row['answer'];
		$weightTA[] = $row['weight'];		
	}
	$kunciTS = array();
	$weightTS = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TS'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTS[] = $row['answer'];
		$weightTS[] = $row['weight'];		
	}
	
	
	$kunciTPS2 = array();
	$weightTPS2 = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TPS2'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTPS2[] = $row['answer'];
		$weightTPS2[] = $row['weight'];		
	}
	// for($x=0; $x <= 80; $x++) {
		// echo ($x+1) . " " .$kunciTPS[$x]." ".$weight[$x]."</br>";
	// }
	$kunciTA2 = array();
	$weightTA2 = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TA2'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTA2[] = $row['answer'];
		$weightTA2[] = $row['weight'];		
	}
	$kunciTS2 = array();
	$weightTS2 = array();
	$temp = mysql_query("SELECT * FROM soal WHERE code = 'TS2'");	
	//$myArray = mysql_fetch_array($temp);	
	while($row = mysql_fetch_array($temp)){
		$kunciTS2[] = $row['answer'];
		$weightTS2[] = $row['weight'];		
	}
	
	
	if (isset($_POST['resetweight-tps'])) {
		$result = resetWeight($conn, 'TPS');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
		
		// $sql = "UPDATE soal SET weight = 0 WHERE code = 'TPS'";				
		// mysqli_query($conn, $sql);
		// if (mysqli_query($conn, $sql)) {
			// header('location: adjustweight.php');		
			// exit;
		// } else { echo "Error updating weight record: " . mysqli_error($conn);
		// }
		
	}
	
	if (isset($_POST['resetweight-ipa'])) {
		$result = resetWeight($conn, 'TA');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
		//resetWeight('TA');
		// $sql = "UPDATE soal SET weight = 0 WHERE code = 'TA'";				
		// mysqli_query($conn, $sql);
		// if (mysqli_query($conn, $sql)) {
			// header('location: adjustweight.php');		
			// exit;
		// } else { echo "Error updating weight record: " . mysqli_error($conn);
		// }
	}
	if (isset($_POST['resetweight-ips'])) {
		$result = resetWeight($conn, 'TS');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	if (isset($_POST['resetweight-tps2'])) {
		$result = resetWeight($conn, 'TPS2');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
	}
	if (isset($_POST['resetweight-ipa2'])) {
		$result = resetWeight($conn, 'TA2');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
	}
	if (isset($_POST['resetweight-ips2'])) {
		$result = resetWeight($conn, 'TS2');
		if($result == "noerror") {
			header('location: adjustweight.php');		
			exit;
		}
		else {
			echo $result;
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if (isset($_POST['adjustweight-tps'])) {
		//$result = adjustWeight('TPS', 'jawaban_tryout_tps', 'jawabantps', 80);
		//echo "result : </br>". $result;
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TPS', 'jawaban_tryout_tps', 'jawabantps', 80);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
	}
	
	if (isset($_POST['adjustweight-ipa'])) {
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TA', 'jawaban_tryout_ipa', 'jawabanipa', 80);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
	}
	
	if (isset($_POST['adjustweight-ips'])) {
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TS', 'jawaban_tryout_ips', 'jawabanips', 100);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (isset($_POST['adjustweight-tps2'])) {
		//$result = adjustWeight('TPS', 'jawaban_tryout_tps', 'jawabantps', 80);
		//echo "result : </br>". $result;
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TPS2', 'jawaban_tryout_tps2', 'jawabantps', 80);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
	}
	
	if (isset($_POST['adjustweight-ipa2'])) {
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TA2', 'jawaban_tryout_ipa2', 'jawabanipa', 80);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
	}
	
	if (isset($_POST['adjustweight-ips2'])) {
		if($num_tps > 0 ) {
			$result = adjustWeight($conn, 'TS2', 'jawaban_tryout_ips2', 'jawabanips', 100);
			if($result == "noerror") {
				header('location: adjustweight.php');		
				exit;
			}
			else {
				echo $result;
			}
		} else {
			echo '<h5 color="red"> Anda tidak dapat meng-adjust weight karena belum ada siswa yang submit<h5></br>';
		}
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

                <div class="row">
                                      
                    <div class="col-xl-12 mb-3 mb-xl-12">

                    <div class="col-xl-12 mb-3 mb-xl-12">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Submission Tryout Pertama</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Mata Uji</th>     
                                            <th class="text-left">Jumlah Submit</th>   
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                           
                                            <tr>
                                            <td class="text-left">1.</td>
                                            <td class="text-left">Tes Potensi Skolastik (TPS)</td>
                                            <td class="text-left"><?php echo $num_tps?> </td>
                                            </tr>  
											
											<tr>
                                            <td class="text-left">2.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Saintek</td>
                                            <td class="text-left"><?php echo $num_ipa?> </td>
                                            </tr>   
											
											<tr>
                                            <td class="text-left">3.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Soshum</td>
                                            <td class="text-left"><?php echo $num_ips?> </td>
                                            </tr>   
											
                                        </tbody>
                                    </table>
                            </div>
                            </div>
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Potensi Skolastik (TPS) 1</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 80;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											echo $count+1 .'.<br>'.$weightTPS[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
									 <input type="submit" name="adjustweight-tps" class="btn btn-primary mr-2 center" value="Adjust Weight">
									 <input type="submit" name="resetweight-tps" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Kemampuan Akademik (TKA) Saintek 1</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 80;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											//echo $count.'. NULL';
											echo $count+1 .'.<br>'.$weightTA[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
								 <input type="submit" name="adjustweight-ipa" class="btn btn-primary mr-2 center" value="Adjust Weight">
								 <input type="submit" name="resetweight-ipa" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Kemampuan Akademik (TKA) Soshum 1</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 100;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											echo $count+1 .'.<br>'.$weightTS[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
								 <input type="submit" name="adjustweight-ips" class="btn btn-primary mr-2 center" value="Adjust Weight">
								 <input type="submit" name="resetweight-ips" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							<div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Submission Tryout Kedua</h5>
                            </div>
							
							  <div class="card-body p-0">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-left">No.</th>
                                            <th class="text-left">Mata Uji</th>     
                                            <th class="text-left">Jumlah Submit</th>   
                                            </tr>
                                        </thead>
                                            
                                        <tbody class="table-hover">                                           
                                            <tr>
                                            <td class="text-left">1.</td>
                                            <td class="text-left">Tes Potensi Skolastik (TPS)</td>
                                            <td class="text-left"><?php echo $num_tps2?> </td>
                                            </tr>  
											
											<tr>
                                            <td class="text-left">2.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Saintek</td>
                                            <td class="text-left"><?php echo $num_ipa2?> </td>
                                            </tr>   
											
											<tr>
                                            <td class="text-left">3.</td>
                                            <td class="text-left">Tes Kemampuan Akademik (TKA) Soshum</td>
                                            <td class="text-left"><?php echo $num_ips2?> </td>
                                            </tr>   
											
                                        </tbody>
                                    </table>
                            </div>
                            </div>
							
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Potensi Skolastik (TPS) 2</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 80;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											echo $count+1 .'.<br>'.$weightTPS2[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
								 <input type="submit" name="adjustweight-tps2" class="btn btn-primary mr-2 center" value="Adjust Weight">
								 <input type="submit" name="resetweight-tps2" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Kemampuan Akademik (TKA) Saintek 2</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 80;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											//echo $count.'. NULL';
											echo $count+1 .'.<br>'.$weightTA2[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
								 <input type="submit" name="adjustweight-ipa2" class="btn btn-primary mr-2 center" value="Adjust Weight">
								 <input type="submit" name="resetweight-ipa2" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							<div class="card-body">
								<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Weight Tes Kemampuan Akademik (TKA) Soshum 2</h5>
								 <table class="table table-striped mb-0">
									
									<?php			
									$numberOfQuestion = 100;
									$numberOfColumn = 20;
									$numberOfLine =  $numberOfQuestion/$numberOfColumn ;
									$count = 0;
									for ($r = 0; $r < $numberOfLine ; $r++) {
										echo '<tr>';
										for ($c = 1; $c <= $numberOfColumn  && $count < $numberOfQuestion ; $c++) {							
											//$count = $count + 1;
											echo '<td class="text-left">';
											echo $count+1 .'.<br>'.$weightTS2[$count++];
											echo '</td>';
										}
										echo '</tr>';
									}
									?>
								 </table>
								 <form method="post" action="">
								 <input type="submit" name="adjustweight-ips2" class="btn btn-primary mr-2 center" value="Adjust Weight">
								 <input type="submit" name="resetweight-ips2" class="btn btn-primary mr-2 center" value="Reset Weight">
								 </form>
							</div>
							
							
                            <div class="card-footer">
                                <a href="evaluation.php" class="btn btn-sm btn-primary">Lihat Hasil Kelulusan</a>
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