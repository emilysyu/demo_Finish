<?php
session_start();
class actionController extends Controller { 
    function actionNew(){            //新增活動
 
                $who_action=$_POST['Who'];
                $action=$_POST['Action'];
                $time=$_POST['Time'];
                $crud=$this->model("CRUD");
                $crud->create_action($who_action,$action,$time);
                header("Location:/EasyMVC_/calendar/search");        
                
            }
    function join(){   //join
        $crud=$this->model("CRUD");
        $time=$_GET['date'];
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
        header("Location:/EasyMVC_/calendar/search");

            }

}