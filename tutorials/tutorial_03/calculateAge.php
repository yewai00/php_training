<?php 
    $birthday = $_GET["birthday"];
    $now = time();
    $bday = strtotime($birthday);
    if($now > $bday) {
        $sec_age = $now - $bday;
        $day_age = $sec_age / (60 * 60 * 24);
        $age = round($day_age / 365);
        if(floor($day_age / 365)){
            header("location: index.php?age=$age&oldBday=$birthday");
        }
        else {
            $day_age = round($day_age);
            header("location: index.php?day=$day_age&oldBday=$birthday");
        }      
    }
    elseif($now < $bday) {
        $age = 0;
        header("location: index.php?age=$age&oldBday=$birthday");
    }

