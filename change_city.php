<?php
session_start();
$city_id=$_GET['id'];

$_SESSION['city']=$city_id;



header('Location: http://site.local/');
