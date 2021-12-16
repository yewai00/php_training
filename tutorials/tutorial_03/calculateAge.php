<?php 
    $birthday = $_GET["birthday"];
    $now = time();
    $bday = strtotime($birthday);
    if($now > $bday) {
        $sec_age = $now - $bday;
        $day_age = $sec_age / (60 * 60 * 24);
        $age = round($day_age / 365);
        if($age){
            header("location: index.php?age=$age");
        }
        else {
            $day_age = round($day_age);
            header("location: index.php?day=$day_age");
        }
    }

    elseif($now < $bday) {
        $age = 0;
        header("location: index.php?age=$age");
    }

