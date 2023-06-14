function DriverDelete() {
    let modal = $(".modal-container");
    let  btn = $(".btn-delete");
   
    let closeBtn = $(".btn");
    
    // EventListener
    btn.on("click", function() {
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


DriverDelete();
EditDriverModal();