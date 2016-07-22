<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <title> Calendar</title>
  <script type="text/javascript" src="jquery-3.0.0.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" media="screen" href="calendar.css">
</head>
<body>
<?php
include("../controllers/calendar_show.php");
include_once("../models/class.crud.php");
$crud=new CRUD();
?>

<form method="POST" action="../controllers/dbcrud.php">
<input type="submit" name="logout" value="logout"/>
</form>
<?php
$who_action = substr($_SESSION["username"],0,6);
if($who_action == "action"){
?>
<form method="POST" action="newaction.php">
<button  class="btn btn-info" name="action" ><a style="color:white" href="newaction.php">action</a></button>
</form>
<?php }?>
<?php 
  $userTask = array();
  
  $taskResult = $crud->read_join($_SESSION['username']);
  while($row = mysql_fetch_array($taskResult)){
    $userTask[] = $row['task'];
  }
  // var_dump($userTask);
  
  
  $result=$crud->read_action();//查全部活動
  while($row = mysql_fetch_array($result)){
    
    if(!in_array($row['action'], $userTask )){

?>
<form method="POST" action="../controllers/dbcrud.php?action=<?php echo $row[1];?>&date=<?php echo $row[2];?>">
<td><?php echo $row[1];?></td>
<td><input type="submit" name="join" value="join"/></td>
</form>
    <?php } //end if?>
  <?php } //endwhile?>
</body>

</html>