<?php

	function checkMonthName($haystack,$monthName){
		$isFound = false;

		if(strpos($haystack, $monthName) !== false){
			$isFound = true;
		}

		return $isFound;
	}



	function getMontNumber($monthName){

		if(checkMonthName($monthName, 'January')){
			return "01";
		}else if(checkMonthName($monthName, 'February')) {
			return "02";
		}else if(checkMonthName($monthName, 'March')){
			return "03";
		}else if(checkMonthName($monthName, 'April')){
			return "04";
		}else if(checkMonthName($monthName, 'May')){
			return "05";
		}else if(checkMonthName($monthName, 'June')){
			return "06";
		}else if(checkMonthName($monthName, 'July')){
			return "07";
		}else if(checkMonthName($monthName, 'August')){
			return "08";
		}else if(checkMonthName($monthName, 'September')){
			return "09";
		}else if(checkMonthName($monthName, 'October')){
			return "10";
		}else if(checkMonthName($monthName, 'November')){
			return "11";
		}else if(checkMonthName($monthName, 'December')){
			return "12";
		}else {
			return "Something wrong with the month name";
		}

	}








	function processDateFromForm($dateStr, $date_field){

		if(mb_strlen($dateStr) == 0){
			echo "<span style='color: red'>You forgot to pick a date in ".$date_field."</span>";
			return;
		}

		$arrStr = explode(" ", $dateStr);
		$day = $arrStr[0];
		$month = $arrStr[1];
		$year = $arrStr[2];
		$monthNumber = getMontNumber($month);

		$dateISOformat =$year."-".$monthNumber."-".$day;
		$pastYears = dateInformation('%Y');

		return $dateISOformat;
		
		// return "The number of the mont ".$month." is ".$monthNumber."<br />";
		


		// print_r($arrStr);

	}


	

	
	if(isset($_POST)){
		$firstDate = $_POST['firstDate'];
		$secondDate = $_POST['secondDate'];
		
		// echo $firstDate."<br />".$secondDate."<br />";

		echo processDateFromForm($firstDate, 'first field')."<br />";
		echo processDateFromForm($secondDate, 'second field');
	}


