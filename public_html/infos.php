<?php
$path = "F:/xampp/htdocs/khakbaz-project/witcher/app/autoloader.php";
include_once($path);
$witcher = new witcher();
$witcher->requireConfig("server");
$infos = new \Config\server();
$infos = $infos->INFO;