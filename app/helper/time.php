<?php

function timeConvert ( $time ){
    $time =  strtotime($time);
    $diff_date = time() - $time;
    $second = $diff_date;
    $minute = round($diff_date/60);
    $hour = round($diff_date/3600);
    $day = round($diff_date/86400);
    $week = round($diff_date/604800);
    $month = round($diff_date/2419200);
    $year = round($diff_date/29030400);
    if( $second < 60 ){
        if ($second == 0){
            return "right now";
        } else {
            return $second .' seconds ago';
        }
    } else if ( $minute < 2 ){
        return $minute .' minute ago';
    }else if ( $minute < 60 ){
        return $minute .' minutes ago';
    } else if ( $hour < 2 ){
        return $hour.' hour ago';
    } else if ( $hour < 24 ){
        return $hour.' hours ago';
    } else if ( $day < 2 ){
        return $day .' day ago';
    } else if ( $day < 7 ){
        return $day .' days ago';
    } else if ( $week < 2 ){
        return $week.' week ago';
    } else if ( $week < 4 ){
        return $week.' weeks ago';
    } else if ( $month < 2 ){
        return $month .' month ago';
    } else if ( $month < 12 ){
        return $month .' months ago';
    } else {
        return $year.' years ago';
    }
}