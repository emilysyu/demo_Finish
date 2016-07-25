<?php session_start();?>
<html>

<body>
    <meta contect=t ext/html charset=utf-8>
    <link rel="stylesheet" type="text/css" media="screen" href="/EasyMVC_/views/calendar.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/EasyMVC_/views/bootstrap.css">
    <h1>新增待辦日期</h1>
    <form method="POST" action="/EasyMVC_/taskcurd/newTask">
        <table>
            <tr>
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $data['y'];?>年</h4></td>
                    <input style="visibility:hidden" name="year" value="<?php  echo $data['y'];?>" />
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $data['m'];?>月</h4></td>
                    <input style="visibility:hidden" name="month" value="<?php  echo $data['m'];?>" />
                <td width="80" align="center" valign="baseline">
                    <h4><?php  echo $data['d'];?>日</h4></td>
                    <input style="visibility:hidden" name="day" value="<?php  echo $data['d'];?>" />
                <td width="80" align="center" valign="baseline">新增事件</td>
                <td valign="baseline"><input type="text" name="dateTask" id="dateTask">
                <input class="btn btn-default" type="submit" id="ok" name=add value="確認" /></td>
                
            </tr>
        </table>
</form>
    <div class="col-lg-6">
                                                        <!----$row2-->
        <?php if($_SESSION['username']!= 'boss' && empty($data['row2'])){?>
        <h1 style="color:red">目前沒有任何活動</h1>
        <?php }
                                                        /*$row2*/       
        else if($_SESSION['username']== 'boss' && empty($data['row2'])){?>
        <h1 style="color:red">目前沒有任何活動</h1>
        <?php }?>
        <?php if(!empty($data['row2'])){?>
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
                    $save=1;
                    foreach($data['row'] as $row){
                        $coun=substr($row['ID'],8);
                    if($row['username']==$_SESSION['username'] || $row['username']=='boss'){
                    
                ?>
                <tr>
                <?php if($_SESSION['username'] != 'boss'){?>
                    <td valign="baseline">
                        <h4><strong><?php echo $save;?></strong></h4>
                       <?php }
                       else{?>
                    <td valign="baseline">
                        <h4><strong><?php echo $row['username'];?></strong></h4>
                       <?php }?>
                    </td>
                    <td valign="baseline">
                        <h4><strong><?php echo $row['task'];?></strong></h4>
                      
                    </td>
                    <td>
                         <button class="btn btn-default"  id="modify" /><a href="/EasyMVC_/taskcurd/modify?id=<?php echo $row['ID'];?>">修改</a></button>
                    <form method="POST" action="/EasyMVC_/taskcurd/delecteTask?id=<?php echo $row['ID'];?>">
                         <button class="btn btn-default" type="submit" name="deleteok" id="deleteok" />刪除</button>
                    </form>
                    </td> 
                 <?php $save++;}}?>
                </tr>
                <?php }
                else {
                    $save=1;
                    foreach($data['row4'] as $row4){
                ?>
                <tr>
                    <td valign="baseline">
                        <h4><strong><?php echo $row4['username'];?></strong></h4>
                    </td>
                    <td valign="baseline">
                        <h4><strong><?php echo $row4['task'];?></strong></h4>
                    </td>
                 <?php }?>
                </tr>
                <?php $save++;}?>
            </table>
            <?php }?>
        </div>
</body>

</html>