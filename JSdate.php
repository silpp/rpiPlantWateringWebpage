<?php
function JSdate($in,$type){
    if($type == 'date'){
        //date are patterned yyyy-mm-dd
        preg_match('/(\d{4})-(\d{2})-(\d{2})/',$in,$match);
    } else if($type == 'datetime'){
        //datetime are patterned yyyy-mm-dd hh:mm:ss
        preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/',$in,$match);
    }
    $year = (int)$match[1];
    $month = (int)$match[2]-1; 
    $day = (int)$match[3];

    if($type=='date'){
        return "Date($year, $month, $day)";
    } else if ($type == 'datetime'){
        $hour = (int) $match[4];
        $minute = (int) $match[5];
        $second = (int) $match[6];
        return "Date($year, $month, $day, $hour, $minute, $second)";
    }

}
?>