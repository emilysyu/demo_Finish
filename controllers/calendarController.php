<?php
class calendarController extends Controller{
     function search(){
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
    $this->view("calendarshow",$data);
}    
     function newTask(){           //新增事件           
          $data['y'] = $_GET['y'];
          $data['m'] = $_GET['m'];
          $data['d'] = $_GET['d'];
          $this->view("addNewTask",$data);
     }
     function logout(){
          if(isset($_POST['logout'])) //登出
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