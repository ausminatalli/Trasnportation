function Edittrip(){
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
    $('#editModal').modal('hide');
     //Perform AJAX request to save changes
    $.ajax({
      url: '../api/admin/editform/edittrip.php',
      method: 'POST',
      data: {
        tripId: tripId,
        date: date,
        startTime: startTime,
        arriveTime: arriveTime,
      },
      success: function(response) {
        
        $('#editModal').modal('hide');
        location.reload();
      },
      error: function(xhr, status, error) {
        console.log("error=>",error)
        // ...
      }
    });
  });
});

}


/*function deleteTrip() {
  let modal = $(".modal-container");
  let btn = $(".btn-delete1");
  let confirmBtn = $(".btn-confirm");
  let tripId = btn.data("tripid"); // Get the tripid from the button's data attribute

  let closeBtn = $(".btn");

  // EventListener
  btn.on("click", function() {
    modal.addClass("show");
  });

  confirmBtn.on("click", function() {
    // Send AJAX request
    $.ajax({
      url: "../api/admin/deleteform/deletetrip.php",
      method: "POST",
      data: { tripid: tripId },
      success: function(response) {
        // Handle the response from the server
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle the error
        console.log(error);
      }
    });

    modal.removeClass("show");
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

  */
  





  Edittrip();
 
  $(document).ready(function() {
   
    $(document).on("click", ".btn-delete1", function() {
      var tripId = $(this).data("tripid");
  
      
      var deleteButton = $(this);
  
      
      $("#deleteConfirmationModal").modal("show");
  
      $("#confirmDeleteBtn").on("click", function() {
        $.ajax({
          url: "../api/admin/deleteform/deletetrip.php",
          method: "POST",
          data: { tripid: tripId },
          success: function(response) {
            console.log(response);
            if (response === "Trip Cannot be deleted") {
              window.location.href = "http://localhost/transportation/admin?msg=tripfailed";
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
  
  