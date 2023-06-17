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
});