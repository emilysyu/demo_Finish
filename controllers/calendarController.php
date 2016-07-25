<?php
class calendarController extends Controller{
     function search(){                           //行事曆
         $y = date("Y");
         $m = date("m");
          if( isset($_GET['y']) && isset($_GET['m'])){
               $y = $_GET['y'];
               $m = $_GET['m'];
               if($m == 0){
                    $y=$y-1;
                    $m=12;
               }
               else if($m == 13){
                    $y=$y+1;
                    $m=1; 
               }
          }
     $a_date = $y . '-' . $m . '-01';
     $dayOfWeek = date("w", strtotime($a_date));
     $maxDateOfMonth = date("t", strtotime($a_date));
     $dateArray;
     $currentDate = 1;
     $index = 0;
     while($currentDate <= $maxDateOfMonth){
          if($index >= $dayOfWeek){
               $dateArray[$index] = $currentDate."";
               $currentDate++;
          }else{
               $dateArray[$index] = "&nbsp;";
          }
          $index++;
     }
     while($index%7 != 0){
          $dateArray[$index] = "&nbsp;";
          $index++;
     }
    $data['show']=$dateArray;
    $data['y']=$y;
    $data['m']=$m;
    
    
     $userTask = array();
     $crud=$this->model("CRUD");
     $taskResult = $crud->read_join($_SESSION['username']);
     while($row = mysql_fetch_array($taskResult)){
     $userTask[] = $row['task'];
  }
     $data['userTask']=$userTask;
  
  $result=$crud->read_action();
  while($row = mysql_fetch_array($result)){
       $data['row'][]=$row;
  }
    $this->view("calendarshow",$data);
}    
     function newTask(){                                    //新增事件           
          $data['y'] = $_GET['y'];
          $data['m'] = $_GET['m'];
          $data['d'] = $_GET['d'];
          $crud=$this->model("CRUD");
          $date = $data['y']."-".$data['m']."-".$data['d'];
          $result2 = $crud->read_judge($date);
          $row2 = mysql_fetch_array($result2);
          $data['row2']=$row2;
          
          
          $result = $crud->read_judge($date);
          
          while($row = mysql_fetch_array($result)){
          $data['row'][]=$row;
          }
          
          
          $result4 = $crud->read_judge($date);
          while($row4 = mysql_fetch_array($result4)){
               $data['row4'][]=$row4;
          }
          $this->view("addNewTask",$data);
     }
     function logout(){
          if(isset($_POST['logout']))                       //登出
         {
             unset($_SESSION['username']);
             $this->view("index");
     
          }
     }
     function newaction(){
          $this->view("newaction");
     }
     
}
?>