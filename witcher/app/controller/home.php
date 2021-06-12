<?php
namespace Controller;

use Model\db;
use Model\views;
use Config\tables;
class home extends views {
    public function start(){
        $array = array(parent::setPage("index.php"));
        parent::Show($array);
    }
    private function getInformatons(){
        $db = new db();
        $table = new tables();
        $information_tbl = $table->MAIN_TABLES['information'];
        $sql = $db->db_query("SELECT * FROM $information_tbl WHERE Status = 1",1);
        if ($sql->rowCount() > 0 ){
            $row = $sql->fetch(\PDO::FETCH_ASSOC);
            return $row;
            exit();
        }
        return "Didn't found anything.";
    }
    private function getNews(){

    }
}