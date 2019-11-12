<?php
	
	date_default_timezone_set('Asia/Jakarta');
	
   function getKocokanBin($number) {
      /* Member variables */
		 $konfigurasi['bin']=array(); 	  
		 $konfigurasi['bin'][1]=array(42,46,6,26,32,3,14,19,11,2,21,29,12,47,49,27,28,35,48,15,38,34,1,39,22,45,36,4,9,30,33,16,24,31,18,5,25,43,37,44,8,7,10,20,13,40,41,50,23,17);
		 $konfigurasi['bin'][2]=array(19,2,18,9,1,23,48,44,45,5,11,41,49,43,37,10,28,31,27,13,50,24,15,20,36,4,12,30,42,8,35,3,6,32,16,17,38,14,21,39,33,26,22,46,29,40,34,47,7,25);
		 $konfigurasi['bin'][3]=array(37,26,6,18,30,8,44,20,36,45,41,35,46,34,12,14,5,17,7,43,16,29,4,24,39,3,22,10,15,33,40,21,11,23,47,31,27,9,38,48,19,2,49,13,28,42,25,32,1,50);
		 $konfigurasi['bin'][4]=array(8,11,3,17,48,37,22,9,47,28,19,49,21,29,44,38,46,13,42,32,14,4,23,41,2,45,30,39,6,18,25,1,16,35,43,50,12,33,36,10,24,15,27,34,5,31,26,20,7,40);
		 $konfigurasi['bin'][5]=array(7,20,5,14,31,36,11,50,23,40,29,21,33,45,27,38,9,13,17,4,6,19,25,28,44,8,37,1,47,43,41,39,49,42,22,2,30,46,26,35,15,10,24,34,32,3,18,48,16,12);
		 $konfigurasi['bin'][6]=array(47,36,42,9,18,26,20,22,15,7,19,35,23,34,12,38,29,49,24,37,2,44,45,48,27,39,5,11,40,8,14,50,17,21,6,16,33,32,46,28,30,10,25,13,43,1,4,41,3,31);
		 $konfigurasi['bin'][7]=array(2,3,48,31,16,32,30,19,12,45,4,42,22,25,28,21,18,27,8,50,9,6,13,34,37,10,29,20,40,47,11,26,44,49,43,38,24,1,23,36,14,15,46,7,41,35,39,5,33,17);
		 $konfigurasi['bin'][8]=array(17,35,48,45,18,43,21,47,9,38,13,46,39,40,31,8,14,32,22,12,3,42,34,26,29,19,25,28,30,27,36,4,10,49,44,2,23,50,33,24,16,5,15,7,20,6,11,41,1,37);
		 $konfigurasi['bin'][9]=array(15,31,9,38,49,46,24,29,50,16,11,48,45,47,27,30,4,35,23,2,25,19,36,3,18,37,26,12,5,14,10,13,44,39,1,17,34,42,33,8,28,41,6,43,20,32,7,21,22,40);
		 $konfigurasi['bin'][10]=array(2,49,7,10,19,5,17,15,39,47,29,41,4,3,22,35,44,11,43,8,34,12,28,36,32,27,45,20,50,30,14,24,18,40,46,9,25,6,33,13,21,37,1,48,26,23,31,42,38,16);
		 $konfigurasi['bin'][11]=array(32,6,34,25,30,21,23,31,12,37,3,45,16,18,41,29,40,42,43,50,44,28,22,14,17,15,2,46,9,10,27,36,49,26,39,11,1,35,4,47,48,24,7,38,20,5,8,33,13,19);
		 $konfigurasi['bin'][12]=array(23,38,45,16,35,50,14,22,31,34,19,4,43,10,2,32,21,13,40,29,24,44,17,8,3,47,1,42,7,6,33,18,11,30,37,49,41,9,27,12,46,5,25,26,15,36,20,28,48,39);
		 $konfigurasi['bin'][13]=array(27,20,36,4,21,32,16,38,33,6,9,7,34,50,37,43,13,3,39,29,31,30,48,14,45,41,11,23,47,46,44,28,1,10,26,8,19,15,5,17,42,2,35,12,18,49,25,22,24,40);
		 $konfigurasi['bin'][14]=array(16,4,34,14,38,41,28,17,25,36,44,20,48,40,10,12,29,35,13,5,50,26,22,32,3,37,49,6,45,27,46,42,47,23,9,39,30,18,24,19,11,7,15,21,43,31,33,1,2,8);
		 $konfigurasi['bin'][15]=array(33,31,36,49,13,44,25,1,34,19,48,43,37,18,26,30,3,17,45,47,42,24,14,4,11,21,7,35,28,22,6,15,23,12,32,40,20,38,2,46,16,29,27,50,5,41,10,9,8,39);
		 $konfigurasi['bin'][16]=array(42,23,48,43,18,5,40,29,8,24,19,16,35,12,32,49,7,10,22,36,33,6,25,20,50,31,34,17,41,38,45,28,26,4,37,15,13,27,39,14,2,21,46,9,3,30,1,47,44,11);
		 $konfigurasi['bin'][17]=array(5,33,18,46,1,12,17,24,37,26,35,11,43,22,6,25,28,32,3,45,7,30,8,20,14,27,50,29,2,44,39,15,38,48,47,4,16,36,23,9,31,41,42,34,40,21,10,19,13,49);
		 $konfigurasi['bin'][18]=array(32,6,45,3,50,49,12,10,34,33,47,27,2,4,46,17,7,41,30,13,5,40,11,48,18,23,20,38,19,14,21,35,16,26,43,36,15,39,29,44,25,9,22,1,31,37,42,28,24,8);
		 $konfigurasi['bin'][19]=array(38,43,45,44,14,50,37,30,26,9,8,33,49,35,28,4,23,24,46,40,17,20,39,16,48,19,47,2,41,7,25,13,36,5,31,29,32,18,6,11,10,42,21,34,27,3,15,1,12,22);
		 $konfigurasi['bin'][20]=array(38,41,31,1,6,20,36,35,28,16,44,2,7,39,23,22,4,14,32,34,21,8,50,46,37,42,9,49,30,33,18,27,48,24,15,25,12,26,45,11,40,43,17,3,29,5,19,13,10,47);
		
		return $konfigurasi['bin'][$number];			
   }
   
   
   function getKocokanBing($number) {
      /* Member variables */
		 $konfigurasi['bing']=array(); 	  
		 $konfigurasi['bing']=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50);
		 
		 return $konfigurasi['bing'];			
   }
   
   
   function getKocokanMatIpa($number) {
	   
	    //$konfigurasi=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40);		 
		// return $konfigurasi;
		 		
				
	    $konfigurasi['mat_ipa']=array(); 	
		$konfigurasi['mat_ipa'][1]=array(8,18,1,15,7,5,27,3,12,24,19,2,20,33,23,21,17,14,25,39,16,36,35,30,26,10,38,28,9,32,22,4,29,34,31,11,37,6,40,13);
		$konfigurasi['mat_ipa'][2]=array(25,30,10,15,35,6,26,1,9,34,12,7,28,23,32,3,18,22,16,27,5,20,29,38,39,36,14,40,11,24,21,13,31,2,33,4,37,19,8,17);
		$konfigurasi['mat_ipa'][3]=array(6,16,2,10,8,20,15,12,17,30,28,13,7,3,4,21,32,38,9,29,24,23,37,35,31,39,11,14,22,36,5,25,18,33,26,27,1,40,19,34);
		$konfigurasi['mat_ipa'][4]=array(10,29,11,12,35,2,33,20,28,8,31,24,7,4,5,1,34,9,40,36,17,15,14,22,19,13,27,18,6,32,25,37,30,21,16,38,3,26,23,39);
		$konfigurasi['mat_ipa'][5]=array(3,15,40,31,9,10,7,13,22,11,18,4,38,20,32,34,30,6,24,19,39,23,25,16,36,14,33,26,37,35,28,8,17,21,2,29,5,12,27,1);
		$konfigurasi['mat_ipa'][6]=array(18,14,13,7,20,8,37,3,33,6,31,4,35,25,38,22,30,15,12,32,1,10,28,29,16,11,19,34,26,39,36,5,9,17,23,2,21,27,24,40);
		$konfigurasi['mat_ipa'][7]=array(32,36,33,25,11,40,15,21,17,39,30,34,14,7,1,13,4,5,22,2,20,27,8,12,19,18,6,10,29,9,16,26,31,24,35,38,37,3,28,23);
		$konfigurasi['mat_ipa'][8]=array(18,12,21,32,4,40,25,8,24,27,9,31,17,7,37,30,35,16,2,19,36,20,34,22,38,26,10,15,14,23,3,6,33,13,11,1,28,5,39,29);
		$konfigurasi['mat_ipa'][9]=array(29,3,8,38,22,30,14,7,40,12,26,24,32,2,28,36,6,19,34,17,15,1,11,27,39,25,23,4,5,35,16,9,20,37,13,33,10,21,18,31);
		$konfigurasi['mat_ipa'][10]=array(4,35,22,15,19,9,31,29,38,17,37,7,20,13,25,10,34,30,6,23,24,3,14,36,2,12,28,39,40,27,33,5,21,32,26,8,1,16,18,11);
		$konfigurasi['mat_ipa'][11]=array(6,40,23,17,30,13,27,12,39,7,5,15,32,31,14,2,10,19,33,34,9,20,25,8,37,3,35,11,18,24,26,4,28,16,36,22,1,29,21,38);
		$konfigurasi['mat_ipa'][12]=array(31,17,10,36,16,25,3,40,21,39,15,12,23,18,5,6,37,38,2,35,34,1,24,19,32,22,8,13,7,29,33,20,9,4,11,30,26,27,14,28);
		$konfigurasi['mat_ipa'][13]=array(2,13,28,4,27,31,22,29,3,12,32,39,34,24,26,17,16,35,9,15,33,1,14,7,23,6,37,19,30,5,21,18,25,20,11,36,8,38,40,10);
		$konfigurasi['mat_ipa'][14]=array(20,18,13,5,24,12,6,3,19,37,35,14,40,23,15,36,29,11,32,27,2,38,25,39,34,33,9,26,22,10,1,8,21,17,7,16,30,31,4,28);
		$konfigurasi['mat_ipa'][15]=array(12,11,20,25,9,29,3,10,26,33,38,28,32,15,7,5,16,24,17,4,36,18,23,6,2,34,37,27,40,35,30,8,21,31,19,22,1,14,39,13);
		$konfigurasi['mat_ipa'][16]=array(21,34,9,8,13,31,32,38,27,28,40,5,6,39,33,24,29,30,1,12,2,4,35,7,18,16,26,37,23,36,17,14,22,19,10,3,15,25,11,20);
		$konfigurasi['mat_ipa'][17]=array(8,29,16,14,37,22,21,19,4,9,18,7,24,13,38,11,40,5,30,12,15,26,3,33,32,20,6,1,28,25,39,35,36,2,34,27,17,31,23,10);
		$konfigurasi['mat_ipa'][18]=array(25,38,20,40,21,18,15,22,27,6,28,30,39,8,36,11,3,5,17,16,2,37,31,1,14,19,13,29,10,34,4,24,12,26,32,23,35,7,9,33);
		$konfigurasi['mat_ipa'][19]=array(4,7,39,8,11,14,40,22,10,32,15,2,34,6,21,28,24,33,38,27,36,3,1,5,37,16,13,9,30,18,31,19,29,20,17,12,23,25,26,35);
		$konfigurasi['mat_ipa'][20]=array(20,6,4,17,27,5,7,9,15,22,3,31,35,40,26,33,14,16,32,19,25,34,23,37,11,8,30,36,10,12,28,21,1,18,24,29,13,2,39,38);
		
		//return $konfigurasi['mat_ipa'][$number];
		
		if($number >= 1 && $number <= 20)
		     return $konfigurasi['mat_ipa'][$number];
		else 
			return array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40);
		
   }
   
   
    function getKocokanPG($number) {
      /* Member variables */
		$konfigurasi['pg'][1]=array(1,2,3,4);
		$konfigurasi['pg'][2]=array(2,4,1,3);
		$konfigurasi['pg'][3]=array(3,1,4,2);
		$konfigurasi['pg'][4]=array(4,3,2,1);
		
		if($number >= 1 && $number <= 4)
			return $konfigurasi['pg'][$number];
		else 
			return array(1,2,3,4);
		
	}
		
	 function getAnswer($number,$answer) {
      /* Member variables */
		if($number == 1) {
			return $answer;
		} else if ($number == 2) {
			if       ($answer == "A" ) return "B";
			else if  ($answer == "B" ) return "D";
			else if  ($answer == "C" ) return "A";
			else if  ($answer == "D" ) return "C";
			else return $answer;
		} else if ($number == 3) {
			if       ($answer == "A" ) return "C";
			else if  ($answer == "B" ) return "A";
			else if  ($answer == "C" ) return "D";
			else if  ($answer == "D" ) return "B";
			else return $answer;		
		} else if ($number == 4) {
			if       ($answer == "A" ) return "D";
			else if  ($answer == "B" ) return "C";
			else if  ($answer == "C" ) return "B";
			else if  ($answer == "D" ) return "A";
			else return $answer;
		}
		else return $answer."*";
		
	}
	
	 function getOriginalAnswer($number,$answer) {
      /* Member variables */
		if($number == 1) {
			return $answer;
		} else if ($number == 2) {
			if       ($answer == "B" ) return "A";
			else if  ($answer == "D" ) return "B";
			else if  ($answer == "A" ) return "C";
			else if  ($answer == "C" ) return "D";			
			else return $answer;
		} else if ($number == 3) {
			if       ($answer == "C" ) return "A";
			else if  ($answer == "A" ) return "B";
			else if  ($answer == "D" ) return "C";
			else if  ($answer == "B" ) return "D";
			else return $answer;		
		} else if ($number == 4) {			
			if       ($answer == "D" ) return "A";
			else if  ($answer == "C" ) return "B";
			else if  ($answer == "B" ) return "C";
			else if  ($answer == "A" ) return "D";
			else return $answer;
		}
		else return $answer."*";
		
	}
	
	
	function checkDayBIN() {
		//return true;
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d");
		if($today=='2016-11-28') return true;		//24
		else return false;
	}
	
	
	function checkDayMAT() {
		//return true;
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d");
		if($today=='2016-11-29') return true;		
		else return false;
	}
	
	function checkDayBING() {
		//return true;
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d");
		if($today=='2016-11-30') return true;		
		else return false;
	}
	
	
	function checkDayIPA() {
		//return true;
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d");
		if($today=='2016-12-1') return true;		
		else return false;
	}
	
	
	function checkSession($num) {
		return true;
		date_default_timezone_set('Asia/Jakarta');
		// echo "Hari ini : ".time();
		// echo "Start : ".strtotime("12:00");
		// echo "End : ".strtotime("14:00");
		
		//return true;
		if ($num==0) return true;
		else {
			if($num==1) {
				$startTime=strtotime("07:00");
				$endTime=strtotime("09:00");
				$curretTime=time();
				if(($curretTime>=$startTime)&&($curretTime<=$endTime)) return true;
				else return false;				
			} 	
			else if($num==2) {
				$startTime=strtotime("09:30");
				$endTime=strtotime("11:30");
				$curretTime=time();
				if(($curretTime>=$startTime)&&($curretTime<=$endTime)) return true;
				else return false;				
			} 
			else if($num==3) {
				$startTime=strtotime("12:00");
				$endTime=strtotime("14:00");
				$curretTime=time();
				if(($curretTime>=$startTime)&&($curretTime<=$endTime)) return true;
				else return false;				
			} 			
		}
	}
	
	
	function getSessionTest($num) {
		    date_default_timezone_set('Asia/Jakarta');
			if($num==1) {
				return "Sesi 1 : 07:00-09.00";			
			} 	
			else if($num==2) {
				return "Sesi 2 : 09:30-11.30";			
			} 
			else if($num==3) {
				return "Sesi 3 : 12:00-14.00";						
			} 			
		
	}	
   
   
?>