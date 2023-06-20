function EditBusModal() {
  $(document).ready(function() {
    $(document).on('click', '.btn-edit', function() {
      const busId = $(this).data('busid');
      const driverId = $(this).closest('tr').find('td:eq(1)').data('driverid');
      const driverName = $(this).closest('tr').find('td:eq(1)').text().trim();

      const mechanicDueDate = $(this).closest('tr').find('td:eq(4)').text();
      const insuranceNumber = $(this).closest('tr').find('td:eq(5)').text();

      $('#editModal').find('#Drivername').val(driverId);
      $('#editModal').find('#Mechanicdue').val(mechanicDueDate);
      $('#editModal').find('#Insurance').val(insuranceNumber);
      $('#editModal').find('.btn-primary').data('busid', busId);

      $('#editModal').modal('show');
    });

    $('#editModal').on('hidden.bs.modal', function() {
      // Clear the form fields when the modal is closed
      $('#editForm')[0].reset();
    });

    $('#editModal').on('click', '.btn-primary', function(e) {
      e.preventDefault();

      const busId = $(this).data('busid');
      const driverName = $('#editModal #Drivername').val();
      const mechanicDueDate = $('#editModal #Mechanicdue').val();
      const insuranceNumber = $('#editModal #Insurance').val();
      $('#editModal').modal('hide');

      // Perform AJAX request to save changes
      $.ajax({
        url: '../api/admin/editform/editbus.php',
        method: 'POST',
        data: {
          busId: busId,
          driverName: driverName,
          mechanicDueDate: mechanicDueDate,
          insuranceNumber: insuranceNumber,
        },
        success: function(response) {
          $('#editModal').modal('hide');
          //location.reload();
        },
        error: function(xhr, status, error) {
          console.log("error =>", error);
          // Handle error
        }
      });
    });
  });
}






  
  EditBusModal();
 
  $(document).ready(function() {
   
    $(document).on("click", ".btn-delete2", function() {
      var busid = $(this).data("busid");
  
      
      var deleteButton = $(this);
  
      
      $("#deleteConfirmationModal").modal("show");
  
      $("#confirmDeleteBtn").on("click", function() {
        $.ajax({
          url: "../api/admin/deleteform/deleteBus.php",
          method: "POST",
          data: { busid: busid },
          success: function(response) {
            console.log(response);
            if (response === "Bus Cannot be deleted") {
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
  
  