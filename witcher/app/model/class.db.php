<?php
namespace Model;

class db{
    // default db
    private $db_username = "root";
    private $db_password = "";
    private $db_name     = "bookstore";
    private $db_host     = "localhost";
    private $db_charset  = "utf8";
    public static $conn;
    function __construct()
    {
        self::$conn = $this->db_conn();
    }
    public function db_conn()
    {
        try {
            $conn = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset", $this->db_username, $this->db_password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            die($e);
        }
    }
    public function db_conn_custom($array){
        try{
            $conn_custom = new \PDO("mysql:host=$array[hostname];dbname=$array[dbname]",$array['user'],$array['pass']);
            $conn_custom->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn_custom;
        }catch (\PDOException $e){
            die("ERROR IN Connecting to <b style='color: red;'>".$array['dbname']."</b> PDO Threw : <br>".$e);
        }
    }
    public function db_query($query,$execute = 0){
        try{
            $sql = self::$conn->prepare($query);
            if ($execute == 1){
                $sql->execute();
            }
            return $sql;
        }catch (\PDOException $e){
            die($e);
        }
    }
    public function db_charset($charset){
        self::$conn->exec("SET NAMES ".$charset);
    }
    public function db_fetch($sql){
        $row = $sql->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }
    public function getColumnsName($table){
        try{
            $sql = $this->db_query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`= $this->db_name AND `TABLE_NAME`= $table ",1);
            if ($sql->rowCount() > 0){
                $row = $this->db_fetch($sql);
                return $row;
            }else{
                throw new \PDOException("this table does not exist or does not any column.");
            }
        }catch (\PDOException $e){
            die($e);
        }
    }
}