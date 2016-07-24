<?php
session_start();

class registerController extends Controller {
    function registerview(){
      $this->view("register");   
    }
    function newmember(){    //註冊
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $crud=$this->model("CRUD");
        $result = $crud->read_user($username);
        $row=mysql_fetch_assoc($result);
        if($row > 0){
        echo '<meta charset="UTF-8">';
        echo'<script>alert("帳號重複");document.location.href="../views/register.php"</script>';
        }
        else{
        $crud=$this->model("CRUD");
        $crud->create_user($username,$password);
        header("Location: ../views/index.php");
        }
    }    
}
?>
