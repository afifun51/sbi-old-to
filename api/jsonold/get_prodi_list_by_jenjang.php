<?php  
 require '../../access.php';
 
 //$q=$_GET['q'];
 $jenjang_selected = $_GET['jenjang'];
 $mp = $_GET['mp']; 

 //$my_data=mysqli_real_escape_string($q); 
 $mysqli=mysqli_connect($db_server,$db_username,$db_password,$db_database_name) or die("Database Error");  

 
 //$sql="SELECT DISTINCT prodi FROM prodi WHERE prodi LIKE '%$my_data%' and jenjang LIKE '%$jenjang_selected%' and peminatan LIKE '%$mp%'  ORDER BY prodi";  
 $sql="SELECT DISTINCT prodi FROM prodi WHERE jenjang LIKE '%$jenjang_selected%' and peminatan LIKE '%$mp%'  ORDER BY prodi";  
 $result = mysqli_query($mysqli,$sql) or die(mysqli_error());  
  
 
 if($result)  
 {
 	$data = array();
  while($row=mysqli_fetch_array($result))  
  {  
  		array_push($data, $row['prodi']);
  }
  echo json_encode($data);  
 }  
?>  