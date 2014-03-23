<?php

class FDate {
	public static function x_week_range($date) {
	    $ts = strtotime($date);
	    $start = (date('w', $ts) == 0) ? $ts : strtotime('last monday', $ts);
	    return array(date('Y-m-d', $start),
	                 date('Y-m-d', strtotime('next saturday', $start)));
	}
	
	public static function getlastday($month, $year) {
		$result = strtotime("{$year}-{$month}-01");
		$result = strtotime('-1 second', strtotime('+1 month', $result));
		return date('Y-m-d', $result);
	}
	
	public static function get_start_and_end_date_from_week ($w, $y){
	    $o = 7; // week starts from sunday by default 	
	    $days = ($w - 1) * 7 + $o; 	
	    $firstdayofyear = getdate(mktime(0,0,0,1,1,$y)); 
	    if ($firstdayofyear["wday"] == 0) $firstdayofyear["wday"] += 7; 
	    # in getdate, Sunday is 0 instead of 7 
	    $firstmonday = getdate(mktime(0,0,0,1,1-$firstdayofyear["wday"]+1,$y)); 
	    $calcdate = getdate(mktime(0,0,0,$firstmonday["mon"], $firstmonday["mday"]+$days,$firstmonday["year"])); 
	
	    $sday = $calcdate["mday"]; 
	    $smonth = $calcdate["mon"]; 
	    $syear = $calcdate["year"]; 
	        
	    $timestamp['start_timestamp'] =  mktime(0, 0, 0, $smonth, $sday, $syear); 
	    $timestamp['end_timestamp'] =  $timestamp['start_timestamp'] + (60*60*24*6); 
	
	    return $timestamp; 
	
	} 
	
	public static function getMonthRange($date, $offset=0) {
		$month = new stdClass();
        list($yr, $mo, $da) = explode('-', $date); 
        $month->start = date('Y-m-d', mktime(0, 0, 0, $mo - $offset, 1, $yr)); 
        
        $i = 2; 
        
        list($yr, $mo, $da) = explode('-', $month->start); 
        
        while(date('d', mktime(0, 0, 0, $mo, $i, $yr)) > 1) { 
            $month->end = date('Y-m-d', mktime(0, 0, 0, $mo, $i, $yr)); 
            $i++; 
        }
        return $month; 
	}
}

?>