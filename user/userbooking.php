<?php
include('../path.php')
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
  <?php include('../include/userheader.html'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text mt-5 mb-5">
          <h1 class="mb-5">Manage Your Bookings</h1>
          <div class="">
            <p class>View and manage your booked bus tickets below. To <span class="one text-danger">cancel</span> a booking, simply
              click the "Cancel" button. Please note that cancellations must be made at least <span class="one text-warning">2
                hours</span> prior to the scheduled departure time.</p>
            <p>We recommend that you arrive at the bus stop at least <span class="two text-primary">15 minutes</span> before the
              scheduled departure time to ensure a timely departure.</p>
            <p>After your trip has ended, we welcome your feedback to help us improve our service.</p>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>PIN Number</th>
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
            $data = file_get_contents('booking.json');
            $bookings = json_decode($data, true);
            
            foreach ($bookings as $booking) {
              echo '<tr>';
              echo '<td>' . $booking['pin'] . '</td>';
              echo '<td>' . $booking['from'] . '</td>';
              echo '<td>' . $booking['to'] . '</td>';
              echo '<td>' . $booking['date'] . '</td>';
              echo '<td>' . $booking['time'] . '</td>';
              echo '<td>' . $booking['bus_number'] . '</td>';
              echo '<td>
                      <button class="star-button me-2 btn-refund"><img width="32" height="32" src="https://img.icons8.com/flat-round/64/cancel--v3.png" alt="cancel--v3"/></button>
                      <button class="star-button" data-toggle="modal" data-target="#form">
  <img width="32" height="32" src="https://img.icons8.com/flat-round/64/star--v1.png" alt="star--v1"/>
</button>
                    </td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <div
      class="modal fade"
      id="form"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="text-right cross" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times mr-2"></i>
          </div>
          <div class="card-body text-center">
            <img
              src=" https://i.imgur.com/d2dKtI7.png"
              height="100"
              width="100"
            />
            <div class="comment-box text-center">
              <h4>Add a comment</h4>
              <div class="rating">
                <input type="radio" name="rating" value="5" id="5" /><label
                  for="5"
                  >☆</label
                >
                <input type="radio" name="rating" value="4" id="4" /><label
                  for="4"
                  >☆</label
                >
                <input type="radio" name="rating" value="3" id="3" /><label
                  for="3"
                  >☆</label
                >
                <input type="radio" name="rating" value="2" id="2" /><label
                  for="2"
                  >☆</label
                >
                <input type="radio" name="rating" value="1" id="1" /><label
                  for="1"
                  >☆</label
                >
              </div>
              <div class="comment-area">
                <textarea
                  class="form-control"
                  placeholder="what is your view?"
                  rows="4"
                ></textarea>
              </div>

              <div class="text-center mt-4">
                <button
                  class="btn btn-success send px-5"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  Send message
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal -->
     <div class="modal-container" id="myModal">
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
              <span>Are you sure you want to Cancel the Trip?</span>
            </div>
          </main>
          <footer>
            <div class="btn-container">
              <div class="cancel-wrapper">
                <button class="btn btn-cancel">Cancel</button>
              </div>
              <div class="delete-confirm-wrapper">
                <button class="btn btn-confirm">
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
</body>

</html>


