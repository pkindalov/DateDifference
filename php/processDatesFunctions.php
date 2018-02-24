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


	function dateInformation($format, $dateStr1, $dateStr2){
		$dateOne = date_create($dateStr1);
		$dateTwo = date_create($dateStr2);

		$interval = date_diff($dateOne, $dateTwo);


		switch ($format) {
			case '%Y':
				return $interval->format('%Y years');
				break;
			case '%R':
				return $interval->format('%a days');
				break;	
			case '%m':
					return $interval->format('%m months');
					break;	
			case '%Y%M%D':
					return $interval->format('%y Year/s %m Month/s %d Day/s');
					break;		
		}

	}





	function processDateFromForm($dateStr, $dateStr2,  $date_field){

		if(mb_strlen($dateStr) == 0 || mb_strlen($dateStr2) == 0){
			echo "<span style='color: red'>You forgot to pick a date</span>";
			return;
		}

		$arrStr = explode(" ", $dateStr);
		$day = $arrStr[0];
		$month = $arrStr[1];
		$year = $arrStr[2];

		$arrStr2 = explode(" ", $dateStr2);
		$dayDateStr2 = $arrStr2[0];
		$monthDateStr2 = $arrStr2[1];
		$yearDateStr2 = $arrStr2[2];

		$monthNumber = getMontNumber($month);
		$monthNumberDateStr2 = getMontNumber($monthDateStr2);

		$dateISOformat =$year."-".$monthNumber."-".$day;
		$date2ISOformat = $yearDateStr2."-".$monthNumberDateStr2."-".$dayDateStr2;

		// echo $dateISOformat."<br />".$date2ISOformat;

		$pastYearsBetweenDates = dateInformation('%Y', $dateISOformat, $date2ISOformat);
		$pastDaysBetweenDates = dateInformation("%R", $dateISOformat, $date2ISOformat);
		$pastMontsBetweenDates = dateInformation("%m", $dateISOformat, $date2ISOformat);
		$pastYearsMonthsDays = dateInformation('%Y%M%D', $dateISOformat, $date2ISOformat);


		echo "<hr /><br />";
		echo $pastYearsBetweenDates."<br />";
		echo $pastMontsBetweenDates."<br />";
		echo $pastDaysBetweenDates."<br />";
		echo $pastYearsMonthsDays."<br />";

		// return $dateISOformat;
		
		// return "The number of the mont ".$month." is ".$monthNumber."<br />";
		


		// print_r($arrStr);

	}


	

	
	if(isset($_POST)){
		$firstDate = $_POST['firstDate'];
		$secondDate = $_POST['secondDate'];
		
		// echo $firstDate."<br />".$secondDate."<br />";

		processDateFromForm($firstDate, $secondDate, 'first field');
		// echo processDateFromForm($secondDate, 'second field');
	}


