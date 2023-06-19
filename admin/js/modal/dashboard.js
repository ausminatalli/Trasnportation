$(document).ready(function() {
   
    $(document).on("click", ".btn-blockuser", function() {
      var userid = $(this).data("userid");
  
      
      var deleteButton = $(this);
  
      
      $("#deleteConfirmationModal").modal("show");
  
      $("#confirmDeleteBtn").on("click", function() {
        $.ajax({
          url: "../api/admin/deleteform/blockuser.php",
          method: "POST",
          data: { userid: userid },
          success: function(response) {
            
            if (response === "User Cannot be deleted") {
              //window.location.href = "http://localhost/transportation/admin?msg=blockfailed";
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

    $(document).on("click", ".btn-unblock", function() {
      var userid = $(this).data("userid");
  
      console.log('clicked')
      var deleteButton = $(this);
  
      
      $("#unblockConfirmationModal").modal("show");
  
      $("#confirmunblockBtn").on("click", function() {
        $.ajax({
          url: "../api/admin/deleteform/unblockuser.php",
          method: "POST",
          data: { userid: userid },
          success: function(response) {
            console.log(response);
            if (response === "User Cannot be deleted") {
              //window.location.href = "http://localhost/transportation/admin?msg=blockfailed";
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




