<?php 
session_start();
require_once("dbconfig.php");
class CRUD {
    public function __construct(){
        $db = new DB_con();
    }
    public function create_user($username,$password){//註冊會員
        mysql_query("INSERT INTO `userList` (`username`,`password`)
        VALUES ('".$username."','".$password."');");
    }
    public function read_user($name){//登入
        
        $sql = mysql_query("SELECT * FROM `userList` where `username` = '".$name."'");
        return $sql;
    }
     public function create_task($ID,$username,$task,$date){//新增事件
        
        mysql_query("INSERT INTO `dateTask` (`ID`,`username`,`task`,`date`)
        VALUES ('".$ID."','".$username."','".$task."','".$date."')");
    }
    public function create_action($username,$task,$date){//新增活動
        
        mysql_query("INSERT INTO `dateAction` (`ID`,`action`,`date`)
        VALUES ('".$username."','".$task."','".$date."')");
    }
    public function read_ID($id,$date2){
        $sql = mysql_query("SELECT `ID` from `dateTask` where `username`='".$id."' 
        and `date`='".$date2."' ORDER BY `ID` DESC limit 0,1;");
        return $sql;
    }
    public function update_task($task,$id){           //修改事件
        mysql_query("UPDATE `dateTask` SET `task` = '".$task."' where `ID` = '".$id."';");
    }
    public function delect_task($ID){               //刪除事件
        mysql_query("DELETE FROM `dateTask` where `ID`='".$ID."';");
    }
    public function read_judge($date){//判斷是boss
        return mysql_query("SELECT * FROM `dateTask` WHERE `date` = '".$date."';");
    }
    public function read_normal($date,$username){//判斷
        return mysql_query("SELECT * FROM `dateTask` WHERE `date` = '".$date."' 
        and `username` = '".$username."'");
    }
    public function read_join($username){//判斷參加
        return mysql_query("SELECT * FROM `dateTask` WHERE `username` = '".$username."';");
    }
    public function read_action(){//判斷活動
        return mysql_query("SELECT * FROM `dateAction`;");
    }
}
?>