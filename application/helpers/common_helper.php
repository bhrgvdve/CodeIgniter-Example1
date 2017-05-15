<?php 
function getIndianDate($date) {
	if(!empty($date) && ($date == '0000-00-00' || $date == '0000-00-00 00:00:00' || $date == NULL)) {
		return false;	
	}
	return date("d-m-Y",strtotime($date));
	
}
function getIndianTime($time) {
	if(!empty($time) && ($time == '00:00:00' || $time == '0000-00-00 00:00:00' || $time == NULL)) {
		return false;	
	}
	return date("h:i a",strtotime($time));
	
	
}
function getSubscriptionDate($date) {
	if(!empty($date) && ($date != '00:00:00' || $date != '0000-00-00 00:00:00' || $date != NULL)) {
		return date("d M, Y",strtotime($date));
	}
	return false;
	
}
function getAge($date) {
	if(!empty($date) && ($date != '00:00:00' || $date != '0000-00-00 00:00:00' || $date != NULL)) {
		$ar_y = explode("-",$date); $year = end($ar_y); 
		return (date("Y") - $year);
		
	}
	return 0;
	
}
?>