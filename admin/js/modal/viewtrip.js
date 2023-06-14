function EditTrip()
{
  
  // Get all edit buttons
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
  inputs.forEach((input, index) => {
    input.value = rowData[index];
  });
  console.log(rowData);

  // Show the modal
  $(modal).modal('show');
}

}

function TripDelete() {
    let modal = $(".modal-container");
    let  btn = $(".btn-delete1");
   
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

  EditTrip();
  TripDelete();