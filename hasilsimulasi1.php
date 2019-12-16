<?php		
		require 'access.php';
		session_start();
		if (!isset($_SESSION['username']))
		{
			header('location: login.php');
			exit;
		}
		
		$error="";		
		
		$usr=$_SESSION['username'];
		$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error"); 
		$sql="SELECT status, attemp FROM user WHERE userid='$usr'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) {
			$paket=mysqli_fetch_array($result)['status'];
			$attemp=intval(mysqli_fetch_array($result)['attemp']);
			if(strcasecmp($paket,"free") || strcasecmp($paket,"reg")) $maxattemp=1;
			else if(strcasecmp($paket,"silver")) $maxattemp=5;
			else if(strcasecmp($paket,"gold")) $maxattemp=10;
			else if(strcasecmp($paket,"platinum")) $maxattemp="unlimited";		
		} else {
			$paket="NA";
			$attemp="NA";
			$maxattemp="NA";
		}
		if($attemp == 0) {
			$attemp = 1;
			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error"); 
			$sql="UPDATE user SET attemp = '$attemp' WHERE userid='$usr'";  
			if (!mysqli_query($mysqli,$sql)){
				printf("Error: %s\n", mysqli_error($mysqli));
			}
		}
		
			
		if (isset($_POST['submitdataptn'])) {
			
			$attemp = $attemp + 1;
			// if ($attemp > $maxattemp  && !strcasecmp($paket,"platinum")) {
				 // $error."User sudah mencapai jumlah maksimum attemp yang diizinkan";
			// } else {
				$usr=$_SESSION['username'];
				$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error"); 
				$sql="UPDATE user SET attemp = '$attemp' WHERE userid='$usr'";  
				if (!mysqli_query($mysqli,$sql)){
					printf("Error: %s\n", mysqli_error($mysqli));
				}
			// }
			
			
			if(isset($_POST['ptn1'])) {
				//$_SESSION['ptn1'] = $_POST['ptn1'];
				//echo "".$_POST['ptn1'] ."\n";
			} 
			if(isset($_POST['ptn2'])) {
				//$_SESSION['ptn2'] = $_POST['ptn2'];
				//echo "".$_POST['ptn2'] ."\n";
			}
			if(isset($_POST['ptn3'])) {
				//$_SESSION['ptn3'] = $_POST['ptn3'];
				//echo "".$_POST['ptn3'] ."\n";
			}
			if(isset($_POST['prodi1'])) {
				//$_SESSION['prodi1'] = $_POST['prodi1'];
				//echo "".$_POST['prodi1'] ."\n";
			} 
			if(isset($_POST['prodi2'])) {
				//$_SESSION['prodi2'] = $_POST['prodi2'];
				//echo "".$_POST['prodi2'] ."\n";
			}
			if(isset($_POST['prodi3'])) {
				//$_SESSION['prodi3'] = $_POST['prodi3'];
				//echo "".$_POST['prodi3'] ."\n";
			}
			
			
			
			//Cek prodi
			$ptn1=$_POST['ptn1'];
			$ptn2=$_POST['ptn2'];
			$ptn3=$_POST['ptn3'];
			
			$prodi1=$_POST['prodi1'];
			$prodi2=$_POST['prodi2'];
			$prodi3=$_POST['prodi3'];
			
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
			
						
			if(strcasecmp($error,"")!=0) {						
				$_SESSION['errorptn']=$error;
				header('location: hasilsimulasi.php');		
				exit;					
			}
			else {
				$_SESSION['errorptn']=$error="";
				
				$_SESSION['ptn1'] = $_POST['ptn1'];
				$_SESSION['ptn2'] = $_POST['ptn2'];
				$_SESSION['ptn3'] = $_POST['ptn3'];
				
				$_SESSION['prodi1'] = $_POST['prodi1'];
				$_SESSION['prodi2'] = $_POST['prodi2'];
				$_SESSION['prodi3'] = $_POST['prodi3'];
			}
		}
		
		
		
							
		//Analisis 1
		$aspekWilayah = "Tidak Memenuhi";
		$aspekPTN = "Tidak Memenuhi";
		$aspekProdi = "Tidak Memenuhi";
		
		$provinsisekolah = $_SESSION['provinsisekolah'];
		
		$ptn1=$_SESSION['ptn1'];
		$ptn2=$_SESSION['ptn2'];
		$ptn3=$_SESSION['ptn3'];
		
		$prodi1=$_SESSION['prodi1'];
		$prodi2=$_SESSION['prodi2'];
		$prodi3=$_SESSION['prodi3'];
		
		
		$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  			
		$sql="SELECT provinsi FROM prodi WHERE prodi='$prodi1' AND ptn='$ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $provinsi1=mysqli_fetch_array($result)['provinsi'];
		
		//1 pilihan ptn
		if(strcasecmp($ptn2,"")==0 && strcasecmp($ptn3,"")==0) {
				$aspekWilayah = "Memenuhi";		
				$aspekPTN = "Memenuhi";
				$aspekProdi = "Memenuhi";	
				//echo "case 1";
		}
		// 2 pilihan ptn
		else if (strcasecmp($ptn3,"")==0) {			
			$sql="SELECT provinsi FROM prodi WHERE prodi='$prodi2' AND ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $provinsi2=mysqli_fetch_array($result)['provinsi'];
			
			if(strcasecmp($provinsisekolah,$provinsi1)==0 || strcasecmp($provinsisekolah,$provinsi2)==0) {
				//echo "case 2";
				$aspekWilayah = "Memenuhi";
				$aspekPTN = "Memenuhi";
				$aspekProdi = "Memenuhi";						
			}
			
		}
		else  {
			$sql="SELECT provinsi FROM prodi WHERE prodi='$prodi2' AND ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $provinsi2=mysqli_fetch_array($result)['provinsi'];
			$sql="SELECT provinsi FROM prodi WHERE prodi='$prodi3' AND ptn='$ptn3'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $provinsi3=mysqli_fetch_array($result)['provinsi'];
			
			if(strcasecmp($provinsisekolah,$provinsi1)==0 || strcasecmp($provinsisekolah,$provinsi2)==0 ||  
				strcasecmp($provinsisekolah,$provinsi3)==0) {
				$aspekWilayah = "Memenuhi";		
				//echo "case 3";
			}
			if(strcasecmp($ptn1,$ptn2)==0 || strcasecmp($ptn1,$ptn3)==0 ||  
				strcasecmp($ptn2,$ptn3)==0) {
				//echo "case 4";
				$aspekPTN = "Memenuhi";
				$aspekProdi = "Memenuhi";
			}			
		}
		
		
		//Analisis 2
		list($string1, $string2) = split(' - ',$_SESSION['asalsekolah']);
		$sekolah =  $string1;
		$provinsisekolah = $_SESSION['provinsisekolah'] ;
		$dayaSaingPTN1 = "-";
		$dayaSaingPTN2  = "-";
		$dayaSaingPTN3  = "-";
		$skor_sekolah_ptn1 = floatval(0);
		$skor_sekolah_ptn2 = floatval(0);
		$skor_sekolah_ptn3 = floatval(0);
				
		$sql="SELECT poin FROM dayasaingptn WHERE ptn='$ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['poin'];
		$s1_ptn1 = 0.95* floatval ($tmp);
		$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.5* (0.95* floatval ($tmp)));		
		//echo "s1 ptn 1 : ".$s1_ptn1;
		
		$sql="SELECT poin FROM sekolah WHERE nama='$sekolah'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['poin'];
		$s2_sekolah = floatval ($tmp);	
		$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.1* floatval ($tmp));
		//echo "s2 sekolah : ".$s2_sekolah;
		//$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.1*s2_sekolah);		
		
		$sql="SELECT provinsi FROM prodi WHERE ptn='$ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['provinsi'];
		$provinsi_ptn1 = $tmp;	
		//echo "provinsi_ptn1: ".$provinsi_ptn1;
		$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
		$nilaikode_ptn1 = floatval ($tmp);	
		//echo "s3_ptn1: ".$nilaikode_ptn1;
		
		$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
		$nilaikode_sekolah = floatval ($tmp);	
		
		$mutlakp=($nilaikode_ptn1-$nilaikode_sekolah);
		if($mutlakp < 0) $mutlakp = $mutlakp * (-1);
		$s3_ptn1 = (32-$mutlakp)/33;
		//$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.1* floatval ($tmp));
		$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.3* floatval (100* (32-$mutlakp)/33));
		//$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.3*s3_ptn1);		
		//echo "s3_ptn1: ".$s3_ptn1;
		
		$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['kode'];
		$wil_ptn1 = floatval ($tmp);	
		
		$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['kode'];
		$wil_sekolah = floatval ($tmp);	
		
		$mutlakq=$wil_ptn1-$wil_sekolah;
		if($mutlakq < 0) $mutlakq = $mutlakq * (-1);
		$s4_ptn1 = 100 * (4-$mutlakq)/4;
		//$skor_sekolah_ptn1=  $skor_sekolah_ptn1+(0.1*s4_ptn1);		
		$skor_sekolah_ptn1= $s3_ptn1 * ($skor_sekolah_ptn1+(0.1* floatval (100 * (4-$mutlakq)/4)));
				
		if(strcasecmp($ptn2,"")!=0) {
				$sql="SELECT poin FROM dayasaingptn WHERE ptn='$ptn2'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['poin'];
				$s1_ptn2 = 0.95* floatval ($tmp);
				$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.5* (0.95* floatval ($tmp)));		
				//echo "s1 ptn 1 : ".$s1_ptn2;
				
				$sql="SELECT poin FROM sekolah WHERE nama='$sekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['poin'];
				$s2_sekolah = floatval ($tmp);	
				$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.1* floatval ($tmp));
				//echo "s2 sekolah : ".$s2_sekolah;
				//$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.1*s2_sekolah);		
				
				$sql="SELECT provinsi FROM prodi WHERE ptn='$ptn2'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['provinsi'];
				$provinsi_ptn2 = $tmp;	
				//echo "provinsi_ptn2: ".$provinsi_ptn2;
				$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn2'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
				$nilaikode_ptn2 = floatval ($tmp);	
				//echo "s3_ptn2: ".$nilaikode_ptn2;
				
				$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
				$nilaikode_sekolah = floatval ($tmp);	
				
				$mutlakp=($nilaikode_ptn2-$nilaikode_sekolah);
				if($mutlakp < 0) $mutlakp = $mutlakp * (-1);
				$s3_ptn2 = (32-$mutlakp)/33;
				//$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.1* floatval ($tmp));
				$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.3* floatval (100* (32-$mutlakp)/33));
				//$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.3*s3_ptn2);		
				//echo "s3_ptn2: ".$s3_ptn2;
				
				$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn2'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['kode'];
				$wil_ptn2 = floatval ($tmp);	
				
				$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['kode'];
				$wil_sekolah = floatval ($tmp);	
				
				$mutlakq=$wil_ptn2-$wil_sekolah;
				if($mutlakq < 0) $mutlakq = $mutlakq * (-1);
				$s4_ptn2 = 100 * (4-$mutlakq)/4;
				//$skor_sekolah_ptn2=  $skor_sekolah_ptn2+(0.1*s4_ptn2);		
				$skor_sekolah_ptn2=  $s3_ptn2 * ($skor_sekolah_ptn2+(0.1* floatval (100 * (4-$mutlakq)/4)));
			
		}
		
		if(strcasecmp($ptn3,"")!=0) {
				$sql="SELECT poin FROM dayasaingptn WHERE ptn='$ptn3'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['poin'];
				$s1_ptn3 = 0.95* floatval ($tmp);
				$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.5* (0.95* floatval ($tmp)));		
				//echo "s1 ptn 1 : ".$s1_ptn3;
				
				$sql="SELECT poin FROM sekolah WHERE nama='$sekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['poin'];
				$s2_sekolah = floatval ($tmp);	
				$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.1* floatval ($tmp));
				//echo "s2 sekolah : ".$s2_sekolah;
				//$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.1*s2_sekolah);		
				
				$sql="SELECT provinsi FROM prodi WHERE ptn='$ptn3'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['provinsi'];
				$provinsi_ptn3 = $tmp;	
				//echo "provinsi_ptn3: ".$provinsi_ptn3;
				$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn3'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
				$nilaikode_ptn3 = floatval ($tmp);	
				//echo "s3_ptn3: ".$nilaikode_ptn3;
				
				$sql="SELECT nilaikode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['nilaikode'];
				$nilaikode_sekolah = floatval ($tmp);	
				
				$mutlakp=($nilaikode_ptn3-$nilaikode_sekolah);
				if($mutlakp < 0) $mutlakp = $mutlakp * (-1);
				$s3_ptn3 = (32-$mutlakp)/33;
				//$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.1* floatval ($tmp));
				$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.3* floatval (100* (32-$mutlakp)/33));
				//$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.3*s3_ptn3);		
				//echo "s3_ptn3: ".$s3_ptn3;
				
				$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsi_ptn3'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['kode'];
				$wil_ptn3 = floatval ($tmp);	
				
				$sql="SELECT kode FROM kodewilayahsekolah WHERE provinsi='$provinsisekolah'";  
				$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
				if($result) $tmp=mysqli_fetch_array($result)['kode'];
				$wil_sekolah = floatval ($tmp);	
				
				$mutlakq=$wil_ptn3-$wil_sekolah;
				if($mutlakq < 0) $mutlakq = $mutlakq * (-1);
				$s4_ptn3 = 100 * (4-$mutlakq)/4;
				//$skor_sekolah_ptn3=  $skor_sekolah_ptn3+(0.1*s4_ptn3);		
				$skor_sekolah_ptn3=  $s3_ptn3 * ($skor_sekolah_ptn3+(0.1* floatval (100 * (4-$mutlakq)/4)));
		}
		//echo "s4_ptn1: ".$s4_ptn1;		
		// echo "s4_ptn1: ".$s1_ptn1;
		// echo "s4_ptn1: ".$s3_ptn1;
		// echo "s4_ptn1: ".$s4_ptn1;
		//$skor_sekolah_ptn1= (0.5*s1_ptn1) + (0.1*s2_sekolah) + (3 * s3_ptn1 / 10) + (s4_ptn1 / 10);
		
		//echo "Skor sekolah ptn1 : ".$skor_sekolah_ptn1;
		//if(strcasecmp($ptn1,"")!=0) {} 
		
		//Analisis 3
		$percentile1="-";
		$percentile2="-";
		$percentile3="-";
		$tipeSiswa;
		
		$rata_mat=(0.15*floatval($_SESSION['nhbmat1']))+(0.15*floatval($_SESSION['nhbmat2'])) +(0.15*floatval($_SESSION['nhbmat3']))+(0.15*floatval($_SESSION['nhbmat4']))+(0.4*floatval($_SESSION['nhbmat5']));
		$rata_geo=(0.15*floatval($_SESSION['nhbgeo1']))+(0.15*floatval($_SESSION['nhbgeo2'])) +(0.15*floatval($_SESSION['nhbgeo3']))+(0.15*floatval($_SESSION['nhbgeo4']))+(0.4*floatval($_SESSION['nhbgeo5']));
		$rata_eko=(0.15*floatval($_SESSION['nhbeko1']))+(0.15*floatval($_SESSION['nhbeko2'])) +(0.15*floatval($_SESSION['nhbeko3']))+(0.15*floatval($_SESSION['nhbeko4']))+(0.4*floatval($_SESSION['nhbeko5']));
		$rata_sos=(0.15*floatval($_SESSION['nhbsos1']))+(0.15*floatval($_SESSION['nhbsos2'])) +(0.15*floatval($_SESSION['nhbsos3']))+(0.15*floatval($_SESSION['nhbsos4']))+(0.4*floatval($_SESSION['nhbsos5']));
		
		$rata_bin=(0.15*floatval($_SESSION['nhbbin1']))+(0.15*floatval($_SESSION['nhbbin2'])) +(0.15*floatval($_SESSION['nhbbin3']))+(0.15*floatval($_SESSION['nhbbin4']))+(0.4*floatval($_SESSION['nhbbin5']));
		$rata_bing=(0.15*floatval($_SESSION['nhbbing1']))+(0.15*floatval($_SESSION['nhbbing2'])) +(0.15*floatval($_SESSION['nhbbing3']))+(0.15*floatval($_SESSION['nhbbing4']))+(0.4*floatval($_SESSION['nhbbing5']));
		
		$rata_max=max($rata_mat,$rata_geo,$rata_eko,$rata_sos);
		if($rata_max == $rata_mat) {
			if(max($rata_geo,$rata_eko,$rata_sos)==$rata_geo) $tipeSiswa="MG";
			else if(max($rata_geo,$rata_eko,$rata_sos)==$rata_eko) $tipeSiswa="ME";
			else if(max($rata_geo,$rata_eko,$rata_sos)==$rata_sos) $tipeSiswa="MS";
		}
		else if($rata_max == $rata_geo) {
			if(max($rata_mat,$rata_eko,$rata_sos)==$rata_mat) $tipeSiswa="GM";
			if(max($rata_mat,$rata_eko,$rata_sos)==$rata_eko) $tipeSiswa="GE";
			if(max($rata_mat,$rata_eko,$rata_sos)==$rata_sos) $tipeSiswa="GS";			
		}
		else	if($rata_max == $rata_eko) {
			if(max($rata_geo,$rata_mat,$rata_sos)==$rata_geo) $tipeSiswa="EG";
			if(max($rata_geo,$rata_mat,$rata_sos)==$rata_mat) $tipeSiswa="EM";
			if(max($rata_geo,$rata_mat,$rata_sos)==$rata_sos) $tipeSiswa="ES";
		}
		if($rata_max == $rata_sos) {
			if(max($rata_geo,$rata_eko,$rata_mat)==$rata_geo) $tipeSiswa="SG";
			else if(max($rata_geo,$rata_eko,$rata_mat)==$rata_eko) $TipeSiswa="SE";
			else if(max($rata_geo,$rata_eko,$rata_mat)==$rata_mat) $tipeSiswa="SM";
		}
				
		$sql="SELECT pre FROM prodi WHERE prodi='$prodi1' AND ptn='$ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) $tmp=mysqli_fetch_array($result)['pre'];
		$pre_prodi1 = $tmp;			
		$pre_prodi2 = "-";
		$pre_prodi3 = "-";
		
		if(strcasecmp($tipeSiswa,$pre_prodi1)==0||strcasecmp($tipeSiswa,strrev($pre_prodi1))==0)
			$percentile1="Memenuhi";
		else $percentile1="Tidak Memenuhi";
		if(strcasecmp($prodi2,"")!=0) {
			$sql="SELECT pre FROM prodi WHERE prodi='$prodi2' AND ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $tmp=mysqli_fetch_array($result)['pre'];
			$pre_prodi2 = $tmp;
			if(strcasecmp($tipeSiswa,$pre_prodi2)==0||strcasecmp($tipeSiswa,strrev($pre_prodi2))==0)
				$percentile2="Memenuhi";
			else $percentile2="Tidak Memenuhi";
		}
		if(strcasecmp($prodi3,"")!=0) {
			$sql="SELECT pre FROM prodi WHERE prodi='$prodi3' AND ptn='$ptn3'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) $tmp=mysqli_fetch_array($result)['pre'];
			$pre_prodi3 = $tmp;
			if(strcasecmp($tipeSiswa,$pre_prodi3)==0||strcasecmp($tipeSiswa,strrev($pre_prodi3))==0)
				$percentile3="Memenuhi";
			else $percentile3="Tidak Memenuhi";
		}
		
						
		//Analisis 4 & 5
		$nrm_prodi1=0;
		$nrm_prodi2=0;
		$nrm_prodi3=0;
		
		$eval_nrm1="-";
		$eval_nrm2="-";
		$eval_nrm3="-";
		
		$nrm_siswa = (0.15*$rata_bin) + (0.15*$rata_bing) + (0.175*$rata_mat) + (0.175*$rata_geo) + (0.175*$rata_eko) + (0.175*$rata_sos);		
		
		$urutan_prodi="Memenuhi";
		$tos=0;
		
		$sql="SELECT nrm,tos FROM prodi WHERE prodi='$prodi1' AND ptn='$ptn1'";  
		$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		if($result) {
				$tmp=mysqli_fetch_array($result);
				$nrm_prodi1 = floatval($tmp['nrm']);				
				$tos = $tos + intval($tmp['tos']);
			}
		if($nrm_siswa >= $nrm_prodi1) $eval_nrm1="Memenuhi";
		else $eval_nrm1="Tidak Memenuhi";
		
		if(strcasecmp($prodi2,"")!=0) {
			$sql="SELECT nrm,tos FROM prodi WHERE prodi='$prodi2' AND ptn='$ptn2'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) {
				$tmp=mysqli_fetch_array($result);
				$nrm_prodi2 = floatval($tmp['nrm']);				
				$tos = $tos + intval($tmp['tos']);
			}
			if($nrm_siswa >= $nrm_prodi2) $eval_nrm2="Memenuhi";
			else $eval_nrm2="Tidak Memenuhi";
			if ($nrm_prodi2 > $nrm_prodi1)  $urutan_prodi="Tidak Memenuhi";
		}
		
		if(strcasecmp($prodi3,"")!=0) {
			$sql="SELECT nrm,tos FROM prodi WHERE prodi='$prodi3' AND ptn='$ptn3'";  
			$result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			if($result) {
				$tmp=mysqli_fetch_array($result);
				$nrm_prodi3 = floatval($tmp['nrm']);				
				$tos = $tos + intval($tmp['tos']);
			}
			if($nrm_siswa >= $nrm_prodi3) $eval_nrm3="Memenuhi";
			else $eval_nrm3="Tidak Memenuhi";
			if ($nrm_prodi3 > $nrm_prodi1)  $urutan_prodi="Tidak Memenuhi";
			if ($nrm_prodi3 > $nrm_prodi2)  $urutan_prodi="Tidak Memenuhi";
		}

		//Attemp Data
		
		//Saran Kepada Siswa
		//Berdasarkan percentile
		// style="overflow:scroll; height:400px;"
		// $sql="SELECT ptn, prodi, propinsi, pre FROM prodi WHERE prodi='$prodi1' AND ptn='$ptn1'";  
		// $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
		 
		 $username= $_SESSION['username'];
		 $nama = $_SESSION['nama'];
		 $nisn = $_SESSION['nisn'];
		 $tanggallahir = $_SESSION['tanggallahir'];
		 $filefoto =  $_SESSION['filefoto'];
		 $nohp = $_SESSION['nohp'];
		 $email = $_SESSION['email'];
		 $cabang = $_SESSION['cabang'];
		 $email = $_SESSION['email'];
		 $konselor = $_SESSION['konselor'];
		 
		 $jeniskelas = $_SESSION['jeniskelas'];
		 $sekolah = $_SESSION['asalsekolah'];
		 $jenjang = $_SESSION['jenjang'];;
		 $akreditasi = $_SESSION['akreditasisekolah'];
		 $provinsi = $_SESSION['provinsisekolah'];
		 $kurikulum = $_SESSION['kurikulum'];
		 
		 $kkmbin1 = floatval($_SESSION['kkmbin1']);
		 $nhbbin1 = floatval($_SESSION['nhbbin1']);
		 $kkmbing1 = floatval($_SESSION['kkmbing1']);
		 $nhbbing1 = floatval($_SESSION['nhbbing1']);
		 $kkmmat1 = floatval($_SESSION['kkmmat1']);
		 $nhbmat1 = floatval($_SESSION['nhbmat1']);
		 $kkmgeo1 = floatval($_SESSION['kkmgeo1']);
		 $nhbgeo1 = floatval($_SESSION['nhbgeo1']);
		 $kkmeko1 = floatval($_SESSION['kkmeko1']);
		 $nhbeko1 = floatval($_SESSION['nhbeko1']);
		 $kkmsos1 = floatval($_SESSION['kkmsos1']);
		 $nhbsos1 = floatval($_SESSION['nhbsos1']);
		 
		 $kkmbin2 = floatval($_SESSION['kkmbin2']);
		 $nhbbin2 = floatval($_SESSION['nhbbin2']);
		 $kkmbing2 = floatval($_SESSION['kkmbing2']);
		 $nhbbing2 = floatval($_SESSION['nhbbing2']);
		 $kkmmat2 = floatval($_SESSION['kkmmat2']);
		 $nhbmat2 = floatval($_SESSION['nhbmat2']);
		 $kkmgeo2 = floatval($_SESSION['kkmgeo2']);
		 $nhbgeo2 = floatval($_SESSION['nhbgeo2']);
		 $kkmeko2 = floatval($_SESSION['kkmeko2']);
		 $nhbeko2 = floatval($_SESSION['nhbeko2']);
		 $kkmsos2 = floatval($_SESSION['kkmsos2']);
		 $nhbsos2 = floatval($_SESSION['nhbsos2']);
		 
		 $kkmbin3 = floatval($_SESSION['kkmbin3']);
		 $nhbbin3 = floatval($_SESSION['nhbbin3']);
		 $kkmbing3 = floatval($_SESSION['kkmbing3']);
		 $nhbbing3 = floatval($_SESSION['nhbbing3']);
		 $kkmmat3 = floatval($_SESSION['kkmmat3']);
		 $nhbmat3 = floatval($_SESSION['nhbmat3']);
		 $kkmgeo3 = floatval($_SESSION['kkmgeo3']);
		 $nhbgeo3 = floatval($_SESSION['nhbgeo3']);
		 $kkmeko3 = floatval($_SESSION['kkmeko3']);
		 $nhbeko3 = floatval($_SESSION['nhbeko3']);
		 $kkmsos3 = floatval($_SESSION['kkmsos3']);
		 $nhbsos3 = floatval($_SESSION['nhbsos3']);
		 
		 $kkmbin4 = floatval($_SESSION['kkmbin4']);
		 $nhbbin4 = floatval($_SESSION['nhbbin4']);
		 $kkmbing4 = floatval($_SESSION['kkmbing4']);
		 $nhbbing4 = floatval($_SESSION['nhbbing4']);
		 $kkmmat4 = floatval($_SESSION['kkmmat4']);
		 $nhbmat4 = floatval($_SESSION['nhbmat4']);
		 $kkmgeo4 = floatval($_SESSION['kkmgeo4']);
		 $nhbgeo4 = floatval($_SESSION['nhbgeo4']);
		 $kkmeko4 = floatval($_SESSION['kkmeko4']);
		 $nhbeko4 = floatval($_SESSION['nhbeko4']);
		 $kkmsos4 = floatval($_SESSION['kkmsos4']);
		 $nhbsos4 = floatval($_SESSION['nhbsos4']);
		 
		 $kkmbin5 = floatval($_SESSION['kkmbin5']);
		 $nhbbin5 = floatval($_SESSION['nhbbin5']);
		 $kkmbing5 = floatval($_SESSION['kkmbing5']);
		 $nhbbing5 = floatval($_SESSION['nhbbing5']);
		 $kkmmat5 = floatval($_SESSION['kkmmat5']);
		 $nhbmat5 = floatval($_SESSION['nhbmat5']);
		 $kkmgeo5 = floatval($_SESSION['kkmgeo5']);
		 $nhbgeo5 = floatval($_SESSION['nhbgeo5']);
		 $kkmeko5 = floatval($_SESSION['kkmeko5']);
		 $nhbeko5 = floatval($_SESSION['nhbeko5']);
		 $kkmsos5 = floatval($_SESSION['kkmsos5']);
		 $nhbsos5 = floatval($_SESSION['nhbsos5']);
		 //$_nrm = $nrm_siswa."";
		 
		 
		// echo " ".$sekolah.$jenjang.$cabang.$_nrm.$ptn1.$ptn2;
		 
		 $sql="INSERT INTO history_ips 
				(user, nama, nisn, tanggallahir,filefoto, nohp, email,cabang,konselor,
				jenjang, jeniskelas, sekolah, akreditasi, provinsi, kurikulum, 
				ptn1, prodi1, ptn2, prodi2, ptn3, prodi3,
			    kkmbin1,nhbbin1,kkmbing1,nhbbing1,kkmmat1,nhbmat1,kkmgeo1,nhbgeo1,kkmeko1,nhbeko1,kkmsos1,nhbsos1,
				kkmbin2,nhbbin2,kkmbing2,nhbbing2,kkmmat2,nhbmat2,kkmgeo2,nhbgeo2,kkmeko2,nhbeko2,kkmsos2,nhbsos2,
				kkmbin3,nhbbin3,kkmbing3,nhbbing3,kkmmat3,nhbmat3,kkmgeo3,nhbgeo3,kkmeko3,nhbeko3,kkmsos3,nhbsos3,
				kkmbin4,nhbbin4,kkmbing4,nhbbing4,kkmmat4,nhbmat4,kkmgeo4,nhbgeo4,kkmeko4,nhbeko4,kkmsos4,nhbsos4,
				kkmbin5,nhbbin5,kkmbing5,nhbbing5,kkmmat5,nhbmat5,kkmgeo5,nhbgeo5,kkmeko5,nhbeko5,kkmsos5,nhbsos5,
				nrm,tipe, has_confirmed)				
				VALUES 
				('$username', '$nama', '$nisn', '$tanggallahir','$filefoto','$nohp', '$email','$cabang','$konselor',
				'$jenjang', '$jeniskelas', '$sekolah', '$akreditasi', '$provinsi', '$kurikulum',
				'$ptn1','$prodi1', '$ptn2','$prodi2', '$ptn3','$prodi3',
				$kkmbin1,$nhbbin1, $kkmbing1,$nhbbing1, $kkmmat1,$nhbmat1, $kkmgeo1,$nhbgeo1, $kkmeko1,$nhbeko1, $kkmsos1,$nhbsos1,
				$kkmbin2,$nhbbin2, $kkmbing2,$nhbbing2, $kkmmat2,$nhbmat2, $kkmgeo2,$nhbgeo2, $kkmeko2,$nhbeko2, $kkmsos2,$nhbsos2, 
				$kkmbin3,$nhbbin3, $kkmbing3,$nhbbing3, $kkmmat3,$nhbmat3, $kkmgeo3,$nhbgeo3, $kkmeko3,$nhbeko3, $kkmsos3,$nhbsos3, 
				$kkmbin4,$nhbbin4, $kkmbing4,$nhbbing4, $kkmmat4,$nhbmat4, $kkmgeo4,$nhbgeo4, $kkmeko4,$nhbeko4, $kkmsos4,$nhbsos4, 
				$kkmbin5,$nhbbin5, $kkmbing5,$nhbbing5, $kkmmat5,$nhbmat5, $kkmgeo5,$nhbgeo5, $kkmeko5,$nhbeko5, $kkmsos5,$nhbsos5,
				$nrm_siswa,'$tipeSiswa', 1) 
				ON DUPLICATE KEY UPDATE 
				nama='$nama',
				nisn='$nisn',
				tanggallahir='$tanggallahir',
				filefoto='$filefoto',
				nohp='$nohp',
				email='$email',
				cabang='$cabang',
				konselor='$konselor',
				jenjang='$jenjang',
				jeniskelas='$jeniskelas',
				sekolah='$sekolah',
				akreditasi='$akreditasi',
				provinsi='$provinsi',
				kurikulum='$kurikulum',
				ptn1='$ptn1',
				prodi1='$prodi1',
				ptn2='$ptn2',
				prodi2='$prodi2',
				ptn3='$ptn3',
				prodi3='$prodi3',
				kkmbin1=$kkmbin1,
				nhbbin1=$nhbbin1,
				kkmbing1=$kkmbing1,
				nhbbing1=$nhbbing1,
				kkmmat1=$kkmmat1,
				nhbmat1=$nhbmat1,
				kkmgeo1=$kkmgeo1,
				nhbgeo1=$nhbgeo1,
				kkmeko1=$kkmeko1,
				nhbeko1=$nhbeko1,
				kkmsos1=$kkmsos1,
				nhbsos1=$nhbsos1,
				kkmbin2=$kkmbin2,
				nhbbin2=$nhbbin2,
				kkmbing2=$kkmbing2,
				nhbbing2=$nhbbing2,
				kkmmat2=$kkmmat2,
				nhbmat2=$nhbmat2,
				kkmgeo2=$kkmgeo2,
				nhbgeo2=$nhbgeo2,
				kkmeko2=$kkmeko2,
				nhbeko2=$nhbeko2,
				kkmsos2=$kkmsos2,
				nhbsos2=$nhbsos2,
				kkmbin3=$kkmbin3,
				nhbbin3=$nhbbin3,
				kkmbing3=$kkmbing3,
				nhbbing3=$nhbbing3,
				kkmmat3=$kkmmat3,
				nhbmat3=$nhbmat3,
				kkmgeo3=$kkmgeo3,
				nhbgeo3=$nhbgeo3,
				kkmeko3=$kkmeko3,
				nhbeko3=$nhbeko3,
				kkmsos3=$kkmsos3,
				nhbsos3=$nhbsos3,
				kkmbin4=$kkmbin4,
				nhbbin4=$nhbbin4,
				kkmbing4=$kkmbing4,
				nhbbing4=$nhbbing4,
				kkmmat4=$kkmmat4,
				nhbmat4=$nhbmat4,
				kkmgeo4=$kkmgeo4,
				nhbgeo4=$nhbgeo4,
				kkmeko4=$kkmeko4,
				nhbeko4=$nhbeko4,
				kkmsos4=$kkmsos4,
				nhbsos4=$nhbsos4,
				kkmbin5=$kkmbin5,
				nhbbin5=$nhbbin5,
				kkmbing5=$kkmbing5,
				nhbbing5=$nhbbing5,
				kkmmat5=$kkmmat5,
				nhbmat5=$nhbmat5,
				kkmgeo5=$kkmgeo5,
				nhbgeo5=$nhbgeo5,
				kkmeko5=$kkmeko5,
				nhbeko5=$nhbeko5,
				kkmsos5=$kkmsos5,
				nhbsos5=$nhbsos5,
				nrm=$nrm_siswa,
				tipe='$tipeSiswa',
				has_confirmed=1";
				
				// '$kkmbin1','$nhbbin1', '$kkmbing1','$nhbbing1', '$kkmmat1','$nhbmat1', '$kkmgeo1','$nhbgeo1', '$kkmeko1','$nhbeko1', '$kkmsos1','$nhbsos1',
				// '$kkmbin2','$nhbbin2', '$kkmbing2','$nhbbing2', '$kkmmat2','$nhbmat2', '$kkmgeo2','$nhbgeo2', '$kkmeko2','$nhbeko2', '$kkmsos2','$nhbsos2', 
				// '$kkmbin3','$nhbbin3', '$kkmbing3','$nhbbing3', '$kkmmat3','$nhbmat3', '$kkmgeo3','$nhbgeo3', '$kkmeko3','$nhbeko3', '$kkmsos3','$nhbsos3', 
				// '$kkmbin4','$nhbbin4', '$kkmbing4','$nhbbing4', '$kkmmat4','$nhbmat4', '$kkmgeo4','$nhbgeo4', '$kkmeko4','$nhbeko4', '$kkmsos4','$nhbsos4', 
				// '$kkmbin5','$nhbbin5', '$kkmbing5','$nhbbing5', '$kkmmat5','$nhbmat5', '$kkmgeo5','$nhbgeo5', '$kkmeko5','$nhbeko5', '$kkmsos5','$nhbbio5',
		 //mysqli_query($mysqli,$sql);
		 // $mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name);
		 // $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
			// if($result) {
				// echo "insert berhasil";				
			// } else {
				// echo "insert gagal";
			// }
		 $conn = mysqli_connect($db_server, $db_username, $db_password, $db_database_name);
		 if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			echo "INSERT Error";
			printf("Errormessage: %s\n", mysqli_error($conn));
		}
		//$result = mysqli_query($mysqli,$sql) or die(mysqli_error()); 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Klinik SNMPTN</title>
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

		<style type="text/css">

			.edit-panel-btn {
                margin-bottom: 0px;
                background-color: white;
            }

			.select-option {
				    margin-bottom: 0px;
				}
		</style>
		
	</head>
    <body>
        <?php 
            include 'navbar.php';
         ?>
		
       <div class="main-container">			
            <section style="padding-top:50px">
            	<div class="container">
            		<div class="row">
            			<div class="col-sm-12" style="margin-bottom: 60px;">
                            <h3> <strong>HASIL SIMULASI</strong> </h3>
                        </div>
						
            			<div class="col-sm-12">
                            <div class="panel panel-success">
                                <!-- <div class="panel-heading">1. Cek Biodata Siswa dan Sekolah <a class="btn btn-sm btn-rounded edit-panel-btn" href="#"><span class="ti-pencil">&nbsp;</span>ubah</a></div> -->
                                <div class="panel-heading">
	            					<div class="panel-title text-center">
	            						A. IDENTITAS SISWA 	
	            					</div>
            					</div>                              
								<div class="panel-body">
								<center>
								<table>
									<tr>
										<td style="margin:10px;padding:10px;">
											<div class="panel panel-default">
												<table class="table">
												<tbody>
													<tr><td><strong>Nama <strong></td><td> <?php echo $_SESSION['nama'] ?> </td></tr>
													<tr><td><strong>NISN <strong></td><td> <?php echo $_SESSION['nisn'] ?> </td></tr>
													<tr><td><strong>Tanggal Lahir <strong>&nbsp;&nbsp;&nbsp;</td><td> <?php echo $_SESSION['tanggallahir'] ?> </td></tr>
													<tr><td><strong>Foto Siswa <strong>&nbsp;&nbsp;&nbsp;</td><td> <?php echo $_SESSION['filefoto'] ?> </td></tr>
													<tr><td><strong>No.Hp <strong></td><td> <?php echo $_SESSION['nohp'] ?> </td></tr>
													<tr><td><strong>Email <strong></td><td> <?php echo $_SESSION['email'] ?> </td></tr>											
													<tr><td><strong>Cabang </stong></td><td>   <?php echo $_SESSION['cabang'] ?> </td></tr>
												</tbody>
												</table>
											</div>
										</td>

										<td style="margin:10px;padding:10px;">
											<div class="panel panel-default">
												<table class="table">
												<tbody>
													<tr><td><strong>Konselor </stong></td><td>   <?php echo $_SESSION['konselor'] ?> </td></tr>
													<tr><td><strong>Jenjang </stong></td><td>   <?php echo $_SESSION['jenjang'] ?> </td></tr>
													<tr><td><strong>Jenis Kelas </stong></td><td>   <?php echo $_SESSION['jeniskelas'] ?> </td></tr>           
													<tr><td><strong>Asal Sekolah </stong></td><td>   <?php echo $_SESSION['asalsekolah'] ?> </td></tr>           
													<tr><td><strong>Akreditasi Sekolah </stong></td><td>   <?php echo $_SESSION['akreditasisekolah'] ?> </td></tr>       
													<tr><td><strong>Provinsi Sekolah </stong></td><td>   <?php echo $_SESSION['provinsisekolah'] ?> </td></tr>       
													<tr><td><strong>Kurikulum Sekolah  &nbsp;&nbsp;&nbsp;</stong></td><td>   <?php echo $_SESSION['kurikulum'] ?> </td></tr>
												</tbody>
												</table>
											</div>
										</td>

										<td style="margin:10px;padding:10px;">
											<div class="panel panel-default">
												<table class="table">
												<tbody>											
													<center>
														<img style="width:200px; margin-top:10px;" src="./uploads/<?php echo $_SESSION['filefoto'] ?>"  />
													</center>
												</tbody>
												</table>
											</div>
										</td>

									</tr>
									
									
									<tr>
										<td style="margin:10px;padding:10px;">
											<div class="panel panel-default">
												<table class="table">
												<tbody>
													<tr><td><strong>Paket<strong></td><td> <?php echo $paket?> </td></tr>
												</tbody>
												</table>
											</div>
										</td>										
										<td style="margin:10px;padding:10px;">
											<div class="panel panel-default">
												<table class="table">
												<tbody>
													<tr><td><strong>Attemp<strong></td><td> <?php echo $attemp?> attemp</td></tr>
												</tbody>
												</table>
											</div>
										</td>
									</tr>
										
								</table>
								</center>			
                            </div>
                        </div>

                        <div class="col-sm-12">
            				<div class="panel panel-success">
            					<div class="panel-heading">
            						<div class="panel-title text-center">
            							B. NILAI SISWA 
            						</div>
            					</div>
            					<div class="panel-body">
            						<table class="table">	
            						<tbody>			
									  <tr>
										<td> Mata Pelajaran </td>							
										<td> KKM-1 </td>
										<td> NHB-1 </td>	
										<td> KKM-2 </td>
										<td> NHB-2 </td>
										<td> KKM-3 </td>
										<td> NHB-3 </td>	
										<td> KKM-4 </td>
										<td> NHB-4 </td>
										<td> KKM-5 </td>
										<td> NHB-5 </td>								
									  </tr>
									  
									   <tr>
										<td> Bahasa Indonesia </td>							
										<td> <?php echo $_SESSION['kkmbin1'] ?> </td>
										<td> <?php echo $_SESSION['nhbbin1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbin2'] ?> </td>
										<td> <?php echo $_SESSION['nhbbin2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmbin3'] ?> </td>
										<td> <?php echo $_SESSION['nhbbin3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbin4'] ?> </td>
										<td> <?php echo $_SESSION['nhbbin4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbin5'] ?> </td>
										<td> <?php echo $_SESSION['nhbbin5'] ?>  </td>									
									  </tr>
									  
									  
									  <tr>
										<td> Bahasa Inggris</td>							
										<td> <?php echo $_SESSION['kkmbing1'] ?> </td>
										<td> <?php echo $_SESSION['nhbbing1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbing2'] ?> </td>
										<td> <?php echo $_SESSION['nhbbing2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmbing3'] ?> </td>
										<td> <?php echo $_SESSION['nhbbing3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbing4'] ?> </td>
										<td> <?php echo $_SESSION['nhbbing4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmbing5'] ?> </td>
										<td> <?php echo $_SESSION['nhbbing5'] ?>  </td>									
									  </tr>
																 
									  
									  <tr>
										<td> Matematika </td>							
										<td> <?php echo $_SESSION['kkmmat1'] ?> </td>
										<td> <?php echo $_SESSION['nhbmat1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmmat2'] ?> </td>
										<td> <?php echo $_SESSION['nhbmat2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmmat3'] ?> </td>
										<td> <?php echo $_SESSION['nhbmat3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmmat4'] ?> </td>
										<td> <?php echo $_SESSION['nhbmat4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmmat5'] ?> </td>
										<td> <?php echo $_SESSION['nhbmat5'] ?>  </td>									
									  </tr>
									  
									  <tr>
										<td> Geografi </td>							
										<td> <?php echo $_SESSION['kkmgeo1'] ?> </td>
										<td> <?php echo $_SESSION['nhbgeo1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmgeo2'] ?> </td>
										<td> <?php echo $_SESSION['nhbgeo2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmgeo3'] ?> </td>
										<td> <?php echo $_SESSION['nhbgeo3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmgeo4'] ?> </td>
										<td> <?php echo $_SESSION['nhbgeo4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmgeo5'] ?> </td>
										<td> <?php echo $_SESSION['nhbgeo5'] ?>  </td>									
									  </tr>
									  
									  <tr>
										<td> Ekonomi </td>							
										<td> <?php echo $_SESSION['kkmeko1'] ?> </td>
										<td> <?php echo $_SESSION['nhbeko1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmeko2'] ?> </td>
										<td> <?php echo $_SESSION['nhbeko2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmeko3'] ?> </td>
										<td> <?php echo $_SESSION['nhbeko3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmeko4'] ?> </td>
										<td> <?php echo $_SESSION['nhbeko4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmeko5'] ?> </td>
										<td> <?php echo $_SESSION['nhbeko5'] ?>  </td>									
									  </tr>
									  
									  
									  	<tr>
										<td> Sosiologi </td>							
										<td> <?php echo $_SESSION['kkmsos1'] ?> </td>
										<td> <?php echo $_SESSION['nhbsos1'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmsos2'] ?> </td>
										<td> <?php echo $_SESSION['nhbsos2'] ?>  </td>		
										<td> <?php echo $_SESSION['kkmsos3'] ?> </td>
										<td> <?php echo $_SESSION['nhbsos3'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmsos4'] ?> </td>
										<td> <?php echo $_SESSION['nhbsos4'] ?>  </td>	
										<td> <?php echo $_SESSION['kkmsos5'] ?> </td>
										<td> <?php echo $_SESSION['nhbsos5'] ?>  </td>									
									  </tr>
									  </tbody>	
                            		</table>
            					</div>
            				</div>
            			</div>
			
            			<div class="col-sm-12">
            				<hr>
            			</div>
						
            			<div class="col-sm-12">
            				<div class="panel panel-info">
            					<div class="panel-heading">
							      <center>
								  <h4 class="panel-title">
							        <a class="btn btn-sm btn-rounded edit-panel-btn" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
							        Ubah Pilihan PTN dan Prodi</a>
							      </h4>
								  </center>
							    </div>
								
								<?php
												if(strcasecmp($_SESSION['errorptn'],"")!=0) {
													$er = $_SESSION['errorptn'];	
													echo '<h6 style=color:#ff0000;>'.$er.'</h6>';											
												}
								?>
            					<div id="collapse1" class="panel-collapse collapse">
	            					<div class="panel-body">
		            					<form method="post" action="">
		            						
											<?php
										//if((strcasecmp($_SESSION['user_status'],"free")!=0) && (strcasecmp($_SESSION['user_status'],"reg")!=0)) {
										if((strcasecmp($_SESSION['user_status'],"free")!=0)      ) {
											echo '<div class="panel panel-success"> ';
											echo '	<div class="panel-body"> ';
											echo '		<h5>Pilihan 1</h5> ';
											echo '		<div class="row"> ';
											echo '			<div class="col-sm-6"> ';
											echo '				<ul data-bullet="ti-check-box"> ';
							                echo '                    <li><strong>Perguruan Tinggi 1:</strong>'. $_SESSION['ptn1']. '</li> ';
							                echo '                    <li><strong>Program Studi 1:</strong> '. $_SESSION['prodi1']. ' </li> ';
											echo '				</ul> ';
											echo '			</div> ';
											echo '			<div class="col-sm-6"> ';
											echo '				<div class="select-option"> ';
								            echo '                    <select name="ptn1" id="ptn1"  placeholder="PTN Pilihan ke-1" onchange="SelectProdi(\'1\')"> ';
								            echo '                        <option value=""> Ubah Pilih PTN 1</option> ';
								            echo '                    </select> ';
								            echo '                </div>   ';                   

								            echo '                <div class="select-option"> ';				
								            echo '                    <select name="prodi1" id="prodi1" placeholder="Prodi Pilihan ke-1"> ';
								            echo '                        <option value="">Prodi 1</option> ';
								            echo '                    </select> ';
								            echo '                </div> ';
											echo '			</div> ';
											echo '		</div> ';
					                        echo '    </div> ';
				                            echo '</div> ';

				                            echo '<div class="panel panel-success">  ';
											echo '	<div class="panel-body"> ';
						                    echo '        <h5>Pilihan 2</h5> ';
											echo '		<div class="row"> ';
											echo '			<div class="col-sm-6"> ';
											echo '				<ul data-bullet="ti-check-box"> ';
							                echo '                    <li><strong>Perguruan Tinggi 2:</strong>'. $_SESSION['ptn2'].'</li> ';
							                echo '                    <li><strong>Program Studi 2:</strong>  '. $_SESSION['prodi2'].'</li> ';
											echo '				</ul> ';
											echo '			</div> ';
											echo '			<div class="col-sm-6"> ';
											echo '				<div class="select-option"> ';
								            echo '                     <select name="ptn2" id="ptn2" onchange="SelectProdi(\'2\')"> ';
								            echo '                        <option value="">Prodi 2</option> ';              
								            echo '                     </select> ';
								            echo '                </div> ';

								            echo '                <div class="select-option"> ';                     
								            echo '                     <select name="prodi2" id="prodi2"> ';
								            echo '                        <option value="">Prodi 2</option>  ';
								            echo '                    </select> ';
								            echo '                </div> ';
											echo '			</div> ';
											echo '		</div> ';
				                            echo '	</div> ';
				                            echo '</div> ';

				                            echo '<div class="panel panel-success"> ';
											echo '	<div class="panel-body"> ';
						                    echo '        <h5>Pilihan 3</h5> ';
											echo '		<div class="row"> ';
											echo '			<div class="col-sm-6"> ';
								            echo '                <ul data-bullet="ti-check-box"> ';
							                echo '                    <li><strong>Perguruan Tinggi 3:</strong>'.$_SESSION['ptn3']. '</li> ';
							                echo '                    <li><strong>Program Studi 3:</strong>'. $_SESSION['prodi3'].' </li> ';
											echo '				</ul> ';
											echo '			</div> ';
											echo '			<div class="col-sm-6"> ';
								            echo '                <div class="select-option"> ';
								            echo '                     <select name="ptn3" id="ptn3" onchange="SelectProdi(\'3\')"> ';
								            echo '                        <option value=""> Pilih PTN 3</option>  ';             
								            echo '                     </select> ';             
								            echo '                </div> ';
								            echo '                <div class="select-option">  ';
								            echo '                     <select name="prodi3" id="prodi3"> ';
								            echo '                        <option value="">Prodi 3</option>  ';             
								            echo '                     </select>   ';
								            echo '                </div> ';
								            echo '           </div> ';
						                    echo '       </div> ';
						                    echo '     </div> ';
					                        echo ' </div> ';
					                        echo ' <div class="col-xs-4 col1 center-block" style="float: none;"> ';
				                            echo '	<input class="btn btn-sm btn-rounded edit-panel-btn" type="submit" value="SUBMIT PILIHAN" name="submitdataptn"/> ';
				                           	echo ' </div> ';
				                           
										} else {											
											echo '<h6 style=color:#ff0000;>'."Mengubah data pilihan PTN dan Prodi tidak dapat dilakukan untuk paket Free".'</h6>';	
										}
										?>
										
											<!--
											<div class="panel panel-success">
												<div class="panel-body">
													<h5>Pilihan 1</h5>
													<div class="row">
														<div class="col-sm-6">
															<ul data-bullet="ti-check-box">
							                                    <li><strong>Perguruan Tinggi 1:</strong> <?php echo $_SESSION['ptn1'] ?> </li>
							                                    <li><strong>Program Studi 1:</strong>   <?php echo $_SESSION['prodi1'] ?> </li>
															</ul>
														</div>
														<div class="col-sm-6">
															<div class="select-option">
								                                <select name="ptn1" id="ptn1"  placeholder="PTN Pilihan ke-1" onchange="SelectProdi('1')">
								                                    <option value=""> Ubah Pilih PTN 1</option>
								                                </select>
								                            </div>                     

								                            <div class="select-option">				
								                                <select name="prodi1" id="prodi1" placeholder="Prodi Pilihan ke-1">
								                                    <option value="">Prodi 1</option>
								                                </select>
								                            </div>
														</div>
													</div>
					                            </div>
				                            </div>

				                            <div class="panel panel-success">
												<div class="panel-body">
						                            <h5>Pilihan 2</h5>
													<div class="row">
														<div class="col-sm-6">
															<ul data-bullet="ti-check-box">
							                                    <li><strong>Perguruan Tinggi 2:</strong> <?php echo $_SESSION['ptn2'] ?> </li>
							                                    <li><strong>Program Studi 2:</strong>   <?php echo $_SESSION['prodi2'] ?> </li>
															</ul>
														</div>
														<div class="col-sm-6">
															<div class="select-option">
								                                 <select name="ptn2" id="ptn2" onchange="SelectProdi('2')">
								                                    <option value="">Prodi 2</option>              
								                                 </select>
								                            </div>

								                            <div class="select-option">                     
								                                 <select name="prodi2" id="prodi2">
								                                    <option value="">Prodi 2</option> 
								                                </select>
								                            </div>
														</div>
													</div>
				                            	</div>
				                            </div>

				                            <div class="panel panel-success">
												<div class="panel-body">
						                            <h5>Pilihan 3</h5>
													<div class="row">
														<div class="col-sm-6">
								                            <ul data-bullet="ti-check-box">
							                                    <li><strong>Perguruan Tinggi 3:</strong> <?php echo $_SESSION['ptn3'] ?> </li>
							                                    <li><strong>Program Studi 3:</strong>   <?php echo $_SESSION['prodi3'] ?> </li>
															</ul>
														</div>
														<div class="col-sm-6">
								                            <div class="select-option">
								                                 <select name="ptn3" id="ptn3" onchange="SelectProdi('3')">
								                                    <option value=""> Pilih PTN 3</option>              
								                                 </select>             
								                            </div>
								                            <div class="select-option"> 
								                                 <select name="prodi3" id="prodi3">
								                                    <option value="">Prodi 3</option>              
								                                 </select>  
								                            </div>
								                        </div>
						                           </div>
						                         </div>
					                         </div>
					                         <div class="col-xs-4 col1 center-block" style="float: none;">
				                            	<input class="btn btn-sm btn-rounded edit-panel-btn" type="submit" value="SUBMIT PILIHAN" name="submitdataptn"/>
				                           	 </div>
				                           -->
										   
		                            	</form>
	            					</div>
            					</div>
            				</div>
            			</div>

            			<div class="col-sm-12">
            				<div class="panel panel-success">
            					<div class="panel-heading">
	            					<div class="panel-title text-center">
	            						C. PILIHAN PTN DAN PRODI	
	            					</div>
            					</div>
            					<div class="panel-body">	 
								 <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="prodi">
								 	<thead>
								 		<tr>
								 			<th>No.</th>
								 			<th>Program Studi</th>
								 			<th>PTN</th>
								 			<th>Point</th>
								 			<th>Ktg</th>
								 			<th>NRM</th>
								 			<th>ToS</th>
								 			<th>Provinsi</th>
								 			<th>Mnt</th>
								 		</tr>
								 	</thead>
								 	<tbody>
								 		<?php  require 'access.php';
								 			$mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");
								 			$sql="SELECT *  FROM prodi WHERE ptn='$ptn1' and prodi='$prodi1'";  
											$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
											
											if($result)  {
												  $linenumber=1;
												  while($row=mysqli_fetch_array($result))  {
													echo '	      			<tr>';
													echo '	      				<th>'.$linenumber.'</th>';
													echo '	      				<th>'.$row['prodi'].'</th>';
													echo '	      				<th>'.$row['ptn'].'</th>';
													echo '	      				<th>'.$row['poin'].'</th>';
													echo '	      				<th>'.$row['ktg'].'</th>';
													echo '	      				<th>'.round(floatval($row['nrm']),2).'</th>';
													echo '	      				<th>'.$row['tos'].'</th>';
													echo '	      				<th>'.$row['provinsi'].'</th>';
													echo '	      				<th>'.$row['mp'].'</th>';
													echo '	      			</tr>';
													$linenumber= $linenumber+1;
												  }  
											 } 
											 $sql="SELECT *  FROM prodi WHERE ptn='$ptn2' and prodi='$prodi2'";  
											$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
											
											if($result)  {
												  $linenumber=2;
												  while($row=mysqli_fetch_array($result))  {
													echo '	      			<tr>';
													echo '	      				<th>'.$linenumber.'</th>';
													echo '	      				<th>'.$row['prodi'].'</th>';
													echo '	      				<th>'.$row['ptn'].'</th>';
													echo '	      				<th>'.$row['poin'].'</th>';
													echo '	      				<th>'.$row['ktg'].'</th>';
													echo '	      				<th>'.round(floatval($row['nrm']),2).'</th>';
													echo '	      				<th>'.$row['tos'].'</th>';
													echo '	      				<th>'.$row['provinsi'].'</th>';
													echo '	      				<th>'.$row['mp'].'</th>';
													echo '	      			</tr>';
													$linenumber= $linenumber+1;
												  }  
											 } 
											 $sql="SELECT *  FROM prodi WHERE ptn='$ptn3' and prodi='$prodi3'";  
											$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
											
											if($result)  {
												  $linenumber=3;
												  while($row=mysqli_fetch_array($result))  {
													echo '	      			<tr>';
													echo '	      				<th>'.$linenumber.'</th>';
													echo '	      				<th>'.$row['prodi'].'</th>';
													echo '	      				<th>'.$row['ptn'].'</th>';
													echo '	      				<th>'.$row['poin'].'</th>';
													echo '	      				<th>'.$row['ktg'].'</th>';
													echo '	      				<th>'.round(floatval($row['nrm']),2).'</th>';
													echo '	      				<th>'.$row['tos'].'</th>';
													echo '	      				<th>'.$row['provinsi'].'</th>';
													echo '	      				<th>'.$row['mp'].'</th>';
													echo '	      			</tr>';
													$linenumber= $linenumber+1;
												  }  
											 } 
										?>	 			 		
								 	</tbody>
								 </table>
								</div>

            				</div>
            			</div>
						
            			<div class="col-sm-12">
            				<hr>
            			</div>
						
						<!-- <div class="col-sm-12">
            				<div class="panel panel-info">
            					<div class="panel-heading">
							      <center>
								  <h4 class="panel-title">
							        <a class="btn btn-sm btn-rounded edit-panel-btn" data-toggle="collapse" data-parent="#accordion" href="#collapseformnilai">
							        Ubah Data Nilai</a>
							      </h4>
								  </center>
							    </div>
								
								<?php
												// if(strcasecmp($_SESSION['errorptn'],"")!=0) {
													// $er = $_SESSION['errorptn'];	
													// echo '<h6 style=color:#ff0000;>'.$er.'</h6>';											
												// }
								?>
            					<div id="collapseformnilai" class="panel-collapse collapse">
	            					<div class="panel-body">
		            					<form method="post" action="">
											<div class="container">	
											  <div class="panel-group">
												  <?php for ($semester = 1; $semester <= 5; $semester++) {

													echo '	    <div class="panel panel-success" style="margin-bottom: 20px; width:94%;">';
													echo '	      <div class="panel-heading" style="text-align: center;">Semester '. $semester .'</div>';
													echo '	      <div class="panel-body">';
													echo '	      	<table class="table table-bordered">';
													echo '	      		<thead>';
													echo '	      			<tr style="text-align: center;">';
													echo '	      				<th>Bahasa Indonesia</th>';
													echo '	      				<th>Bahasa Inggris</th>';
													echo '	      				<th>Matematika</th>';
													echo '	      				<th>Geografi</th>';
													echo '	      				<th>Ekonomi</th>';
													echo '	      				<th>Sosiologi</th>';
													echo '	      			</tr>';
													echo '	      		</thead>';
													echo '	      		<tbody>';
													echo '	      			<tr>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmbin'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbbin'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmbing'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbbing'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmmat'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbmat'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmgeo'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbgeo'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmeko'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbeko'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      				<td>';
													echo '	      					<div class="row">';
													echo '								<div class="col-sm-6 padding-right-5">';
													echo '									<input type="text" placeholder="kkm" name="kkmsos'. $semester .'"/>';
													echo '								</div>';
													echo '								<div class="col-sm-6 padding-left-5">';
													echo '									<input type="text" placeholder="nhb" name="nhbsos'. $semester .'"/>';
													echo '								</div>';
													echo '							</div>';
													echo '	      				</td>';
													echo '	      			</tr>';
													echo '	      		</tbody>';
													echo '	      	</table>';
													echo '	      </div>';
													echo '	    </div>';

												} ?>
													<center>													
														<input style="width:200px;" type="submit" value="Ubah Nilai" name="submitdatanilai"/>	
													</center>
												</div>
												<!--end of row-->
											</div>
										</form>
	            					</div>
            					</div>
            				</div>
            			<!-- </div> -->
						

            			<div class="col-sm-12">
            				<div class="panel panel-success">
            					<div class="panel-heading">
            						<div class="panel-title text-center">D. KESIMPULAN TERKAAIT PILIHAN </div>
            					</div>
            					<div class="panel-body">
            						<div class="row">
            							<div class="col-sm-4">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										1. Prinsip Dasar Pilihan
            									</div>
												
												<?php
												if((strcasecmp($_SESSION['user_status'],"free")!=0)) {
													echo '<div class="panel-body"> ';
            										echo '<ul>  ';
					                                echo '    <li>Aspek Wilayah :'.$aspekWilayah.'</li>  ';
													echo '	<li>Aspek Pilihan PTN :'.$aspekPTN.'</li>  ';
													echo '	<li>Aspek Pilihan Prodi :'.$aspekProdi.'</li>  ';
													echo '</ul>  ';
													echo '<br> ';
													echo ' <br> ';
													echo ' </div>';												
												
												} else {
													echo '<h6 style=color:#ff0000;>'."Analisis ini tidak berlaku untuk paket Free".'</h6>';	
												}
												?>
            								
            								</div>
            							</div>
            							<div class="col-sm-4">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										2. Skor Sekolah
            									</div>
												<?php
												if((strcasecmp($_SESSION['user_status'],"free")!=0)) {
													echo '<div class="panel-body">  ';
													echo '	<ul> ';
													echo '        <li>Skor -'. $_SESSION['asalsekolah'].'Terhadap : </li> ';													
													echo '		<li>Pilihan 1 :'.round($skor_sekolah_ptn1,2).'</li> ';
													echo '		<li>Pilihan 2 :'.round($skor_sekolah_ptn2,2).'</li> ';
													echo '		<li>Pilihan 3 :'.round($skor_sekolah_ptn3,2).'</li> ';
													echo '	</ul> ';
													echo '</div> ';
												} else {
													echo '<h6 style=color:#ff0000;>'."Analisis ini tidak berlaku untuk paket Free".'</h6>';	
												}
												?>
												
												
            								</div>
            							</div>

            							<div class="col-sm-4">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										3. Aspek Percentile
            									</div>
												
												<?php
												if((strcasecmp($_SESSION['user_status'],"free")!=0)) {
													echo '<div class="panel-body"> ';
            										echo '<ul> ';
													echo '	<li>Kecendrungan Penguasaan Materi Siswa ('.$tipeSiswa.') :   </li> ';
					                                echo '    					<li>Percentile Pilihan 1 ('.$pre_prodi1.') :'.$percentile1.'</li> ';
													echo '	<li>Percentile Pilihan 2 ('.$pre_prodi2.') : '.$percentile2.'</li> ';
													echo '	<li>Percentile Pilihan 3 ('.$pre_prodi3.') : '.$percentile3.'</li> ';									
													echo '</ul> ';
													echo '<br> ';
													echo '</div> ';
												} else {
													echo '<h6 style=color:#ff0000;>'."Analisis ini tidak berlaku untuk paket Free".'</h6>';	
												}
												?>
												
            								</div>
            							</div>

            							<div class="col-sm-4">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										4. Aspek Nilai Rataan Minimum (NRM) Siswa: <?php echo round($nrm_siswa,2) ?>
            									</div>
            									<div class="panel-body">
            										<ul>
					                                    					<li>Pilihan 1 (<?php echo round($nrm_prodi1,2) ?>): <?php echo $eval_nrm1?></li>
														<li>Pilihan 2 (<?php echo round($nrm_prodi2,2) ?>): <?php echo $eval_nrm2?></li>
														<li>Pilihan 3 (<?php echo round($nrm_prodi3,2) ?>): <?php echo $eval_nrm3?></li>
													</ul>
            									</div>
            								</div>
            							</div>

            							<div class="col-sm-4">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										5. Aspek urutan pilihan program studi
            									</div>
												
												<?php
												if((strcasecmp($_SESSION['user_status'],"free")!=0)) {
													echo '<div class="panel-body"> ';
													echo '	<ul> ';
													echo '        <li>Urutan Prodi : '.$urutan_prodi.'</li> ';
													echo '		<li>TOS (<'.$tos.') :';
															if($tos > 14) echo "Tidak Memenuhi"; 
															else  echo 'Memenuhi'.'</li>';
													echo '	</ul> ';
													echo '	<br> ';
													echo '	<br> ';
													echo '</div> ';
												
												} else {
													echo '<h6 style=color:#ff0000;>'."Analisis ini tidak berlaku untuk paket Free".'</h6>';	
												}
												
												?>
												
												
            								</div>
            							</div>
										
            						</div>
            					</div>
            					
            				</div>
            			</div>

            			<div class="col-sm-12">
            				<hr>
            			</div>
						
						<div class="col-sm-12">						
            				<div class="panel panel-success">
            					<div class="panel-heading">
            						<div class="panel-title text-center">E. SARAN UNTUK SISWA </div>
            					</div>
            					<div class="panel-body">
									<div class="col-sm-12">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										1. Berdasarkan Aspek Percentile :  (<?php echo $tipeSiswa ?>)
            									</div>
												<div class="panel-body"  style="overflow:scroll; height:400px;">
												
            									<?php
												//if((strcasecmp($_SESSION['user_status'],"free")!=0) && (strcasecmp($_SESSION['user_status'],"reg")!=0)) { 												
												if((strcasecmp($_SESSION['user_status'],"free")!=0)      ) { 												
													echo '	      	<table class="table table-bordered">';
													echo '	      		<thead>';
													echo '	      			<tr style="text-align: center;">';
													echo '	      				<th>No</th>';
													echo '	      				<th>Perguruan Tinggi</th>';
													echo '	      				<th>Program Studi</th>';
													echo '	      				<th>Provinsi</th>';
													echo '	      				<th>TOS</th>';
													echo '	      				<th>Perc</th>';
													echo '	      			</tr>';
													echo '	      		</thead>';
													
													echo '<tbody>';
													$tipe_prodi1 = $tipeSiswa;
													$tipe_prodi2 = strrev($tipeSiswa);
													$sql="SELECT ptn, prodi, provinsi, tos, pre FROM prodi WHERE pre='$tipe_prodi1' OR pre='$tipe_prodi2'";  
													$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
													
													if($result)  {
														  $linenumber=1;
														  while($row=mysqli_fetch_array($result))  {
															echo '	      			<tr>';
															echo '	      				<th>'.$linenumber.'</th>';
															echo '	      				<th>'.$row['ptn'].'</th>';
															echo '	      				<th>'.$row['prodi'].'</th>';
															echo '	      				<th>'.$row['provinsi'].'</th>';
															echo '	      				<th>'.$row['tos'].'</th>';
															echo '	      				<th>'.$row['pre'].'</th>';
															echo '	      			</tr>';
															$linenumber= $linenumber+1;
														  }  
													 } 
													echo '</tbody>';
													echo '</table>';
												} else {
													echo '<h6 style=color:#ff0000;>'."Saran berdasarkan aspek percentile tidak berlaku untuk paket Free".'</h6>';	
												}

											?>
												
												
												</div>
            								</div>
            							</div>
										
										
										<div class="col-sm-12">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										2. Berdasarkan Aspek NRM :  (<?php echo round($nrm_siswa,2) ?>)
            									</div>
												<div class="panel-body"  style="overflow:scroll; height:400px;">
            									<?php												
												
												if((strcasecmp($_SESSION['user_status'],"free")!=0)) {
													echo '	      	<table class="table table-bordered">';
													echo '	      		<thead>';
													echo '	      			<tr style="text-align: center;">';
													echo '	      				<th>No</th>';
													echo '	      				<th>Perguruan Tinggi</th>';
													echo '	      				<th>Program Studi</th>';
													echo '	      				<th>Provinsi</th>';
													echo '	      				<th>TOS</th>';
													echo '	      				<th>NRM</th>';
													echo '	      			</tr>';
													echo '	      		</thead>';
													
													echo '<tbody>';													
													$sql="SELECT ptn, prodi, provinsi, tos, nrm FROM prodi WHERE nrm<='$nrm_siswa'";  
													$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
													
													if($result)  {
														  $linenumber=1;
														  while($row=mysqli_fetch_array($result))  {
															echo '	      			<tr>';
															echo '	      				<th>'.$linenumber.'</th>';
															echo '	      				<th>'.$row['ptn'].'</th>';
															echo '	      				<th>'.$row['prodi'].'</th>';
															echo '	      				<th>'.$row['provinsi'].'</th>';
															echo '	      				<th>'.$row['tos'].'</th>';
															echo '	      				<th>'.round(floatval($row['nrm']),2).'</th>';
															echo '	      			</tr>';
															$linenumber= $linenumber+1;
															
															//if((strcasecmp($_SESSION['user_status'],"reg")==0)) {
															//	if($linenumber > 3) break;
															//}
															
														  }  
													 } 
													echo '</tbody>';
													echo '</table>';
													//if ((strcasecmp($_SESSION['user_status'],"reg")==0)) {
													//	echo '<h6 style=color:#ff0000;>'."Saran berdasarkan aspek percentile untuk paket Regular dibatasi hanya 3 pilihan".'</h6>';	
													//}
												}else {
													echo '<h6 style=color:#ff0000;>'."Saran berdasarkan aspek percentile tidak berlaku untuk paket Free".'</h6>';	
												}
												?>
												</div>
            								</div>
            							</div>
										
										
										<div class="col-sm-12">
            								<div class="panel panel-default">
            									<div class="panel-heading">
            										3. Berdasarkan Kombinasi Percentile (<?php echo $tipeSiswa ?>) dan NRM (<?php echo round($nrm_siswa,2) ?>)
            									</div>
												<div class="panel-body"  style="overflow:scroll; height:400px;">
            									<?php		
												//if((strcasecmp($_SESSION['user_status'],"free")!=0) && (strcasecmp($_SESSION['user_status'],"reg")!=0)) { 
												if((strcasecmp($_SESSION['user_status'],"free")!=0)      ) { 
													echo '	      	<table class="table table-bordered">';
													echo '	      		<thead>';
													echo '	      			<tr style="text-align: center;">';
													echo '	      				<th>No</th>';
													echo '	      				<th>Perguruan Tinggi</th>';
													echo '	      				<th>Program Studi</th>';
													echo '	      				<th>Provinsi</th>';
													echo '	      				<th>TOS</th>';
													echo '	      				<th>Perc</th>';
													echo '	      				<th>NRM</th>';
													echo '	      			</tr>';
													echo '	      		</thead>';
													
													echo '<tbody>';													
													$tipe_prodi1 = $tipeSiswa;
													$tipe_prodi2 = strrev($tipeSiswa);
													$sql="SELECT ptn, prodi, provinsi, tos, pre, nrm FROM prodi WHERE nrm<='$nrm_siswa' AND (pre='$tipe_prodi1' OR pre='$tipe_prodi2') ";  
													$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
													
													if($result)  {
														  $linenumber=1;
														  while($row=mysqli_fetch_array($result))  {
															echo '	      			<tr>';
															echo '	      				<th>'.$linenumber.'</th>';
															echo '	      				<th>'.$row['ptn'].'</th>';
															echo '	      				<th>'.$row['prodi'].'</th>';
															echo '	      				<th>'.$row['provinsi'].'</th>';
															echo '	      				<th>'.$row['tos'].'</th>';
															echo '	      				<th>'.$row['pre'].'</th>';
															echo '	      				<th>'.round(floatval($row['nrm']),2).'</th>';
															echo '	      			</tr>';
															$linenumber= $linenumber+1;
														  }  
													 } 
													echo '</tbody>';
													echo '</table>';
													
												} else {
													echo '<h6 style=color:#ff0000;>'."Saran berdasarkan kombinasi percentile dan  NRM tidak berlaku untuk paket Free".'</h6>';	
												}
												?>
												</div>
            								</div>
            							</div>
										
										
								</div>
							</div>
						</div>			
										
            

            			<!--<div class="col-sm-12">
            				<div class="col-xs-4 col1 center-block" style="float: none;">
								<!-- <input style="width:300px;" type="submit" value="&#8681 	UNDUH" name="saveaspdf"/> -->
								<!--a style="width:300px;" class="btn btn-lg btn-filled" onclick="downloadAsPdf()"><span class="ti-download"></span> UNDUH</>
							</div--> 
            			</div>
            		</div>
            	</div> 

			</section>
			
			<?php include 'footer.php' ?>
        </div>
	
		
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
        <!-- <script src="js/scripts.js"></script> -->
		
        <script type="text/javascript" src="jquery.autocomplete.js"></script>
		<script type="text/javascript" src="jquery.js"></script>  
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>  
        <script src="js/ptn-prodi-autocomplete.js"></script>
        <script type="text/javascript">
        	$(document).ready(function()  
			{
				initProdiByPtnSelectField('1', mp_type, null, 'Ubah ');
			    initProdiByPtnSelectField('2', mp_type, null, 'Ubah ');
			    initProdiByPtnSelectField('3', mp_type, null, 'Ubah ');
			    initPTNSelectionField('Ubah ');
			});
        </script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <script type="text/javascript">
        	// Landscape export, 2×4 inches
        	function downloadAsPdf(){
        		var margin_left = 25;
        		var judul = {
        			'content' : 'KLINIK PEMILIHAN PTN & PRODI (KP3)',
        			'x' : 67,
        			'y' : 30,
        			'font_size': 12
        		};

        		var sub_judul = {
        			'content' : 'Analisa Potensi Daya Saing dalam SNMPTN 2018',
        			'x' : 66.5,
        			'y' : judul.y + 7,
        			'font_size': 10
        		};

        		var biodata_siswa_dan_sekolah_judul = {
        			'content' : 'IDENTITAS SISWA',
        			'x' : margin_left,
        			'y' : sub_judul.y + 25
        		}

        		var biodata_siswa_dan_sekolah = {
        			'nama' : "<?php echo $_SESSION['nama'] ?>",
        			'jenjang' : "<?php echo $_SESSION['jenjang'] ?>",
        			'jeniskelas' : "<?php echo $_SESSION['jeniskelas'] ?>",
        			'asalsekolah' : "<?php echo $_SESSION['asalsekolah'] ?>",
        			'akreditasisekolah' : "<?php echo $_SESSION['akreditasisekolah'] ?>",
        			'provinsisekolah' : "<?php echo $_SESSION['provinsisekolah'] ?>",
        			'kurikulum' : "<?php echo $_SESSION['kurikulum'] ?>"
        		};

        		var ptn_dan_prodi = {
        			'ptn1' : "<?php echo $_SESSION['ptn1'] ?>",
        			'ptn2' : "<?php echo $_SESSION['ptn2'] ?>",
        			'ptn3' : "<?php echo $_SESSION['ptn3'] ?>",
        			'prodi1' : "<?php echo $_SESSION['prodi1'] ?>",
        			'prodi2' : "<?php echo $_SESSION['prodi2'] ?>",
        			'prodi3' : "<?php echo $_SESSION['prodi3'] ?>"

        		};

        		var pdf = new jsPDF();


        		pdf.setFontSize(judul.font_size);
        		pdf.text(judul.content, judul.x, judul.y);

        		pdf.setFontSize(sub_judul.font_size	);
        		pdf.text(sub_judul.content, sub_judul.x, sub_judul.y);

        		pdf.setFontType('bold');
        		pdf.text(biodata_siswa_dan_sekolah_judul.content, biodata_siswa_dan_sekolah_judul.x, biodata_siswa_dan_sekolah_judul.y);
        		pdf.text('Nama', margin_left, biodata_siswa_dan_sekolah_judul.y + 10);
        		pdf.text('Jenjang', margin_left, biodata_siswa_dan_sekolah_judul.y + 17);
        		pdf.text('Jenis Kelas', margin_left, biodata_siswa_dan_sekolah_judul.y + 24);
        		pdf.text('Asal Sekolah', margin_left, biodata_siswa_dan_sekolah_judul.y + 31);
        		pdf.text('Akreditasi Sekolah', margin_left, biodata_siswa_dan_sekolah_judul.y + 38);
        		pdf.text('Provinsi Sekolah', margin_left, biodata_siswa_dan_sekolah_judul.y +45);
        		pdf.text('Kurikulum Sekolah', margin_left, biodata_siswa_dan_sekolah_judul.y + 52);


        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 10);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 17);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 24);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 31);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 38);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 45);
        		pdf.text(':', margin_left + 40, biodata_siswa_dan_sekolah_judul.y + 52);

        		pdf.setFontType('');

        		pdf.text(biodata_siswa_dan_sekolah.nama.toUpperCase(), margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 10);
        		pdf.text(biodata_siswa_dan_sekolah.jenjang, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 17);
        		pdf.text(biodata_siswa_dan_sekolah.jeniskelas, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 24);
        		pdf.text(biodata_siswa_dan_sekolah.asalsekolah, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 31);
        		pdf.text(biodata_siswa_dan_sekolah.akreditasisekolah, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 38);
        		pdf.text(biodata_siswa_dan_sekolah.provinsisekolah, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 45);
        		pdf.text(biodata_siswa_dan_sekolah.kurikulum, margin_left + 45, biodata_siswa_dan_sekolah_judul.y + 52);

				pdf.save('a4.pdf');
        	}

        	// downloadAsPdf();
			
        </script>
    </body>
</html>