<?php
namespace Config;
/*
 * Basic DB Data goes in here.
 *
 *  use $DB_CONFIG array to get DB values .
 * */
class database{
public $DB_CONFIG = [
'METHOD' => 'Mysql',
'SERVER' => 'localhost',
'DB_DEFAULT_NAME' => 'database',
'DB_USER' => 'root',
'DB_PASS' => ''
];
}
