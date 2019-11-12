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
		
		$prodireg1 = "";	
		$prodireg2 = "";	
		$prodireg3 = "";	
		$prodipar1 = "";	
		$prodipar2 = "";	
		$prodipar3 = "";	
		$prodivok1 = "";	
		$prodivok2 = "";	
		$prodivok3 = "";

		$temp = mysql_query("SELECT * FROM pilihanprodi WHERE userid = '$username' ");
		$myArray = mysql_fetch_array($temp);
		$prodireg1 = $myArray['prodireg1'];	
		$prodireg2 = $myArray['prodireg2'];	
		$prodireg3 = $myArray['prodireg3'];	
		$prodipar1 = $myArray['prodipar1'];	
		$prodipar2 = $myArray['prodipar2'];	
		$prodipar3 = $myArray['prodipar3'];	
		$prodivok1 = $myArray['prodivok1'];	
		$prodivok2 = $myArray['prodivok2'];	
		$prodivok3 = $myArray['prodivok3'];
		$mp_type = $myArray['type'];	
		
		if (isset($_POST['submitdataptn'])) {
			echo "string";
			if(isset($_POST['mp_type'])) {
				$selected_mp_type = $_POST['mp_type'];
				$_SESSION['mp_type'] = $_POST['mp_type'];
			} 
			if(isset($_POST['prodireg1'])) {
				$prodireg1 = $_POST['prodireg1'];
				$_SESSION['prodireg1'] = $prodireg1;
			} 
			if(isset($_POST['prodireg2'])) {
				$_SESSION['prodireg2'] = $_POST['prodireg2'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodireg3'])) {
				$_SESSION['prodireg3'] = $_POST['prodireg3'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			
			if(isset($_POST['prodipar1'])) {
				$_SESSION['prodipar1'] = $_POST['prodipar1'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodipar2'])) {
				$_SESSION['prodipar2'] = $_POST['prodipar2'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodipar3'])) {
				$_SESSION['prodipar3'] = $_POST['prodipar3'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			
			if(isset($_POST['prodivok1'])) {
				$_SESSION['prodivok1'] = $_POST['prodivok1'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodivok2'])) {
				$_SESSION['prodivok2'] = $_POST['prodivok2'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodivok3'])) {
				$_SESSION['prodivok3'] = $_POST['prodivok3'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			
			//Cek prodi			
			$prodireg1=$_SESSION['prodireg1'];
			$prodireg2=$_SESSION['prodireg2'];
			$prodireg3=$_SESSION['prodireg3'];
			
			$prodipar1=$_SESSION['prodipar1'];
			$prodipar2=$_SESSION['prodipar2'];
			$prodipar3=$_SESSION['prodipar3'];
			
			$prodivok1=$_SESSION['prodivok1'];
			$prodivok2=$_SESSION['prodivok2'];
			$prodivok3=$_SESSION['prodivok3'];
			$mp_type=$_SESSION['mp_type'];
			
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodireg1' AND jenjang='Reguler'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiReg1Exist = $myArray['prodi'];
				// $isprodiReg1Exist = mysqli_fetch_array($result)['prodi'];
			}
			else $isprodiReg1Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodireg2' AND jenjang='Reguler'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiReg2Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiReg2Exist = $myArray['prodi'];
			}
			else $isprodiReg2Exist = "NA";
						
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodireg3' AND jenjang='Reguler'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiReg3Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiReg3Exist = $myArray['prodi'];
			}
			else $isprodiReg3Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodipar1' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiPar1Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiPar1Exist = $myArray['prodi'];
			}
			else $isprodiPar1Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodipar2' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiPar2Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiPar2Exist = $myArray['prodi'];
			}
			else $isprodiPar2Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodipar3' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiPar3Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiPar3Exist = $myArray['prodi'];
			}
			else $isprodiPar3Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodivok1' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiVok1Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiVok1Exist = $myArray['prodi'];
			}
			else $isprodiVok1Exist = "NA";
						
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodivok2' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiVok2Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiVok2Exist = $myArray['prodi'];
			}
			else $isprodiVok2Exist = "NA";
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodivok3' AND jenjang='Paralel'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiVok3Exist=mysqli_fetch_array($result)['prodi'];
			if($result){
				$myArray = mysql_fetch_array($result);
				$isprodiVok3Exist = $myArray['prodi'];
			}
			else $isprodiVok3Exist = "NA";
			
			
					
			//Cek apakah kosong			
			if (strcasecmp($prodireg1,"")==0 && strcasecmp($prodipar1,"")==0 && strcasecmp($prodivok1,"")==0) {
				$error = $error."Siswa harus memilih minimal satu prodi di salah satu jenjang reguler, paralel, atau vokasi";
			}	
			
			if (strcasecmp($isprodiReg1Exist,"NA")==0 && strcasecmp($$isprodiPar1Exist,"NA")==0 && strcasecmp($isprodiVok1Exist,"NA")==0) {
				$error = $error."Pilihan prodi yang diinput siswa tidak ada dalam daftar pilihan";
			}	
			
			
			
			// //Cek apakah ada prodi di ptn tsb
			// if(strcasecmp($isprodiExist1,$prodi1)!=0) {
				// $error = $error."Prodi1 (". $prodi1.") tidak ada di ".$ptn1.". ";
			// }
			// if(strcasecmp($isprodiExist2,$prodi2)!=0) {
				// $error = $error."Prodi2 (". $prodi2.") tidak ada di ".$ptn2.". ";
			// }
			// if(strcasecmp($isprodiExist3,$prodi3)!=0) {
				// $error = $error."Prodi3 (". $prodi3.") tidak ada di ".$ptn3.". ";
			// }
			
			$conn = mysqli_connect($db_server, $db_username, $db_password, $db_database_name);
			$sql = "INSERT INTO  pilihanprodi (userid, name, school, class)
				VALUES ('$username', '$fullName', '$school', '$class')";
			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
			} else {
				echo "Data sudah ada";
			}
			
		
			$sql = "UPDATE pilihanprodi SET prodireg1='$prodireg1', prodireg2='$prodireg2', prodireg3='$prodireg3', prodipar1='$prodipar1', prodipar2='$prodipar2', prodipar3='$prodipar3', prodivok1='$prodivok1', prodivok2='$prodivok2', prodivok3='$prodivok3', type='$selected_mp_type' WHERE userid='$username'";

			if (mysqli_query($conn, $sql)) {
					
				header('location: home.php');		
				exit;
				} else {
				echo "Error updating record: " . mysqli_error($conn);	
			}
	
			if(strcasecmp($error,"")!=0) {						
				$_SESSION['errorptn']=$error;
				header('location: course-selection.php');		
				exit;					
			} else {
				$_SESSION['errorptn']=$error;
				header('location: course-selection.php');		
				exit;	
			}
		}	

?>


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
    <link rel="stylesheet" href="assets/vendor/jquery-ui/themes/base/jquery-ui.min.css">

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
                    <div class="col-xl-6 center mb-2 mb-md-0">
                      <h1 class="h3">Pilih Program Studi</h1>
                    </div>
                  </div>
                <div class="row">
                    
            <div class="col-xl-6 center">

                <form method="post" action="">
              <!-- Selects -->
              <div class="card mb-3 mb-md-4">
                <div class="card-header">
                </div>
                <div class="card-body pt-0">
                  <h6 class="font-weight-semi-bold mb-3">Peminatan</h6>
                  <div class="mb-3 mb-md-4">
                    <select class="form-control" style="width: 100%;"
                            data-placeholder="Pilih Peminatan"
                            data-classes="select select-bordered rounded" name="mp_type" id="mp_type">

						<option value="">-- Pilih Peminatan --</option>
                    	<option value="Saintek">Saintek</option>
                    	<option value="Soshum">Soshum</option>
                    </select>
                  </div>
              </div>

                <div class="card-body pt-0">
                  <h6 class="font-weight-semi-bold mb-3">Pilihan 1</h6>
                  <div class="mb-3 mb-md-4">
                    <select class="form-control" style="width: 100%;"
                            data-placeholder="PTN 1"
                            data-classes="select select-bordered rounded" name="prodireg1" id="prodireg1">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Reguler 1</i></span>'>---</option>
                          </select>
                  </div>

                  <div class="mb-3 mb-md-4">
                    <select class="js-custom-select" style="width: 100%;"
                            data-placeholder="Prodi 1"
                            data-classes="select select-bordered rounded" name="prodireg2" id="prodireg2">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Reguler 2</i></span>'>---</option>

                      
                    </select>
                  </div>



                  <h6 class="font-weight-semi-bold mb-3">Pilihan 2</h6>
                  <div class="mb-3 mb-md-4">
                    <select class="js-custom-select" style="width: 100%;"
                            data-placeholder="PTN 2"
                            data-classes="select select-bordered rounded" name="prodipar1" id="prodipar1">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Paralel 1</i></span>'>---</option>

                   
                    </select>
                  </div>

                  <div class="mb-3 mb-md-4">
                    <select class="js-custom-select" style="width: 100%;"
                            data-placeholder="Prodi 2"
                            data-classes="select select-bordered rounded" name="prodipar2" id="prodipar2">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Paralel 2</i></span>'>---</option>

                      
                    </select>
                  </div>


                  <h6 class="font-weight-semi-bold mb-3">Pilihan 3</h6>
                  <div class="mb-3 mb-md-4">
                    <select class="js-custom-select" style="width: 100%;"
                            data-placeholder="PTN 3"
                            data-classes="select select-bordered rounded" name="prodivok1" id="prodivok1">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Vokasi 1</i></span>'>---</option>

                      
                    </select>
                  </div>

                  <div class="mb-3 mb-md-4">
                    <select class="js-custom-select" style="width: 100%;"
                            data-placeholder="Prodi 3"
                            data-classes="select select-bordered rounded" name="prodivok2" id="prodivok2">

                      <option value=""
                              data-option-template='<span class="d-flex align-items-center"><i>Prodi Vokasi 2</i></span>'>---</option>

                      
                    </select>
                  </div>
                 
                    <input class="btn btn-primary" style="margin-left: : 100%" type="submit" name="submitdataptn" value="Simpan">
                </div>
              </div>
                </form>
              <!-- End Selects -->
            </div>
          </div>
          </div>
            </div>

        </div>
    </main>
		
		
		
    
        <script src="js/bootstrap.min.js"></script>
        <script src="js/flickr.js"></script>
        <script src="js/flexslider.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/masonry.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/parallax.js"></script>
        <script type="text/javascript" src="jquery.js"></script>  
        <!-- <script src="js/scripts.js"></script> -->
        <script type="text/javascript" src="jquery.autocomplete.js"></script>
		
		
		<link href="select2.min.css" rel="stylesheet" />
		<script src="select2.min.js"></script>  


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
			

			$("#mp_type").change(function () {
				console.log(this.value);
				mp_type = this.value;
                initProdiByJenjangSelectField('Reguler', mp_type, 1);
				initProdiByJenjangSelectField('Reguler', mp_type, 2);
				initProdiByJenjangSelectField('Reguler', mp_type, 3);
                initProdiByJenjangSelectField('Paralel', mp_type, 1);
				initProdiByJenjangSelectField('Paralel', mp_type, 2);
				initProdiByJenjangSelectField('Paralel', mp_type, 3);				
                initProdiByJenjangSelectField('Vokasi', mp_type, 1);
				initProdiByJenjangSelectField('Vokasi', mp_type, 2);
				initProdiByJenjangSelectField('Vokasi', mp_type, 3);
			})
			
            $(document).ready(function()  
            {
                mp_type = '<?php echo $mp_type ?>';
            	$('#mp_type').select2().val(mp_type);
            	$('#mp_type').select2();
                initProdiByJenjangSelectField('Reguler', mp_type, 1);
				initProdiByJenjangSelectField('Reguler', mp_type, 2);
				initProdiByJenjangSelectField('Reguler', mp_type, 3);
                initProdiByJenjangSelectField('Paralel', mp_type, 1);
				initProdiByJenjangSelectField('Paralel', mp_type, 2);
				initProdiByJenjangSelectField('Paralel', mp_type, 3);				
                initProdiByJenjangSelectField('Vokasi', mp_type, 1);
				initProdiByJenjangSelectField('Vokasi', mp_type, 2);
				initProdiByJenjangSelectField('Vokasi', mp_type, 3);
            });


            window.SelectProdi = function(){
                console.log(mp_type);
            }


            function removeAllOptions(selectbox) {
                var i;
                
                for (i = selectbox.options.length - 1; i >= 0; i--) {
                    selectbox.remove(i);
                }
                // $(selectbox).select2("value", "", false);
            }

      

            function initProdiByJenjangSelectField(jenjang_type, mp_type, num_choice){
				//$.getJSON("api/json/get_prodi_list_by_jenjang.php?jenjang=" + jenjang_type + "&mp=" + mp_type);
                $.getJSON("api/json/get_prodi_list_by_jenjang.php?jenjang=" + jenjang_type + "&mp=" + mp_type,
				//$.getJSON("get_prodi_list_by_ptn.php?ptn=" + ptn_name + "&mp=" + mp_type,
                    function(prodi_list){
                        console.log(mp_type);
                        prodi_list = [''].concat(prodi_list);

                        console.log(prodi_list);
                        if (jenjang_type == 'Reguler' && num_choice==1){
                        	$("#prodireg1").html('');
                            $("#prodireg1").select2({
                                placeholder: 'Pilihan Prodi Reg Ke-1',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodireg1").select2().val('<?php echo $prodireg1; ?>');
                            $("#prodireg1").select2();
                        }
                        else if (jenjang_type == 'Reguler' && num_choice==2){
                        	$("#prodireg2").html('');
                            $("#prodireg2").select2({
                                placeholder: 'Pilihan Prodi Reg Ke-2',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodireg2").select2().val('<?php echo $prodireg2; ?>');
                            $("#prodireg2").select2();
                            
                        }
                        else if (jenjang_type == 'Reguler' && num_choice==3){
                            $("#prodireg3").html('');
                            $("#prodireg3").select2({
                            placeholder: 'Pilihan Prodi Reg Ke-3',
                            data: prodi_list,
                            width: '100%',
                            });
                            $("#prodireg3").select2().val('<?php echo $prodireg3; ?>');
                            $("#prodireg3").select2();
                        }
						else if (jenjang_type == 'Paralel' && num_choice==1){
							$("#prodipar1").html('');
                            $("#prodipar1").select2({
                                placeholder: 'Pilihan Prodi Par Ke-1',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodipar1").select2().val('<?php echo $prodipar1; ?>');
                            $("#prodipar1").select2();
                        }
						else if (jenjang_type == 'Paralel' && num_choice==2){
							$("#prodipar2").html('');
                            $("#prodipar2").select2({
                                placeholder: 'Pilihan Prodi Par Ke-2',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodipar2").select2().val('<?php echo $prodipar2; ?>');
                            $("#prodipar2").select2();
                        }
						else if (jenjang_type == 'Paralel' && num_choice==3){
							$("#prodipar3").html('');
                            $("#prodipar3").select2({
                                placeholder: 'Pilihan Prodi Par Ke-3',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodipar3").select2().val('<?php echo $prodipar3; ?>');
                            $("#prodipar3").select2();
                        }
						else if (jenjang_type == 'Vokasi' && num_choice==1){
							$("#prodivok1").html('');
                            $("#prodivok1").select2({
                                placeholder: 'Pilihan Prodi Vok Ke-1',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodivok1").select2().val('<?php echo $prodivok1; ?>');
                            $("#prodivok1").select2();
                        }			
						else if (jenjang_type == 'Vokasi' && num_choice==2){
							$("#prodivok2").html('');
                            $("#prodivok2").select2({
                                placeholder: 'Pilihan Prodi Vok Ke-2',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodivok2").select2().val('<?php echo $prodivok2; ?>');
                            $("#prodivok2").select2();
                        }
						else if (jenjang_type == 'Vokasi' && num_choice==3){
							$("#prodivok3").html('');
                            $("#prodivok3").select2({
                                placeholder: 'Pilihan Prodi Vok Ke-3',
                                data: prodi_list,
                                width: '100%',
                            });
                            $("#prodivok3").select2().val('<?php echo $prodivok3; ?>');
                            $("#prodivok3").select2();
                        }
						else {
							
						}
                });
                
            }  
		</script>

    </body>
</html>