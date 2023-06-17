
  function EditDriverModal()
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
    const fields = ['Firstname', 'Lastname', 'MobileNumber', 'Email', 'Station', 'Licensedate', 'LicenseEx', 'Online', 'Action'];
    return fields.indexOf(name);
  }

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