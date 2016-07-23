<?php session_start();?>
<html>

<body>
    <meta contect=t ext/html charset=utf-8>
    <link rel="stylesheet" type="text/css" media="screen" href="/EasyMVC_/views/calendar.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/EasyMVC_/views/bootstrap.css">
    <link rel="stylesheet" href="/EasyMVC_/views/css/style.css">

    <?php 
    $id = $_GET['id'];
    $year=substr($id,0,4);
    $month=substr($id,4,2);
    $day=substr($id,6,2);
    ?>
    <div class="container">
        	<section id="content">
        <h1>修改</h1>
        <form method="POST" action="/EasyMVC_/taskcurd/modifyTask">
            <div>
        <table>
            <tr>
                <td width="120" align="center" valign="baseline"><?php echo $year."/".$month."/".$day;?></td>
            </tr>
            <tr>
                <input style="visibility:hidden" name="id" value="<?php echo $id;?>" />
                
                <td width="80" align="center" valign="baseline">修改事件</td>
                <td valign="baseline"><input type="text" name="modifyTask" id="modifyTask" />
                    <input class="btn btn-default" type="submit" id="modifyok" name="modifyok"value="modifyok" /></td>
            </tr>
        </table>
        </div>
        </form>
    	</section><!-- content -->
   </div> 
</body>

</html>
