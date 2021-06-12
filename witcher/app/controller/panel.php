<?php
namespace Controller;
use Config\tables;
use Model\log;
use Model\pager;
use Model\user;
use Model\message;
use Model\preg;
use Model\db;
use Model\views;

class panel extends views {
    public function start(){
        $witcher = new \witcher();
        $user = new user();
        $witcher->requireConfig("tables");
        $witcher->requireController("login");
        $permission = $this->Permissions();
        if ($permission != true){
            $message = new message();
            $message->msg_session_prepare("Login first.");
            pager::go_page("login");
            exit;
        }
        if($permission['Admin'] == 1){
            $page = array(parent::setPage("admin-panel/admin/index.php"));
            $witcher->requireController("landpage");
            $land = new landpage();
            $land->setLandpages_Path($witcher->root()."witcher/view/landpages");
            $landpages = $land->get_Files_Names();
            $datas = array(
                'Count_users' => $user->CountUsers(),
                'Count_males' => $user->CountUsersBy('Sex','Male'),
                'Count_Females' => $user->CountUsersBy('Sex','Female')
            );
        }else{
            $page = array(parent::setPage("admin-panel/admin/client-panel.php"));
            $datas = array();
        }
        parent::Show($page);
        if (isset($_GET['logout'])){
            $this->logout();
        }
        return array_merge($this->getUserInfos(),$this->Permissions(),$datas);
    }
    public function logout(){
        $witcher = new \witcher();
        $witcher->requireConfig("tables");
        $login = new login();
        if ($login->is_login() == true){
            $db = new db();
            unset($_SESSION['Certificate_Code']);
            unset($_SESSION['Password']);
            $table = new tables();
            $user_tbl = $table->MAIN_TABLES['user'];
            $db->db_query("UPDATE $user_tbl SET Session_id = NULL , Log = 0  WHERE Username = '$_SESSION[Username]'");
            unset($_SESSION['Username']);
            pager::go_page("login");
            exit;
        }else{
            pager::go_page("login");
            exit();
        }
    }
    public function Permissions(){
        $user = new user();
        $login = new login();
        if ($login->is_login() == true){
            $permission = $user->user_get_permission();
            $result = array_merge($permission,array("is_admin"=>$login->is_admin()));
            return $result;
        }else{
            return false;
        }
    }
    public function PartIncluder(){
        $witcher = new \witcher();
        if (isset($_GET['parts']) AND strlen($_GET['parts']) < 50){
            $part = $_GET['parts'];
            $path = $witcher->root()."witcher/view/admin-panel/admin/".$part.".php";
            if (file_exists($path)){
                $white_list = array("home","calendar","chartjs","chartjs2","contacts","e_commerce","echarts","level2","map",
                    "landingpages","news");
                $i = 0;
                foreach ($white_list as $white){
                    if ($part == $white){
                       $i++;
                    }
                }
                if ($i == 1){
                    include $path;
                }else{
                    goto home;
                }
            }else{
                // include a 404 text message on content !
                goto home;
            }
        }elseif(!isset($_GET['parts'])){
            home:
            include $witcher->root()."witcher/view/admin-panel/admin/home.php";
        }
    }
    private function getUserInfos(){
        $user = new user();
        return $user->user_get_certificate();
    }
}