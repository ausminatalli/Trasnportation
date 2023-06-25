
  $(document).ready(function() {

    $(document).on('click', '.fa-circle-xmark', function() {
      //const busid = $(this).data('busid');
      
      //const deleteButton = $(this);
    
      $('#refundUser').modal('show');
    
      //$('#confirmDeleteBus').data('busid', busid);
     // $('#confirmDeleteBus').data('deleteButton', deleteButton);
      
    });

  $(document).on('click', '#confirmDeleteBus', function() {
   // const busid = $(this).data('busid');
   // const deleteButton = $(this).data('deleteButton');
  
   // $.ajax({
    //  url: '../api/admin/deleteform/deleteBus.php',
    //  method: 'POST',
    //  data: { busid: busid },
    //  success: function(response) {
     //   if (response === 'Bus Cannot be deleted') {
          //window.location.href = "http://localhost/transportation/admin?msg=busfailed";
       //   alert(response);
       // } else if(response === 'Bus deleted successfully.'){
       //   deleteButton.closest('tr').remove();
       // }
  
        $('#refundUser').modal('hide');
     // },
     // error: function(xhr, status, error) {
     //   console.log(error);
     // }
   // });
  });
});