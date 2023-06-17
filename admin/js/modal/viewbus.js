function EditBusModal()
{
  
  const editButtons = document.querySelectorAll('.btn-edit');

  // Add event listener to each edit button
  editButtons.forEach((button) => {
    button.addEventListener('click', openEditModal);
  });

  // Function to handle the edit button click event
  function openEditModal(event) {
    // Get the current row data
    const row = event.target.closest('tr');
    const cells = row.querySelectorAll('td');
    const rowData = Array.from(cells).map((cell) => cell.textContent.trim());

    // Set the modal input values with the row data
    const modal = document.querySelector('#editModal');
    const form = modal.querySelector('form');
    const inputs = form.querySelectorAll('input, select'); // Include both inputs and selects

    inputs.forEach((input) => {
      const name = input.getAttribute('name');
      const value = rowData[getFieldIndex(name)];
      input.value = value;
    });
    // Show the modal
    $(modal).modal('show');
  }
  // Function to get the index of the field name in rowData array
  function getFieldIndex(name) {
    const fields = ['Bus ID', 'Driver name', 'capacity', 'Station', 'Mechanicdue Date', 'Insurance number', 'Accidents number','Action'];
    return fields.indexOf(name);
  }

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
  
  