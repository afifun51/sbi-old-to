<?php  
 require '../../access.php';

 //$my_data=mysqli_real_escape_string($q); 
 $mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  
 //$mysqli=mysqli_connect("localhost","root","","kliniksnmptn") or die("Database Error");  
 $sql="SELECT nama FROM ptn ORDER BY nama";  
 $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
  
 //echo "ptn : ".$ptn."\n";
 if($result)  
 {
 	$data = array();
  while($row=mysqli_fetch_array($result))  
  {  
  		array_push($data, $row['nama']);
  }
  echo json_encode($data);  
 }  
?>  