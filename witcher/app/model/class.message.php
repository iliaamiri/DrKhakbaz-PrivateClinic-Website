<?php
/**
 * Created by PhpStorm.
 * User: pcs
 * Date: 29/03/2018
 * Time: 09:12 PM
 */

namespace Model;


class message
{
    public static function msg_alert($msg){
        $preg = new preg();
        $preg_msg = $preg->text($msg);
        if ($preg_msg == 1){
            echo '<script>alert("'.$msg.'");</script>';
        }else{
            die("bad value for message->msg_alert().");
        }
    }
    public function msg_show($msg){
        echo $msg;
    }
    public function msg_session_prepare($msg){
        $_SESSION['msg'] = $msg;
    }
    public function msg_session_show($expire = 1){
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            if ($expire == 1){
                unset($_SESSION['msg']);
            }
        }
    }
}