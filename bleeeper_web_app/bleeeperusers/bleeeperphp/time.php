<?php
function status_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hr' => 3600,
        'minute' => 60,
        'second' => 1);
		
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "posted just now";
        return $retval;
    } else {
		$retval=null;
        foreach ($periods as $key => $value) {
			
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return ' posted '.$retval.' ago';      
    }
}

function not_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
      $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hr' => 3600,
        'min' => 60,
        'sec' => 1);
		
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "just now";
        return $retval;
    } else {
		$retval=null;
        foreach ($periods as $key => $value) {
			
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' ago';      
    }
}

function prof_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hr' => 3600,
        'min' => 60,
        'sec' => 1);
		
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "just now";
        return $retval;
    } else {
		$retval=null;
        foreach ($periods as $key => $value) {
			
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' ago';      
    }
}
?>