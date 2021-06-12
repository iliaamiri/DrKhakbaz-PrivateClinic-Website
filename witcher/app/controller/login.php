<?php
namespace Controller;
use Model\pager;
use Model\user;
use Model\message;
use Model\preg;
use Model\db;
/*
 *
 */
class login extends \Model\views {
    private $LOG;
    private $Stat = "not login";

    public function start(){
        $witcher = new \witcher();
        $login = new login();
        $views_array= array(parent::setPage("admin-panel/admin/login.php"));
        parent::Show($views_array);
        if(isset($_POST['Login'])){
            $loginn = $login->Login($_POST['Username'],$_POST['Password']);
            if ($loginn == true){
                pager::refresh();
            }
        }elseif ($login->is_login() == true){
            $this->Stat = "Logged-in";
        }elseif ($login->is_admin() == true){
            $this->Stat = "Logged-in as Admin";
        }
        if ($this->Stat == "Logged-in"){
            pager::go_page("profile");
        }
    }
    public function Identify($id){
        if (preg_match('/^[0-9]*$/i',$id)){
            try{
                database::$conn = new PDO("mysql:host=localhost;dbname=$this->db",'root','');
                database::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = database::$conn->prepare("SELECT * FROM $this->table WHERE id = '$id'");
                $sql->execute();
                if ($sql->rowCount() == 0){
                    die("this id does not exist in database");
                    exit();
                }
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                return $row;
            }catch (PDOException $e){
                die($e);
            }
        }else{
            die("Invalid Id");
        }
    }
    public function Login($username,$password){
        $db = new db();
        $preg = new preg();
        $message = new message();
        $user = new user();
        if (isset($username) AND isset($password) AND !empty($username) AND !empty($password)){
            $preg_username = $preg->username($username);
            $preg_password = $preg->password($password);
            if ($preg_password === 1 AND $preg_username === 1){
                $password = md5(sha1(md5($password)));
                $user_tbl = $user->user_db_info['db_Table'];
                try{
                    $check = $db->db_query("SELECT * FROM $user_tbl WHERE Username = '$username' AND Password = '$password'",1);
                    if ($check->rowCount() == 0){
                        $message->msg_session_prepare("Wrong Login Details");
                        //pager::go_page("http://projects.localhost/witcher/public/login");
                        pager::refresh();
                        exit();
                    }
                    $rows = $check->fetch(\PDO::FETCH_ASSOC);
                    $_SESSION['Certificate_Code'] = md5(sha1(md5(sha1(md5(sha1(md5(rand(1000,9999))))))));
                    $permissions = $user->user_get_permission(0,$rows['Email']);
                    if ($permissions['Login'] == 1){
                        $_SESSION['Username'] = $username;
                        $_SESSION['Password'] = $password;
                        $Last_ip = $_SERVER['REMOTE_ADDR'];
                        $Last_login = date("Y/m/d h:i:sa");
                        $db->db_query("UPDATE $user_tbl SET Session_id = '$_SESSION[Certificate_Code]' , Last_ip = '$Last_ip' , Last_Login = '$Last_login' WHERE Username = '$rows[Username]'",1);
                        $this->LOG = true;
                        return $this->LOG;
                    }else{
                        unset($_SESSION['Certificate_Code']);
                        $message->msg_session_prepare($permissions);
                       // $message->msg_session_prepare("This user can not login.");
                        pager::refresh();
                        exit();
                    }
                }catch (PDOException $e){
                    die("Error in PDO : ".$e);
                }
            }
            else{
                $message->msg_session_prepare("Invalid Values");
                pager::refresh();
                exit;
                //pager::go_page("http://projects.localhost/witcher/public/login");
            }
        }elseif (!isset($username) OR !isset($password) OR empty($username) OR empty($password)){
            $message->msg_session_prepare("one thing is empty");
            pager::refresh();
            exit;
            //pager::go_page("http://projects.localhost/witcher/public/login");
        }
    }
    public function is_login(){
        $db = new db();
        $preg = new preg();
        $message = new message();
        $user = new user();
        if (isset($_SESSION['Certificate_Code']) AND isset($_SESSION['Username']) AND isset($_SESSION['Password'])){
            $username = $_SESSION['Username'];
            $password = $_SESSION['Password'];
            $preg_username = $preg->username($username);
            $preg_password = $preg->password($password);
            if ($preg_password === 1 AND $preg_username === 1){
                $user_tbl = $user->user_db_info['db_Table'];
                try{
                    $check = $db->db_query("SELECT * FROM $user_tbl WHERE Username = '$username' AND Password = '$password' AND Session_id = '$_SESSION[Certificate_Code]'",1);
                    if ($check->rowCount() == 1){
                        return true;
                    }else{
                        return false;
                    }
                }catch (PDOException $e){
                    die("Error in PDO : ".$e);
                }
            }
            else{
                $message->msg_session_prepare("Invalid Values");
                pager::go_page("http://projects.localhost/witcher/public/login");
            }
        }
        elseif (!isset($_SESSION['Certificate_Code']) OR !isset($_SESSION['Username']) OR !isset($_SESSION['Password'])){
            //$message->msg_session_prepare("This user is not logged-in");
            return false;
        }
    }
    public function is_admin(){
        $user = new user();
        if ($this->is_login() == true){
            $permissions = $user->user_get_permission();
            if ($permissions){
                if ($permissions['Admin'] == 1){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return "isnot login";
        }
    }
}