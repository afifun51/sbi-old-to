<?php  
 require 'access.php';
 
 $q=$_GET['q'];
 $jenjang_selected = $_GET['jenjang']; 
 //$ptn=$_GET['ptn'];
 $my_data=mysqli_real_escape_string($q); 
 $mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  
 //$mysqli=mysqli_connect("localhost","root","","kliniksnmptn") or die("Database Error");  
 $sql="SELECT DISTINCT prodi FROM prodi WHERE prodi LIKE '%$my_data%' and jenjang LIKE '%$jenjang_selected%' ORDER BY prodi";  
 $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
  
 //echo "ptn : ".$ptn."\n";
 if($result)  
 {  
  while($row=mysqli_fetch_array($result))  
  {  
   echo $row['prodi']."\n";  
  }  
 }  
?>  