  <meta http-equiv="content-type" content="text/html;charset=utf-8">

<?php
session_start();
include_once("../models/class.crud.php");

$crud = new CRUD();
if(isset($_POST['register'])) //註冊
    {
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $result = $crud->read_user($username);
        $row=mysql_fetch_assoc($result);
        if($row > 0){
        echo'<script>alert("帳號重複");document.location.href="../views/register.php"</script>';
        }
        else{
        $crud->create_user($username,$password);
        header("Location: ../views/index.php");
        }
}
if(isset($_POST['Login'])) //登入
{
  $name=$_POST['Username'];
  $pass=$_POST['Password'];


    $result = $crud->read_user($name);
    $row=mysql_fetch_row($result);

    if($row[0]!=null && $row[1]!=null && $row[0]==$name && $row[1]==$pass){
        $_SESSION['username']=$row[0];
        $date= date("Y-m-d",time()+24*3600);
        $crud=new CRUD();
        $result = $crud->read_normal($date,$_SESSION['username']);
        $row=mysql_fetch_assoc($result);
        if($row>0){
        echo'<script>alert("明日有活動");document.location.href="../views/calendar.php"</script>';
        }
        else{
            header("Location:../views/calendar.php");
            }
    }
    
    else {
                header("Location:../views/index.php");
    }
}
if(isset($_POST['add']) && isset($_SESSION['username'])) //新增事件
    {
        $count = 0;
        $date2 = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
        $date3 = $_POST['year'].$_POST['month'].sprintf("%'.02d",$_POST['day']);
        $addid = $crud->read_ID($_SESSION['username'],$date2);
        $row = mysql_fetch_array($addid);
        $one = 1 ;
        echo $row[0];
    if($row[0] == NULL)
    {
        $id = $date3.$one;
    }
    else{
    $tmp = substr($row[0],8);
    $tmp = (int)($tmp) + 1 ;
    $id = $date3.$tmp;
    }
    
     $crud->create_task($id,$_SESSION['username'],$_POST['dateTask'],$date2);
    
     header("Location:../views/calendar.php");
}
if(isset($_POST['modifyok'])) //修改事件
    {
        $id = $_POST['id'];
        $crud->update_task($_POST['modifyTask'],$_POST['id']);
        header("Location:../views/calendar.php");
}
if(isset($_POST['deleteok'])) //刪除事件
    {

        $ID = $_GET['id'];
        $crud->delect_task($ID);
        echo $ID;
        header("Location:../views/calendar.php");
}
if(isset($_POST['newAction'])) //新增活動
    {   
        
        $who_action=$_POST['Who'];
        $action=$_POST['Action'];
        $time=$_POST['Time'];
        
        $crud->create_action($who_action,$action,$time);
        header("Location:../views/calendar.php");
}
if(isset($_POST['join'])) //join
    {   $time=$_GET['date'];
        $exp = explode("-",$time);
        $idt = $exp[0].$exp[1].$exp[2];
        $addid = $crud->read_ID($_SESSION['username'],$time);
        $row = mysql_fetch_array($addid);
        $one = 1 ;
        
    
    if($row[0] == NULL)
    {
        $id = $idt.$one;
    }
    else{
    $tmp = substr($row[0],8);
    $tmp = (int)($tmp) + 1 ;
    $id = $idt.$tmp;
    }
    
        $who_join=$_SESSION['username'];
        $action=$_GET['action'];
        
        $crud->create_task($id,$_SESSION['username'],$action,$time);
        header("Location:../views/calendar.php");


}
if(isset($_POST['logout'])) //登出
    {
        unset($_SESSION['username']);
        header("Location:../views/index.php");

}
?>
