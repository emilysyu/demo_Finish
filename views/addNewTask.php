<?php session_start();
include_once("../models/class.crud.php");
?>
<html>

<body>
    <meta contect=t ext/html charset=utf-8>
    <link rel="stylesheet" type="text/css" media="screen" href="calendar.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css">
    <h1>新增待辦日期</h1>
    <form method="POST" action="../controllers/dbcrud.php">
        <table>
            <tr>
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $_GET['year'];?>年</h4></td>
                    <input style="visibility:hidden" name="year" value="<?php  echo $_GET['year'];?>" />
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $_GET['month'];?>月</h4></td>
                    <input style="visibility:hidden" name="month" value="<?php  echo $_GET['month'];?>" />
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $_GET['day'];?>日</h4></td>
                    <input style="visibility:hidden" name="day" value="<?php  echo $_GET['day'];?>" />
                <td width="80" align="center" valign="baseline">新增事件</td>
                <td valign="baseline"><input type="text" name="dateTask" id="dateTask">
                <input class="btn btn-default" type="submit" id="ok" name=add value="確認" /></td>
                
            </tr>
        </table>
</form>
    <?php
        $crud=new CRUD();
        $date = $_GET['year']."-".$_GET['month']."-".$_GET['day'];
        $result2 = $crud->read_judge($date);
        $row2 = mysql_fetch_array($result2);
        
    ?>
    <div class="col-lg-6">
        <?php if(empty($row2)){?>
        <h1 style="color:red">目前沒有任何活動</h1>
        <?php }?>
        <?php if(!empty($row2)){?>
        <table class="table table-hover">
                <thead>
                    <td valign="baseline">
                        <h4><strong>項目</strong></h4>
                    </td>
                    <td valign="baseline">
                        <h4><strong>事件內容</strong></h4>
                    </td>
                </thead>
<?php 
                    if($_SESSION['username'] != 'boss'){
                    $result = $crud->read_judge($date);
                    
                    while($row = mysql_fetch_array($result)){
                        $coun=substr($row[0],8);
                    if($row[1]==$_SESSION['username'] || $row[1]=='boss'){
                    
                ?>
                <tr>
                <?php if($_SESSION['username'] != 'boss'){?>
                    <td valign="baseline">
                        <h4><strong><?php echo $coun;?></strong></h4>
                       <?php }
                       else{?>
                    <td valign="baseline">
                        <h4><strong><?php echo $row[1];?></strong></h4>
                       <?php }?>
                    </td>
                    
                    <td valign="baseline">
                        <h4><strong><?php echo $row[2];?></strong></h4>
                      
                    </td>
                    <td>
                         <button class="btn btn-default"  id="modify" /><a href="../views/modify.php?id=<?php echo $row[0];?>">修改</a></button>
                    <form method="POST" action="../controllers/dbcrud.php?id=<?php echo $row[0];?>">
                         <button class="btn btn-default" type="submit" name="deleteok" id="deleteok" />刪除</button>
                    </form>
                    </td> 
                 <?php }$save++;}?>
                </tr>
                <?php }
                else {
                    $result4 = $crud->read_judge($date);
                    $save=1;
                    while($row4 = mysql_fetch_array($result4)){
                ?>
                <tr>
                    <td valign="baseline">
                        <h4><strong><?php echo $row4[1];?></strong></h4>
                    </td>
                    <td valign="baseline">
                        <h4><strong><?php echo $row4[2];?></strong></h4>
                    </td>
                 <?php }?>
                </tr>
                <?php $save++;}?>
            </table>
            <?php }?>
        </div>
</body>

</html>