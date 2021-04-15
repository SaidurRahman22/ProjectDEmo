<?php
session_start();
$connection = mysqli_connect("localhost","root","","adminpanel");



if(isset($_POST['delete_btn']))
  {
   $id = $_POST['delete_id'];
   $query = "DELETE FROM users where id = '$id' ";
   $query_run = mysqli_query($connection,$query);

   if($query_run)
     {
         $_SESSION['success'] = "your data is Deleted";
         header('Location:userdata.php');
     }
   else {
     $_SESSION['status'] = "your data is not Deleted";
     header('Location:userdata.php');
   }

}

?>
