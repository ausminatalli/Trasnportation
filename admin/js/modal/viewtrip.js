$(document).ready(function() {
  $(document).on('click', '.btn-edit', function() {
    var tripId = $(this).data('tripid');
    var date = $(this).closest('tr').find('td:eq(3)').text();
    var startTime = $(this).closest('tr').find('td:eq(4)').text();
    var arriveTime = $(this).closest('tr').find('td:eq(5)').text();
    var driver = $(this).closest('tr').find('td:eq(6) h6').text();

    $('#editModal').find('#date').val(date);
    $('#editModal').find('#startTime').val(startTime);
    $('#editModal').find('#arriveTime').val(arriveTime);
    $('#editModal').find('#driver').val(driver);
    $('#editModal').find('.btn-primary').attr('data-tripid', tripId);

    $('#editModal').modal('show');
  });

  $('#editModal').on('hidden.bs.modal', function() {
    // Clear the form fields when the modal is closed
    $('#editModal').find('form')[0].reset();
  });

  $('#editModal').on('click', '.btn-primary', function(e) {
    e.preventDefault();

    var tripId = $(this).data('tripid');
    var date = $('#editModal #date').val();
    var startTime = $('#editModal #startTime').val();
    var arriveTime = $('#editModal #arriveTime').val();
    var driver = $('#editModal #driver').val();

    // Perform AJAX request to save changes
    $.ajax({
      url: '../api/admin/editform/edittrip.php',
      method: 'POST',
      data: {
        tripId: tripId,
        date: date,
        startTime: startTime,
        arriveTime: arriveTime,
        driver: driver
      },
      success: function(response) {
        // Handle success
        // ...
        // Close the modal
        $('#editModal').modal('hide');
      },
      error: function(xhr, status, error) {
        // Handle error
        // ...
      }
    });
  });
});



function TripDelete() {
    let modal = $(".modal-container");
    let  btn = $(".btn-delete1");
   
    let closeBtn = $(".btn");
    
  
    
    // EventListener
    btn.on("click", function() {
    console.log('clicked')
      modal.addClass("show");
    });
    
    closeBtn.each(function() {
      $(this).on("click", function() {
        modal.removeClass("show");
      });
    });
    
    $(window).on("click", function(event) {
      if (event.target == modal[0]) {
        modal.removeClass("show");
      }
    });
    
  }

  TripDelete();
console.log('lol')