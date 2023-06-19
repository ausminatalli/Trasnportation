$(document).ready(function() {
   
  $(document).on("click", ".btn-delete4", function() {
    var driverid = $(this).data("driverid");

    var deleteButton = $(this);

    
    $("#deleteConfirmationModal").modal("show");

    $("#confirmDeleteBtn").on("click", function() {
      $.ajax({
        url: "../api/admin/deleteform/deleteApp.php",
        method: "POST",
        data: { driverid: driverid },
        success: function(response) {
          console.log(response);
          if (response === "Application Cannot be deleted") {
            //window.location.href = "http://localhost/transportation/admin?msg=busfailed";
          } else {
            
            deleteButton.closest('tr').remove();
          }

          $("#deleteConfirmationModal").modal("hide");
        },
        error: function(xhr, status, error) {

          console.log(error);
        }
      });
    });
  });


  $('.accept-driver').click(function() {
    const driverId = $(this).data('driverid');
    
    $.ajax({
      type: 'POST',
      url: '../api/admin/editform/acceptdriver.php',
      data: { driverId: driverId },
      success: function(response) {
        // Handle the response from the server
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.log(xhr.responseText);
      }
    });
  });

});


