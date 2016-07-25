<?php
session_start();
class loginController extends Controller {  

    function index(){
        $this->view("index");   
    }
    function logview(){
        $this->view("login");
    }
    function login() {              //登入
            $name=$_POST['Username'];
            $pass=$_POST['Password'];
            $mo=$this->model("CRUD");   //include
            $result = $mo->read_user($name);
            $row=mysql_fetch_row($result);
    
            if($row[0]!=null && $row[1]!=null && $row[0]==$name && $row[1]==$pass){
                $_SESSION['username']=$row[0];
                $date= date("Y-m-d",time()+24*3600);
                $result = $mo->read_normal($date,$_SESSION['username']);
                $row=mysql_fetch_assoc($result);
                if($row>0){
                echo'<script>alert("明日有活動");document.location.href="calendar/search"</script>';
                            }
                else{
                   header("Location:/EasyMVC_/calendar/search");
                    }
        }
        else {
            $this->view("index");
            }
        }

}
?>
