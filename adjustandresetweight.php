<?php
	require 'access.php';
	
	function resetWeight($conn, $codesoal) {
		//$dbconn = mysqli_connect($db_server,$db_username,$db_password,$db_database_name);
		$sql = "UPDATE soal SET weight = 0 WHERE code = '$codesoal'";				
		// mysqli_query($dbconn, $sql);
		$result="noerror";
		if (mysqli_query($conn, $sql)) {		
		
		} else { 
			$result = "Error updating weight record on soal code: ".$codesoal." " . mysqli_error($conn);		
		}
		return $result;
	}
	
	function adjustWeight($conn, $codesoal, $tablename, $colname, $numberOfQuestion) {
		$listJawaban = array();
		$sumPerSoal  = array();
		$salPersoal  = array();
		$result = "noerror";
		// $conn = new mysqli($db_server, $db_username, $db_password, $db_database_name);
		// if ($conn->connect_error) {
			// die("Connection failed: " . $conn->connect_error);
			// echo "DB connection failed";
		// }
		
		$temp = mysql_query("SELECT * FROM  $tablename ");
		$num_rows = mysql_num_rows($temp);
		while($row = mysql_fetch_array($temp)){
			$listJawaban[] = $row[$colname];
			//echo $row[$colname]."</br>";
		}
		//echo "</br> ---------------------------------------------------------- </br>";
		$kunci = array(); 	
		$temp = mysql_query("SELECT * FROM soal WHERE code ='$codesoal'");	
		while($row = mysql_fetch_array($temp)){
			$kunci[] = $row['answer'];
			//echo $row['answer'] . " ";
		}
		//echo "</br>";
		
		//$result = "num rows : ".$num_rows."</br>";
		//echo "</br> ---------------------------------------------------------- </br>";
		//echo "Array count : ".count($listJawaban). "</br>";
		
		for($y = 0; $y < $numberOfQuestion; $y++) {
			$sumPerSoal[$y] = 0; 
			$salPerSoal[$y] = 0;
		}
		for($x = 0; $x < $num_rows; $x++) {
			$stringJawaban  = $listJawaban[$x];
			//echo $stringJawaban."</br>";
			$satuJawaban = array();
			$satuJawaban = explode(';', $stringJawaban);  
			for($y = 0; $y < $numberOfQuestion; $y++) {
				if($satuJawaban[$y]==$kunci[$y]) {
					$sumPerSoal[$y] = $sumPerSoal[$y]+1; 
				}else {
					$salPerSoal[$y] = $salPerSoal[$y]+1; 
				}
				//echo $satuJawaban[$y]." ";				
			}
			//echo "# </br>";
		}
		
		// for($y = 0; $y < $numberOfQuestion; $y++) {
			// echo $sumPerSoal[$y]. " ";
		// }
		// echo "</br>";
		// for($y = 0; $y < $numberOfQuestion; $y++) {
			// echo $salPerSoal[$y]. " ";
		// }
		// echo "</br>";
		
		for($y = 0; $y < $numberOfQuestion; $y++) {
			//$samPerSoal[$y] = number_format($samPerSoal[$y]/$num_rows, 3);
			$number = $y + 1;
			$weight = number_format(1-($sumPerSoal[$y]/$num_rows), 3);
			$sql = "UPDATE soal SET weight = $weight  WHERE code = '$codesoal' AND number = $number ";				
			if (mysqli_query($conn, $sql)) {				
			} else { 
				$result = "Error updating weight record on soal code: ".$codesoal." number: " .$number. " ". mysqli_error($conn);		
				return $result;
			}
		}
		
		return $result;
		
		
	}
?>
