<?php
  require_once('connection.php');  

   if(isset($_POST['function']) && $_POST['function'] == 'faculty_id'){
       $id = $_POST['id'];
       $sql = "SELECT * FROM department WHERE faculty_id = '$id'";
       $query =mysqli_query($conn,$sql);
            echo '<option select disable>-กรุณาเลือกสาขาวิชา-</option>';
        foreach($query as $department){
           echo '<option value="'.$department['department_id'].'">'.$department['department_name'].'</option>';
        }
       exit();
   }
?>
        