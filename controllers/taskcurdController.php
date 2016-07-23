<?php
session_start();

class taskcurdController extends Controller{
    
    function delecteTask(){         //刪除事件
         $ID = $_GET['id'];
        $crud=$this->model("CRUD");
        $crud->delect_task($ID);
        echo $ID;
        header("Location:/EasyMVC_/calendar/search");
        } 
    function newTask(){     //新增事件
        $count = 0;
        $date2 = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
        $date3 = $_POST['year'].$_POST['month'].sprintf("%'.02d",$_POST['day']);
        $crud=$this->model("CRUD");
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

     header("Location:/EasyMVC_/calendar/search");
    }
    function modify(){
        $this->view("modify");
    }
    function modifyTask(){      //修改事件

        $id = $_POST['id'];
        $crud=$this->model("CRUD");
        $crud->update_task($_POST['modifyTask'],$_POST['id']);
        header("Location:/EasyMVC_/calendar/search");
    }
 
}

?>