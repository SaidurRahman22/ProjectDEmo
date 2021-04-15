<?php
session_start();
$connection = mysqli_connect("localhost","root","","adminpanel");
if(isset($_POST['registerbtn']))

{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['confirmpassword'];

  if ($password===$cpassword)
  {
    $query = "INSERT INTO register (username,email,password) VALUES('$username','$email','$password')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
       {
      //echo "Saved";
      $_session['success'] = "Admin Profile Added";
      header('Location: register.php');
       }
  else   {
    //echo "Not Saved";
    $_session['status'] = "Admin Profile Not Added";
    header('Location: register.php');
         }

  }
  else {
    $_session['status'] = "password does not match";
    header('Location: register.php');
       }
}


if(isset($_POST['updatebtn']))
{
$id = $_POST['edit_id'];
$username = $_POST['edit_username'];
$email = $_POST['edit_email'];
$password = $_POST['edit_password'];

  $query = "UPDATE register set username='$username', email ='$email',password='$password' where id ='$id'  ";
  $query_run = mysqli_query($connection,$query);

  if($query_run)
    {
        $_SESSION['success'] = "your data is updated";
        header('Location:register.php');
    }
  else {
    $_SESSION['status'] = "your data is not updated";
    header('Location:register.php');
  }

}


if(isset($_POST['delete_btn']))
  {
   $id = $_POST['delete_id'];
   $query = "DELETE FROM register where id = '$id' ";
   $query_run = mysqli_query($connection,$query);

   if($query_run)
     {
         $_SESSION['success'] = "your data is Deleted";
         header('Location:register.php');
     }
   else {
     $_SESSION['status'] = "your data is not Deleted";
     header('Location:register.php');
   }

}

 ?>
