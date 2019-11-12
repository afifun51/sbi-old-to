<?php  
 require 'access.php';
 
 $q=$_GET['q'];  
 $my_data=mysqli_real_escape_string($q);   
 $mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  
 //$mysqli=mysqli_connect("localhost","root","","kliniksnmptn") or die("Database Error");  
 $sql="SELECT nama FROM ptn WHERE nama LIKE '%$my_data%' ORDER BY nama";  
 $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
  
 if($result)  
 {  
  while($row=mysqli_fetch_array($result))  
  {  
   echo $row['nama']."\n";  
  }  
 }  
?>  