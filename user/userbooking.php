<?php
// include('../path.php');

include('../path.php');


 
include_once('../config.php');
session_start();

$id = $_SESSION['id'];
if(isset($_SESSION['id'])&& ($_SESSION['type']==0))
{
    $query = "select * from users WHERE userid = $id";
    $result = mysqli_query($conn, $query) or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['firstname'];
    $_SESSION['user_id']=$row['userid'];
}
else
{
  header('location:../main/login.php?msg=please_login');
}

if (isset($_POST["feedback"])) {
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];
  $tripid = $_POST['tripid']; // Retrieve the tripid from the form data

  $sql = "INSERT INTO feedback (userid, tripid, rating, comments) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "iiis", $id, $tripid, $rating, $comment);

  if (mysqli_stmt_execute($stmt)) {
    header('Location: userbooking.php?msg=feedback_success');
    exit(); // Add this line to prevent further execution of the code
  } else {
    echo "('Error: " . mysqli_stmt_error($stmt) . "')";
  }

  mysqli_stmt_close($stmt);
}
if(isset($_POST["canceltrip"])){
  $tripid = $_POST['tripid']; // Retrieve the tripid from the form data

  $sql = "DELETE FROM payments WHERE userid=? and tripid= ? ";
  $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id, $tripid);
    $stmt->execute();
  if($stmt->affected_rows > 0) {
    $sql = "UPDATE trips SET seats = seats + 1 WHERE tripid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tripid);
    $stmt->execute();
    exit(); // Add this line to prevent further execution of the code
  }
  else{
    echo "('Error: " . mysqli_stmt_error($stmt) . "')";
  }
  mysqli_stmt_close($stmt);
}
$submittedFeedback = array();

// Retrieve previously submitted feedback from the database
$query = "SELECT tripid FROM feedback WHERE userid = $id";
$result = mysqli_query($conn, $query) or die("Selecting submitted feedback failed");

while ($row = mysqli_fetch_assoc($result)) {
  $submittedFeedback[] = $row['tripid'];
}
$errorMessage ="";
if (isset($_GET['msg']) && ($_GET['msg'] == "feedback_success")) {
  $errorMessage = "Thank You For Submit Your Feedback !!";
 }else if (isset($_GET['msg']) && ($_GET['msg'] == "delete-success")) {
  $errorMessage = "Success Trip Cancel !!";
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/userbooking.css" />
  <link rel="stylesheet" href="../admin/css/modal.css">
  <title>Booking Management</title>
</head>
<style>
  body {
    background-color: var(--backColor) !important;
  }
</style>

<body>
  <?php include('../include/userheader.php'); ?>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text mt-5 mb-5">
          <h2 class="mb-5">Manage Your Bookings</h2>
          <div class="">
            <p class>View and manage your booked bus tickets below. To <span class="one text-danger">cancel</span> a booking, simply
              click the "Cancel" button. Please note that cancellations must be made at least <span class="one text-warning">2
                hours</span> prior to the scheduled departure time.</p>
            <p>We recommend that you arrive at the bus stop at least <span class="two text-primary">15 minutes</span> before the
              scheduled departure time to ensure a timely departure.</p>
            <p>After your trip has ended, we welcome your feedback to help us improve our service.</p>
          </div>
          <div class="text-center mt-2 mb-2">
            <h5 class="text-success" id="err"><?php echo $errorMessage ?></h5>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>From</th>
              <th>To</th>
              <th>Date</th>
              <th>Time</th>
              <th>Bus Number</th>
              <th>Action</th>
            
            </tr>
          </thead>
          <tbody>
            <?php
            $sql="SELECT * FROM paymentsview where UserID=$id";
            $res=mysqli_query($conn,$sql);
            $payments=array();
            $tripid="";
            
            if (mysqli_num_rows($res) > 0) {
              $i=1;
              while ($row = mysqli_fetch_assoc($res)) {
                $payments[] = $row;
                $tripid = $row['tripid'];
                $disableFeedback = in_array($tripid, $submittedFeedback) ? 'disabled' : '';
            
                echo '<tr>';
                echo '<td>' . $i. '</td>';
                echo '<td>' . $row['tripfrom'] . '</td>';
                echo '<td>' . $row['tripto'] . '</td>';
                echo '<td>' . $row['schedule'] . '</td>';
                echo '<td>' . $row['time'] . '</td>';
                echo '<td>' . $row['busid'] . '</td>';
                echo '<td>
                  <button class="star-button me-2 btn-refund" data-tripid="' . $tripid . '">
                    <img width="32" height="32" src="https://img.icons8.com/flat-round/64/cancel--v3.png" alt="cancel--v3"/>
                  </button>
                  <button class="star-button btn-feedback" type="button" data-toggle="modal" data-target="#form" data-tripid="' . $tripid . '"' . $disableFeedback . '>
                    <img width="32" height="32" src="https://img.icons8.com/flat-round/64/star--v1.png" alt="star--v1"/>
                  </button>
                </td>';
                echo '</tr>';
                $i++;
              }
            }
            else{
              echo '<h5 class=" text-center">No Result Found,You Have Not Book any trip.</h5>';
            }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="text-right cross" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times mr-2"></i>
        </div>
        <div class="card-body text-center">
          <img src="https://i.imgur.com/d2dKtI7.png" height="100" width="100" />
          <div class="comment-box text-center">
            <h4>Add a comment</h4>
            <form method="POST" action="userbooking.php">
              <input type="hidden" name="tripid" id="feedback-tripid" value="">
              <div class="rating">
                <input type="radio" name="rating" value="5" id="5" /><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4" /><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3" /><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2" /><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1" /><label for="1">☆</label>
              </div>
              <div class="comment-area">
                <textarea class="form-control" placeholder="what is your view?" rows="4" name="comment"></textarea>
              </div>
              <div class="text-center mt-4">
                <button type="submit" name="feedback" class="btn btn-success">Send feedback</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal-container" id="myModal">
  <!-- Modal content -->
  <div class="modal-wrapper bg-white">
    <div class="modall">
      <header>
        <h2>Confirmation</h2>
      </header>
      <main>
        <div class="icon-wrapper">
          <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div class="text-wrapper">
          <span>Are you sure you want to cancel the trip?</span>
        </div>
      </main>
      <footer>
      <div class="btn-container">
    <div class="cancel-wrapper">
      <button class="btn btn-cancel">Cancel</button>
    </div>
    <div class="delete-confirm-wrapper">
      <button class="btn btn-confirm" name="canceltrip">
        <i class="fa-solid fa-trash"></i>
        Confirm
      </button>
    </div>
  </div>
      </footer>
    </div>
  </div>
</div>

 
  
  <?php include('../include/footer.html'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="js/bookingmodal.js"></script>
  <script>
    $(document).ready(function() {
      $(".btn-feedback").click(function() {
        var tripid = $(this).data("tripid");
        $("#feedback-tripid").val(tripid);
      });
    });

    $(document).ready(function() {
    var tripIdToDelete = null;

    // Open the cancellation confirmation modal
    $(".btn-refund").click(function() {
      tripIdToDelete = $(this).data("tripid");
      $("#myModal").fadeIn();
    });

    // Close the cancellation confirmation modal
    $(".btn-cancel").click(function() {
      $("#myModal").fadeOut();
    });

    // Perform the trip cancellation
    $(".btn-confirm").click(function() {
      if (tripIdToDelete) {
        $.ajax({
          type: "POST",
          url: "userbooking.php",
          data: { canceltrip: true, tripid: tripIdToDelete },
          success: function(response) {
            window.location.href = "userbooking.php?msg=delete-success";
          },
          error: function() {
            console.log("Error: Failed to cancel the trip.");
          }
        });
      }
    });
  });


      err=document.getElementById("err");
      setTimeout(function() {
        document.getElementById("err").style.display = "none";
      }, 3000);




</script>
</body>
</html>
