$(document).ready(function() {
 
  $(document).on('click', '.btn-editdriver', function() {
    const Licensedate = $(this).closest('tr').find('td:eq(6)').text();
    const driverid = $(this).data('driverid');
    $('#editModaldriver').find('#Licensedate').val(Licensedate);
    $('#editModaldriver').find('.savedriver').attr('data-driverid', driverid);
    $('#editModaldriver').modal('show');
  });

  
  $('#editModaldriver').on('click', '.savedriver', function(e) {
    e.preventDefault();
    
    const driverid = $(this).data('driverid');
    const Licensedate = $('#editModaldriver #Licensedate').val();
  
    $('#editModaldriver').modal('hide');

    $.ajax({
      url: '../api/admin/editform/editdriver.php',
      method: 'POST',
      data: {
        driverid: driverid,
        Licensedate: Licensedate,
      },
      success: function(response) {
        const $tableRow = $('tr[data-driverid="' + driverid + '"]');
        $tableRow.find('td:eq(6)').text(Licensedate);
      },
      error: function(xhr, status, error) {
        console.log('error =>', error);
        // Handle error
      }
    });
  });

  $('#editModaldriver').on('hidden.bs.modal', function() {
    $('#editForm')[0].reset();
  });

  
  $(document).on('click', '.btn-delete', function() {
    const driverid = $(this).data('driverid');
    const deleteButton = $(this);

    $('#deleteConfirmationModal').modal('show');

    $('#confirmDeleteBtn').on('click', function() {
      $.ajax({
        url: '../api/admin/deleteform/deletedriver.php',
        method: 'POST',
        data: { driverid: driverid },
        success: function(response) {
          console.log(response);
          if (response === 'Driver Cannot be deleted') {
            //window.location.href = "http://localhost/transportation/admin?msg=driverfailed";
          } else {
            deleteButton.closest('tr').remove();
          }

          $('#deleteConfirmationModal').modal('hide');
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
});

