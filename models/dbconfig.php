<?php 
    define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD', '');
	define('DB_NAME','calendar');
class DB_con {
    function __construct(){
        $link = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
        $res = mysql_query("set names utf8",$link);
        mysql_selectdb(DB_NAME,$link);
    }

}
?>