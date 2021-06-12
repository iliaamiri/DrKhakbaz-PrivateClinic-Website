<?php
namespace Config;
/*
 * main table names go in here.
 *
 *  use $MAIN_TABLES array to get table names .
 * */
class tables{
public $MAIN_TABLES = [
'news' => 'news_tbl',
'user' => 'user_tbl',
'permissions' => 'user_permissions',
'menu' => 'menu_tbl',
'site' => 'site_tbl',
'comments' => 'messages_tbl',
'information' => 'informations',
    'news_categories' => 'news_categories',
    'logs_ips' => 'logs_ips'
];
}
