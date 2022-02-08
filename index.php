<?php

require_once "cities.php";
session_start();

if(!isset($_SESSION['city'])){
    //$ip = $_SERVER['REMOTE_ADDR'];
//    $ip = "93.170.46.104";
    $ip = "185.237.74.247";
    $geoip = geoip_record_by_name ($ip);
    if(isset($geoip['city'])){
        $city = $geoip['city'];
        $_SESSION['city']=$city;
    }else{
        $_SESSION['city']='Kyiv';
    }



}
$city_id = $_SESSION['city'];
$city = $cities[$city_id];

?>
<html>
<head>

</head>

<body>
Вы находитесь в <?php echo $city?>
<nav>
    <ul class="topmenu">
        <?php
        foreach ($cities as $id=>$city){
            echo '<li><a href="change_city.php?id='.$id.'">'.$city.'</li>';
        }
        ?>


    </ul>
</nav>

</body>
</html>
