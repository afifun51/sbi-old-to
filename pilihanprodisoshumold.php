<?php		
		//require 'access.php';
		$server = "localhost";
		//$username = "root";
		//$password = "";
		$username = "root";
		$password = "";
		$database = "cbt_utbk_alhamidiyah";
		//$database = "test_cbtutbk_v2";
		//$database = "tryout_cbt_database";

		
		$db_server = "localhost";
		//$db_username = "root";
		//$db_password = "";
		$db_username = "root";
		$db_password = "";
		$db_database_name = "cbt_utbk_alhamidiyah";
		//$db_database_name = "test_cbtutbk_v2";
		
		mysql_connect($server, $username, $password) or die("gagal");
		mysql_select_db($database) or die("database error");
		
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
			if(isset($_POST['ptn3'])) {
				$_SESSION['ptn3'] = $_POST['ptn3'];
				//echo "".$_POST['ptn3'] ."\n";
			}
			if(isset($_POST['prodi1'])) {
				$_SESSION['prodi1'] = $_POST['prodi1'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodi2'])) {
				$_SESSION['prodi2'] = $_POST['prodi2'];
				//echo "".$_POST['prodi2'] ."\n";
			}
			if(isset($_POST['prodi3'])) {
				$_SESSION['prodi3'] = $_POST['prodi3'];
				//echo "".$_POST['prodi3'] ."\n";
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
			if($result) $isprodiExist1=mysqli_fetch_array($result)['prodi'];
			else $isprodiExist1 = "NA";
			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodi2' and ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $isprodiExist2=mysqli_fetch_array($result)['prodi'];
			else $isprodiExist2 = "NA";
			
			$sql="SELECT prodi FROM prodi WHERE prodi='$prodi3' and ptn='$ptn3'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $isprodiExist3=mysqli_fetch_array($result)['prodi'];
			else $isprodiExist3 = "NA";
			
			
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
			if(strcasecmp($isprodiExist3,$prodi3)!=0) {
				$error = $error."Prodi3 (". $prodi3.") tidak ada di ".$ptn3.". ";
			}
			
			
			$sql = "INSERT INTO  pilihanprodi (userid, name, school, class)
				VALUES ('$username', '$fullName', '$school', '$class')";
			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
			} else {
				//echo "Data sudah ada";
			}
			
			$sql = "UPDATE pilihanprodi SET ptn1='$ptn1', ptn2='$ptn2', ptn3='$ptn3', prodi1='$prodi1' , prodi2='$prodi2' , prodi3='$prodi3'  WHERE userid='$username'";			
			mysqli_query($conn, $sql);
				if (mysqli_query($conn, $sql)) {
					//echo $stringAnswer."";
				} else {
				echo "Error updating record: " . mysqli_error($conn);	
			}
	
			if(strcasecmp($error,"")!=0) {						
				$_SESSION['errorptn']=$error;
				header('location: pilihanprodisoshum.php');		
				exit;					
			} else {
				$_SESSION['errorptn']=$error;
				header('location: pilihanprodisoshum.php');		
				exit;	
			}
				
			// echo "ptn : ".$ptn1."\n";
			// echo "ptn : ".$ptn2."\n";
			// echo "ptn : ".$ptn3."\n";
			// echo "prodi : ".$prodi1."\n";
			// echo "prodi : ".$prodi2."\n";
			// echo "prodi : ".$prodi3."\n";
			
			// if(strcasecmp($ptn1,""))echo "kosong";
			//echo "result : ".$isprodiExist1."  -  ".$isprodiExist2."  -  ".$isprodiExist3."  -  \n";
			//if(strcasecmp($_SESSION['provinsisekolah'], ))			
				
			//header('location: form4a.php');		
			//exit;

			
		}	
		// else {
			// $_SESSION['errorptn']="";
			// echo "Just start";
		// }

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Try Out CBT</title>
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/steps.css" rel="stylesheet" type="text/css" media="all" />
		
		
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
		
		
		<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
		
		
		
		<link rel="stylesheet" href="css/login_style.css" type="text/css" title = "bright" media="screen" />
		<link rel="stylesheet 2" href="css/login_reset.css" type="text/css" title = "dark" media="screen" />
		<link rel="stylesheet" href="css/mystyle.css" type="text/css" title = "bright" media="screen" />
		<link rel="stylesheet 2" href="css/mystyle2.css" type="text/css" title = "dark" media="screen" />


		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nivo-lightbox.css">
		<link rel="stylesheet" href="css/nivo_themes/default/default.css">
		<link rel="stylesheet" href="css/templatemo-style.css">

        <style type="text/css">
            .select-option select {
                margin-bottom: 0;
                background: white;
                color: white;
            }
        </style>
	</head>
    <body>
	

	
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
	
	<div id="petunjuk" style="height:700px; padding:100px; font-weight: bold;">
      <!-- <div class="title">Selamat Datang di Sistem Try Out CBT</div> -->	
	  
		<h2> Data Siswa dan Pilihan PTN-Prodi</h2>
		
		  <table style="font-size: 12pt; text-color:black;   width:1060px;  border: 1px solid black;" >			
				<tbody>		
					<tr>
					<td><strong>Username</strong></td>
					<td><?php echo $username; ?> </td>	
					<td><strong>Pilihan PTN 1</strong></td>
					<td><?php echo $ptn1; ?> </td>							
					</tr>
					<tr >
					<td><strong>Nama</strong></td>
					<td><?php echo $fullName; ?> </td>
					<td><strong>Pilihan Prodi 1</strong></td>
					<td><?php echo $prodi1; ?> </td>		
					</tr>
					<tr>
					<td><strong>Sekolah</strong></td>
					<td><?php echo $school; ?> </td>
					<td><strong>Pilihan PTN 2</strong></td>
					<td><?php echo $ptn2; ?> </td>		
					</tr>				
					<tr>
					<td><strong>Kelas</strong></td>
					<td><?php echo $class; ?> </td>
					<td><strong>Pilihan Prodi 2</strong></td>
					<td><?php echo $prodi2; ?> </td>		
					</tr>
					<tr>
					<td><strong> NIS</strong></td>
					<td> <?php echo $nis; ?> </td>
					<td><strong>Pilihan PTN 3</strong></td>
					<td><?php echo $ptn3; ?> </td>		
					</tr>				
					<tr>
					<td><strong> </strong></td>
					<td> </td>
					<td><strong>Pilihan Prodi 3</strong></td>
					<td><?php echo $prodi3; ?> </td>		
					</tr>
				</tbody>
			</table>
	  
		<h3> Isi (Ubah) Pilihan PTN dan Prodi</h3>
		
	
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
			<p>Pilihan ke-3</p>   
			<select style="font-size: 16pt; text-color:black; width:500px" name="ptn3" id="ptn3"  placeholder="PTN Pilihan ke-3" onchange="SelectProdi('3')">
					<option value="">Pilih PTN 3</option>
			</select>                                    
			<select style="font-size: 16pt; text-color:black; width:500px" name="prodi3" id="prodi3" placeholder="Prodi Pilihan ke-3">
					   <option value="">Prodi 3</option>
			</select>
			<p> </p>

			<input style="font-size: 16pt; width:150px; height:30px" type="submit" value="Submit Data" name="submitdataptn"/> 
		</form>
		
		<div class="container">
		  <div class="row">
			<div class="col-md-1 col-sm-1"></div>
			<div class="col-md-10 col-sm-10">
			  <hr>
			</div>
			<div class="col-md-1 col-sm-1"></div>
		  </div>
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
		
		
		
    
        <script src="js/jquery.min.js"></script>
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
        <script src="js/jquerysession.js"></script>
		
		<!--
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <link href="https://github.com/techhysahil/Select2-Flat-UI/blob/master/Overide.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>  
        -->
		
		
		<link href="select2.min.css" rel="stylesheet" />
		<!--
        <link href="Overide.css" rel="stylesheet" />
		-->
		<script src="select2.min.js"></script>  
        
		
		
		<script> 		
			$(document).ready(function()  
			{    
				$("#ptn1").autocomplete("autocomptn.php",  
				{    
					selectFirst: true
				});    
			});    
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
			$(document).ready(function()  
			{    
				$("#ptn2").autocomplete("autocomptn.php",  
				{    
					selectFirst: true
				});    
			});    
		</script>
			<script>
			$(document).ready(function()  
				{    
					$("#prodi2").autocomplete("autocomprodi.php",  
					{    
						selectFirst: true
					});    
			});  
		</script>
		<script> 		
			$(document).ready(function()  
			{    
				$("#ptn3").autocomplete("autocomptn.php",  
				{    
					selectFirst: true
				});    
			});    
		</script>
			<script>
			$(document).ready(function()  
				{    
					$("#prodi3").autocomplete("autocomprodi.php",  
					{    
						selectFirst: true
					});    
			});  
		</script>
    </body>
</html>