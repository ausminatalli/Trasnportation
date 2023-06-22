$(document).ready(function() {
  $(document).on('click', '.btn-editdriver', function() {
    const licensedate = $(this).closest('tr').find('td:eq(6)').text();
    const driverid = $(this).data('driverid');

    $('#editModaldriver').find('#Licensedate').val(licensedate);
    $('#editModaldriver').find('.savedriver').data('driverid', driverid);

    $('#editModaldriver').modal('show');
  });

  $(document).on('click', '#editModaldriver .savedriver', function(e) {
    e.preventDefault();

    const driverid = $(this).data('driverid');
    const licensedate = $('#editModaldriver #Licensedate').val();

    $('#editModaldriver').modal('hide');

    $.ajax({
      url: '../api/admin/editform/editdriver.php',
      method: 'POST',
      data: {
        driverid: driverid,
        licensedate: licensedate
      },
      success: function(response) {
        const $tableRow = $('tr[data-driverid="' + driverid + '"]');
        $tableRow.find('td:eq(6)').text(licensedate);
      },
      error: function(xhr, status, error) {
        console.log('error=>', error);
      }
    });
  });

  $('#editModaldriver').on('hidden.bs.modal', function() {
    $('#editModaldriver').find('form')[0].reset();
    $('#editModaldriver').find('.savedriver').off('click');
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

