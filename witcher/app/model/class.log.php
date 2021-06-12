<?php
namespace Model;

use Config\tables;
use Model\db;
use Model\preg;

class log{
    public function traceIp($traced_from){
        $preg = new preg();
        if ($preg->custom('/^[0-9.]*$/i',$_SERVER['REMOTE_ADDR']) == true){
            $db = new db();
        $tables = new tables();
        $logs_tbl = $tables->MAIN_TABLES['logs_ips'];
        $time = time();
        $db->db_query("INSERT INTO $logs_tbl (Ip_address,Traced_from,Traced_time) VALUE ('$_SERVER[REMOTE_ADDR]','$traced_from','$time')",1);
        return true;
        }else{
            return false;
        }
    }
}