<?php

class witcher{
    function __construct()
    {
        $this->requireclass($this->root()."witcher/app/config/database.php");
    }

    public function unsetSession(){

        if (isset($_SESSION['Certificate_Code'])){
            unset($_SESSION['Certificate_Code']);
            unset($_SESSION['Login']);
        }
    }
    public function requireclass($pathh){
        $path = $pathh;
        include_once($path);
    }
    public function requireModel(){
        $dirs = scandir($this->root()."witcher/app/model");
        foreach ($dirs as $classes) {
            $a= explode('.', $classes);
            $end = end($a);
            if ($end === "php") {
                include $this->root()."witcher/app/model/".$classes;
            }
        }
    }
    public function requireController($class){
        $path = $this->root()."witcher/app/controller/".$class.".php";
        include_once($path);
    }
    public function requireView($dir){
        $path = $this->root()."witcher/view/".$dir;
        include_once($path);
    }
    public function requireConfig($class){
        $path = $this->root()."witcher/app/config/".$class.".php";
        include_once($path);
    }
    private function preRun(){
        ob_start();
        session_name("__gsr");
    }
    public function Run(){
        $this->preRun();
        //pager::go_page("http://".$_SERVER['SERVER_NAME']."/my-mvc-project/public");
        $session = new \Model\session();
    }
    public function Stop(){
        $this->unsetSession();
        ob_flush();
    }
    public function DownWithCookie($cookie){
        setcookie($cookie,null,time() - 3600,'/');
    }
    public function root(){
        return "F:/xampp/htdocs/khakbaz-project/";
    }
}
