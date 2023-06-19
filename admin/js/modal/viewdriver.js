function EditDriverModal() {
  $(document).ready(function() {
    $(document).on('click', '.btn-edit', function() {
      const Licensedate = $(this).closest('tr').find('td:eq(6)').text();
      const  driverid = $(this).data('driverid');
      $('#editModal').find('#Licensedate').val(Licensedate);
      $('#editModal').find('.btn-primary').attr('data-driverid', driverid);
      $('#editModal').modal('show');
    });

    $('#editModal').on('hidden.bs.modal', function() {
      // Clear the form fields when the modal is closed
      $('#editForm')[0].reset();
    });

    $('#editModal').on('click', '.btn-primary', function(e) {
      
      e.preventDefault();
      
      
      const  driverid = $(this).data('driverid');
      const Licensedate = $('#editModal #Licensedate').val();
    
      $('#editModal').modal('hide');

      // Perform AJAX request to save changes
      $.ajax({
        url: '../api/admin/editform/editdriver.php',
        method: 'POST',
        data: {
          driverid: driverid,
          Licensedate: Licensedate,
        },
        success: function(response) {
          $('#editModal').modal('hide');
          location.reload();
        },
        error: function(xhr, status, error) {
          console.log("error =>", error);
          // Handle error
        }
      });
    });
  });
}



EditDriverModal();




$(document).ready(function() {
   
  $(document).on("click", ".btn-delete", function() {
    var driverid = $(this).data("driverid");

    
    var deleteButton = $(this);

    
    $("#deleteConfirmationModal").modal("show");

    $("#confirmDeleteBtn").on("click", function() {
      $.ajax({
        url: "../api/admin/deleteform/deletedriver.php",
        method: "POST",
        data: { driverid: driverid },
        success: function(response) {
          console.log(response);
          if (response === "Driver Cannot be deleted") {
            //window.location.href = "http://localhost/transportation/admin?msg=driverfailed";
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