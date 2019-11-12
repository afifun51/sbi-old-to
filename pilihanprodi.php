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

<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
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
   <?php
		// echo "Username : ".$username ;
	?>
    <div id="petunjuk" style="height:600px;">
      <!-- <div class="title">Selamat Datang di Sistem Try Out CBT</div> -->	
	  
		<h2> Data Siswa dan Pilihan PTN-Prodi</h2>
		
		  <table style="font-size: 14pt; text-color:black;   width:1000px;  border: 1px solid black;" >			
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
					<td><strong>NIS</strong></td>
					<td><?php echo $nis; ?> </td>
					<td><strong>Pilihan Prodi 2</strong></td>
					<td><?php echo $prodi2; ?> </td>		
					</tr>
					<tr>
					<td><strong> </strong></td>
					<td> </td>
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
		<form method="post" action="" name="prodi_selection">
						
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
 
<!-- <script src="js/jquery.js"></script> -->

<script src="js/jquerysession.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 

<script type="text/javascript" src="jquery.js"></script>  
<script type="text/javascript" src="jquery.autocomplete.js"></script>


<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.nav.js"></script> 
<script src="js/isotope.js"></script> 
<script src="js/imagesloaded.min.js"></script> 
<script src="js/custom.js"></script>

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
            //var mp_type = "<?php echo $_SESSION['jenjang'];?>";

            // if(mp_type.includes('IPA')){
                // mp_type = 'IPA';
            // }
            // else if(mp_type.includes('IPS')){
                // mp_type = 'IPS';
            // }
            // else{
                // mp_type = '';
            // }
			mp_type = 'IPA';
			
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
		</

</body>
</html>