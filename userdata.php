<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Users Profile

    </h4>
  </div>

  <div class="card-body">
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !='' )
{
  echo '<h2> '.$_SESSION['success'].' </h2>';
//echo $_SESSION['success'];
  unset($_SESSION['success']);
}

if(isset($_SESSION['status']) && $_SESSION['status'] !='' )
{
  echo '<h2 class = "bg_info"> '.$_SESSION['status'].' </h2>';
//echo $_SESSION['success'];
  unset($_SESSION['status']);
}

 ?>


    <div class="table-responsive">
<?php
$connection = mysqli_connect("localhost","root","","adminpanel");

       $query = "SELECT * FROM users";
        $query_run = mysqli_query($connection,$query);

 ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Password</th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

          <?php
              if (mysqli_num_rows($query_run) > 0)

              {
                 while ($row = mysqli_fetch_assoc($query_run))
                 {
                  ?>


          <tr>
                  <td> <?php echo $row['id']; ?> </td>
                  <td> <?php echo $row['username'];?> </td>
                  <td> <?php echo $row['PASSWORD']; ?></td>


            <td>
                <form action="usrcode.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>

          </tr>

          <?php
     }

  }
     else {
       echo "No record";
     }
?>

        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
