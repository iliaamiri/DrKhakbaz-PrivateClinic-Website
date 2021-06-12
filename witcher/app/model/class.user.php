<?php
namespace Model;

use Config\tables;

class user {
    //private $user_permission = [1=>"admin"];
    public $user_db_info = array(
        'db_Table' => "user_tbl",
        'db_Column'=> "Username"
    );
    public $user_column = "Username";
    private static $permission;
    public function user_exist($user_name){
        $preg = new preg();
        $preg_user = $preg->username($user_name);
        if ($preg_user == 1){
            $db = new db();
            $sql = $db->db_query("SELECT * FROM $this->user_db_info['db_Table'] WHERE $this->user_db_info['db_Column'] = '$user_name'",1);
            if ($sql->rowCount() > 0){
                return 1;
            }
            else{
                return 0;
            }
        }else{
            message::msg_alert("bad value.");
            exit();
        }
    }
    public function user_get_certificate(){
        $preg = new preg();
        $message = new message();
        if (isset($_SESSION['Certificate_Code'])){
            $preg_code = $preg->custom('/^[a-z0-9]*$/i',$_SESSION['Certificate_Code']);
            if ($preg_code === 1){

            }else{
                $message->msg_session_prepare("Certificate Code is not set");
                pager::go_page("http://".$_SERVER['SERVER_NAME']."/witcher/public/login");
                exit();
            }
            $db = new db();
            $table = $this->user_db_info['db_Table'];
            $sql = $db->db_query("SELECT * FROM $table WHERE Session_id = '$_SESSION[Certificate_Code]'",1);
            if ($sql->rowCount() > 0){
                $row = $db->db_fetch($sql);
                return $row;
            }
            else{
                $message->msg_session_prepare("Certificate Code is not set");
                pager::go_page("http://".$_SERVER['SERVER_NAME']."/witcher/public/login");
                exit();
            }
        }elseif (!isset($_SESSION['Certificate_Code'])){
            $message->msg_session_prepare("Certificate Code is not set");
            pager::go_page("http://".$_SERVER['SERVER_NAME']."/witcher/public/login");
            exit();
        }
    }
    public function user_get_permission($check_certificate = 1,$by_username = ""){
        if ($check_certificate == 1){
            $user = $this->user_get_certificate();
            $where = "user_tbl.Session_id='".$user['Session_id']."'";
        }
        else{
            $user = $by_username;
            $where = "user_tbl.Email = '".$user."'";
        }
        $db = new db();
        if ($user) {
            $sql = $db->db_query("SELECT user_permissions.* FROM user_tbl RIGHT JOIN user_permissions ON user_tbl.Email = user_permissions.Email WHERE $where", 1);
            self::$permission = $sql->fetch(\PDO::FETCH_ASSOC);
            return self::$permission;
        }else{
            return false;
        }
    }
    public function AddUser($data,$permissions){
        $db = new db();
        $preg = new preg();
        $clean_data = [
            $preg->username($data['Username']),
            $preg->password($data['Password']),
            $preg->number($data['Age']),
            $preg->email($data['Email']),
            $preg->alphabet($data['Sex'])
        ];
        $i = 0;
        foreach ($clean_data as $clean){
            if ($clean == 1){
                $i++;
            }
        }
        $count = count($clean_data);
        if ($count == $i){
            $data['Password'] = md5(sha1(md5($data['Password'])));
            $tables = new tables();
            $user_tbl = $tables->MAIN_TABLES['user'];
            $user_permissions = $tables->MAIN_TABLES['permissions'];
            $values = "";
            $end = end($permissions);
            foreach ($permissions as $a=>$b){
                if ($b == $end){
                    $values .= "'".$b."'";
                }else{
                    $values .= "'".$b."',";
                }
            }
            try{
                $db->db_query("INSERT INTO $user_permissions (Email,Active,Admin,ForgotPassword,Invite,WriteSite,ReadUsers,WriteUsers,WriteMenu,Comment,Login,SessionEncryption) VALUE ($values)",1);
                $db->db_query("INSERT INTO $user_tbl (Username,Password,Email,Age,Sex) VALUE ('$data[Username]','$data[Password]','$data[Email]','$data[Age]','$data[Sex]')",1);
                return true;
            }catch (\PDOException $e){
                $error = [
                    'Name' => 'PDO Exception',
                    'Function' => 'AddUser',
                    'Details' => $e
                ];
                return $error;
            }
        }else{
            $error = [
                'Name' => 'PregMatches',
                'Function' => 'AddUser'
            ];
            return $error;
        }
    }
    public function CountUsers(){
        $db = new db();
        $table = new tables();
        $table = $table->MAIN_TABLES['user'];
        $sql = $db->db_query("SELECT * FROM $table",1);
        return $sql->rowCount();
    }
    public function CountUsersBy($column,$value){
        $db = new db();
        $table = new tables();
        $table = $table->MAIN_TABLES['user'];
        $sql = $db->db_query("SELECT * FROM $table WHERE $column = '$value'",1);
        return $sql->rowCount();
    }
}