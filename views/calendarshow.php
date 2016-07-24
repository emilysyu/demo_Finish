<?php session_start();?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Calendar Practice</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
</script>
<style>
body{
     text-align: center;
}
div{
     font-size: 28px;
     margin-bottom: 20px;
}
table{
     width: 300px;
     text-align: center;
     margin: 0 auto;
}
td, th{
     border: 1px solid black;
     text-align: center;
}
</style>
</head>
<body>

<div class="banner bg-primary">Calendar Practice</div>
<form method="get" action="/EasyMVC_/calendar/search">
<input type="text" value="<?PHP echo $data['y']; ?>" maxlength="4" name="y">
<input type="text" value="<?PHP echo $data['m']; ?>" maxlength="2" name="m">
<input type="submit" value="search">
</form>
<a href = "search?y=<?PHP echo $data['y']-1; ?>&m=<?PHP echo $data['m']; ?>">preY</a>
<a href = "search?y=<?PHP echo $data['y']; ?>&m=<?PHP echo $data['m']-1; ?>">preM</a>
<?php echo $data['y'].'-'.$data['m'];?>
<a href = "search?y=<?PHP echo $data['y']; ?>&m=<?PHP echo $data['m']+1; ?>">nextM</a>
<a href = "search?y=<?PHP echo $data['y']+1; ?>&m=<?PHP echo $data['m']; ?>">preY</a>
<table class="table-bordered">
     <tr>
          <th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th>
     </tr>
     <?PHP 
          for($i=0; $i<count($data['show']); $i++){
               if($i == 0){
                    echo "<tr>";
               }
               echo "<td ><a href = 'newTask?y=".$data['y']."&m=".$data['m']."&d=".$data['show'][$i]."'>".$data['show'][$i]."</a></td>";
               if($i>=6 && ($i+1)%7 == 0){
                    echo "</tr>";
               }
          }
     ?>
</table>
<form method="POST" action="/EasyMVC_/calendar/logout">
<input type="submit" name="logout" value="logout"/>
</form>
<?php
$who_action = substr($_SESSION["username"],0,6);
if($who_action == "action"){
?>
<form method="POST">
<button  class="btn btn-info" name="action" ><a style="color:white" href="/EasyMVC_/calendar/newaction">action</a></button>
</form>
<?php }?>

<?php 
  $userTask = array();
  $crud=$this->model("CRUD");
  $taskResult = $crud->read_join($_SESSION['username']);
  while($row = mysql_fetch_array($taskResult)){
    $userTask[] = $row['task'];
  }
  // var_dump($userTask);
  
  
  $result=$crud->read_action();//查全部活動
  while($row = mysql_fetch_array($result)){
    
    if(!in_array($row['action'], $userTask )){

?>
<form method="POST" action="/EasyMVC_/action/join?action=<?php echo $row[1];?>&date=<?php echo $row[2];?>">
<td><?php echo $row[1];?></td>
<td><input type="submit" name="join" value="join"/></td>
</form>
    <?php } //end if?>
  <?php } //endwhile?>
</body>
</html>