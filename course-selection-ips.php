 <?php		
		require 'access.php';
		session_start();

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
		
		
		if (isset($_POST['submitdataptn'])) {
			if(isset($_POST['ptn1'])) {
				$_SESSION['ptn1'] = $_POST['ptn1'];
				//echo "".$_POST['ptn1'] ."\n";
			} 
			if(isset($_POST['ptn2'])) {
				$_SESSION['ptn2'] = $_POST['ptn2'];
				//echo "".$_POST['ptn2'] ."\n";
			}
			if(isset($_POST['prodi1'])) {
				$_SESSION['prodi1'] = $_POST['prodi1'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodi2'])) {
				$_SESSION['prodi2'] = $_POST['prodi2'];
				//echo "".$_POST['prodi2'] ."\n";
			}
			
			
			
			//Cek prodi
			$ptn1=$_SESSION['ptn1'];
			$ptn2=$_SESSION['ptn2'];
			$ptn3=$_SESSION['ptn3'];
			
			$prodi1=$_SESSION['prodi1'];
			$prodi2=$_SESSION['prodi2'];
			$prodi3=$_SESSION['prodi3'];
			
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodi1' AND ptn='$ptn1'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiExist1=mysqli_fetch_array($result)['prodi'];
			if($result) {
				$myArray=mysqli_fetch_array($result);
				$isprodiExist1=$myArray['prodi'];
			}
			else $isprodiExist1 = "NA";
			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodi2' and ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) $isprodiExist2=mysqli_fetch_array($result)['prodi'];
			if($result) {
				$myArray=mysqli_fetch_array($result);
				$isprodiExist2=$myArray['prodi'];
			}
			else $isprodiExist2 = "NA";
			
			
			
			//Cek apakah kosong			
			if (strcasecmp($ptn1,"")==0 || strcasecmp($prodi1,"")==0) {
				$error = $error."Siswa harus memilih minimal satu prodi di suatu PTN (PTN 1 dan Prodi 1 harus diisi).";
			}	
			
			
			//Cek apakah ada prodi di ptn tsb
			if(strcasecmp($isprodiExist1,$prodi1)!=0) {
				$error = $error."Prodi1 (". $prodi1.") tidak ada di ".$ptn1.". ";
			}
			if(strcasecmp($isprodiExist2,$prodi2)!=0) {
				$error = $error."Prodi2 (". $prodi2.") tidak ada di ".$ptn2.". ";
			}
			
			
			
			$sql = "INSERT INTO  pilihanprodi (userid, name, school, class)
				VALUES ('$username', '$fullName', '$school', '$class')";
			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
			} else {
				//echo "Data sudah ada";
			}
			
			$sql = "UPDATE pilihanprodi SET ptn1='$ptn1', ptn2='$ptn2', prodi1='$prodi1' , prodi2='$prodi2' WHERE userid='$username'";			
			mysqli_query($conn, $sql);
				if (mysqli_query($conn, $sql)) {
					//echo $stringAnswer."";
				} else {
				echo "Error updating record: " . mysqli_error($conn);	
			}
	
			if(strcasecmp($error,"")!=0) {						
				$_SESSION['errorptn']=$error;
				header('location: course-selection-ips.php');		
				exit;					
			} else {
				$_SESSION['errorptn']="";
				header('location: course-selection-ips.php');		
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
                      <h3 class="h3">Pilih Program Studi</h3>
                    </div>
                  </div>
				  
                <div class="row">		
					<div class="col-xl-6 center">
					<div class="card">	
						<div class="card-header border-bottom d-flex align-items-center">
							<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Data Siswa</h5>
						</div>
			
						<table class="table table-striped mb-0">
						<tbody>		
							<tr>
							<td><strong>Username</strong></td>
							<td><?php echo $username; ?> </td>					
							</tr>
							<tr >
							<td><strong>Nama</strong></td>
							<td><?php echo $fullName; ?> </td>	
							</tr>
							<tr>
							<td><strong>Sekolah</strong></td>
							<td><?php echo $school; ?> </td>
							</tr>				
							<tr>
							<td><strong>Kelas</strong></td>
							<td><?php echo $class; ?> </td>	
							</tr>
							
						</tbody>
					</table>
				</div>
            </div>
          </div>	  
		</div> 
		
		<div class="py-4 px-3 px-md-4">
		  <div class="row">		
				<div class="col-xl-6 center">
					<div class="card">
						<div class="card-header border-bottom d-flex align-items-center">
							<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Pilihan Prodi</h5>
						</div>
						
						<table class="table table-striped mb-0">
						<thead>
                            <tr>
                            <th class="text-left">No.</th>
                            <th class="text-left">Perguruan Tinggi</th>     
                            <th class="text-left">Program Studi</th> 
                            </tr>
						</thead>
						<tbody>		
							<tr>
							<td><strong>1.</strong></td>
							<td><?php echo $ptn1; ?> </td>
							<td><?php echo $prodi1; ?> </td>		
							</tr>
							<tr>
							<td><strong>2.</strong></td>
							<td><?php echo $ptn2; ?> </td>
							<td><?php echo $prodi2; ?> </td>		
							</tr>
						</tbody>
					</table>
						
					</div>
				</div>
		  </div> 
        </div>	
		
		<div class="py-4 px-3 px-md-4">
		  <div class="row">		
				<div class="col-xl-6 center">
					<div class="card">
						<div class="card-header border-bottom d-flex align-items-center">
							<h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Isi (Ubah) Pilihan PTN dan Prodi</h5>
						</div>
						
						<form method="post" action="" name="prodi_selection" style="text-color:black; background-color:white;">
							
							<p>Pilihan ke-1</p> 
							<select style="font-size: 16pt; text-color:black; width:500px" name="ptn1" id="ptn1"  placeholder="PTN Pilihan ke-1" onchange="SelectProdi('1')">
									<option value="">Pilih PTN 1</option>
							</select>                                      
							<select style="font-size: 16pt; text-color:black; width:500px" name="prodi1" id="prodi1" placeholder="Prodi Pilihan ke-1">
									   <option value="">Prodi 1</option>
							</select>
							<p>Pilihan ke-2</p> 
							<select style="font-size: 16pt; text-color:black; width:500px" name="ptn2" id="ptn2"  placeholder="PTN Pilihan ke-2" onchange="SelectProdi('2')">
									<option value="">Pilih PTN 2</option>
							</select>			                                    
							<select style="font-size: 16pt; text-color:black; width:500px" name="prodi2" id="prodi2" placeholder="Prodi Pilihan ke-2">
									   <option value="">Prodi 2</option>
							</select>
							<p> </p>
							
							<div class="d-flex align-items-center">
								<input class="btn btn-primary mr-2 center"  type="submit" value="Submit Data" name="submitdataptn"/> 
							</div>
						</form>
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
			// $(document).ready(function()  
			// {    
				// $("#ptn1").autocomplete("autocomptn.php",  
				// {    
					// selectFirst: true
				// });    
			// });    
		</script>
		<script>
			
			mp_type = 'Soshum';
			
            $(document).ready(function()  
            {
                console.log(mp_type);
                initProdiByPtnSelectField('1', mp_type, null);
                initProdiByPtnSelectField('2', mp_type, null);
                initProdiByPtnSelectField('3', mp_type, null);
                initPTNSelectionField();
            });


            window.SelectProdi = function(ptn_type){
                console.log(mp_type);
                removeAllOptions(document.getElementById("prodi" + ptn_type));
                var selected_ptn = document.getElementById("select2-ptn" + ptn_type + "-container").innerHTML;
                initProdiByPtnSelectField(ptn_type, mp_type, selected_ptn);
            }


            function removeAllOptions(selectbox) {
                var i;
                
                for (i = selectbox.options.length - 1; i >= 0; i--) {
                    selectbox.remove(i);
                }
                // $(selectbox).select2("value", "", false);
            }

            function initPTNSelectionField(ptn){
                $.getJSON("api/json/get_ptn_list.php",
				//$.getJSON("get_ptn_list.php",
                    function(ptn_list){
                        console.log(ptn_list);
                        $("#ptn1").select2({
                            placeholder: 'Pilih PTN 1',
                            data: ptn_list,
                            width: '100%',
                        });

                        $("#ptn2").select2({
                            placeholder: 'Pilih PTN 2',
                            data: ptn_list,
                            width: '100%',
                        });

                        $("#ptn3").select2({
                            placeholder: 'Pilih PTN 3',
                            data: ptn_list,
                            width: '100%',
                        });
                });
                
            }

            function initProdiByPtnSelectField(ptn_type, mp_type, ptn_name){
                $.getJSON("api/json/get_prodi_list_by_ptn.php?ptn=" + ptn_name + "&mp=" + mp_type,
				//$.getJSON("get_prodi_list_by_ptn.php?ptn=" + ptn_name + "&mp=" + mp_type,
                    function(prodi_list){
                        console.log(prodi_list);
                        prodi_list = [''].concat(prodi_list);
                        if (ptn_type == '1'){
                            $("#prodi1").select2({
                                placeholder: 'Pilihan Prodi Ke-1',
                                data: prodi_list,
                                width: '100%',
                            });
                        }
                        else if (ptn_type == '2'){
                            $("#prodi2").select2({
                                placeholder: 'Pilihan Prodi Ke-2',
                                data: prodi_list,
                                width: '100%',
                            });
                            
                        }
                        else if (ptn_type == '3'){
                            $("#prodi3").select2({
                            placeholder: 'Pilihan Prodi Ke-3',
                            data: prodi_list,
                            width: '100%',
                            });
                        }
                        else{

                        }
                });
                
            }  
		</script>
		<script> 		
			// $(document).ready(function()  
			// {    
				// $("#ptn2").autocomplete("autocomptn.php",  
				// {    
					// selectFirst: true
				// });    
			// });    
		</script>
			<script>
			// $(document).ready(function()  
				// {    
					// $("#prodi2").autocomplete("autocomprodi.php",  
					// {    
						// selectFirst: true
					// });    
			// });  
		</script>
		<script> 		
			// $(document).ready(function()  
			// {    
				// $("#ptn3").autocomplete("autocomptn.php",  
				// {    
					// selectFirst: true
				// });    
			// });    
		</script>
			<script>
			// $(document).ready(function()  
				// {    
					// $("#prodi3").autocomplete("autocomprodi.php",  
					// {    
						// selectFirst: true
					// });    
			// });  
		</script>

    </body>
</html>