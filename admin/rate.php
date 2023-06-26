<?php 
    include('../config.php');
  $rate=$_POST['rate'];

  $sql='Update rate set rate=? Where rate_id=1';
  $stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,'i',$rate);
  if (mysqli_stmt_execute($stmt)) {
    $host = $_SERVER['HTTP_HOST'];
    echo "<script>alert('rate change success')</script>";
    header('Location:http://'.$host.'/Transportation/admin/#');
     
  } else {
    echo "('Error: " . mysqli_stmt_error($stmt) . "')";
  }
  mysqli_close($conn);
?>