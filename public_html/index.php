<?php include "configuration.php";
$witcher = new witcher();
$_GET = array_unique($_GET);
if (isset($_GET['DIR']) AND isset($_GET['CERTIFY_CODE']) AND $_GET['DIR'] != "" AND $_GET['CERTIFY_CODE'] != ""){
    if ($_GET['DIR'] == "" OR $_GET['CERTIFY_CODE'])
    $Certify_Code = $_GET['CERTIFY_CODE'];
    $CODE = md5(sha1(sha1(md5(sha1("AAKKDDR)OO84648846O6546O654O!2d1656464ODL8652312582568869720423105")))));
    if ($Certify_Code !== $CODE){
        $witcher->requireController("home");
        $home = new \Controller\home();
        $home->start();
        exit;
    }
    $preg = new \Model\preg();
    if ($preg->custom('/^[A-Za-z0-9.]*$/i',$_GET['DIR']) == false){
        $witcher->requireController("home");
        $home = new \Controller\home();
        $home->start();
        exit;
    }
    $path = $witcher->root()."witcher/app/controller/".$_GET['DIR'];
    if (file_exists($path)){
        include $path;
        $classname = explode(".",$_GET['DIR']);
        $name = "\Controller\ ".$classname[0];
        $name = str_replace(" ","",$name);
        $object = new $name;
        $results = $object->start();
    }else{
        $witcher->requireController("home");
        $home = new \Controller\home();
        $home->start();
        exit();
    }
}elseif (!isset($_GET['DIR']) OR !isset($_GET['CERTIFY_CODE']) OR $_GET['DIR'] == "" OR $_GET['CERTIFY_CODE'] == "") {
    $witcher->requireController("home");
    $home = new \Controller\home();
    $home->start();
    exit();
}