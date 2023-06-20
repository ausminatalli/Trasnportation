$(document).ready(function() {
  $(document).on("click", ".btn-blockuser", function() {
    var userId = $(this).data("userid");
    var blockButton = $(this);
    var icon = blockButton.find("i");
    var isBlocked = icon.hasClass("fa-lock");
    var confirmationModal = $("#unblockConfirmationModal");
    var confirmationTitle = confirmationModal.find(".modal-title");
    var confirmationText = confirmationModal.find(".modal-body p");

    confirmationTitle.text("Confirmation - Unblock User");
    confirmationText.text("Are you sure you want to unblock this user?");

    confirmationModal.modal("show");

    $("#confirmunblockBtn").on("click", function() {
      // Make an AJAX request to block the user
      $.ajax({
        url: "../api/admin/deleteform/unblockuser.php",
        method: "POST",
        data: { userid: userId },
        success: function(response) {
          console.log(response);
          if (response === "User Cannot be deleted") {
            // Handle error condition if needed
          } else {
            blockButton.html('<i class="fa-solid fa-unlock"></i>');
          }
          confirmationModal.modal("hide");
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });

  $(document).on("click", ".btn-unblock", function() {
    var userId = $(this).data("userid");
    var unblockButton = $(this);
    var icon = unblockButton.find("i");
    var isUnblocked = icon.hasClass("fa-unlock");
    var confirmationModal = $("#deleteConfirmationModal");
    var confirmationTitle = confirmationModal.find(".modal-title");
    var confirmationText = confirmationModal.find(".modal-body p");

    confirmationTitle.text("Confirmation - Block User");
    confirmationText.text("Are you sure you want to Block this user?");

    confirmationModal.modal("show");

    $("#confirmDeleteBtn").on("click", function() {
      // Make an AJAX request to unblock the user
      $.ajax({
        url: "../api/admin/deleteform/blockuser.php",
        method: "POST",
        data: { userid: userId },
        success: function(response) {
          console.log(response);
          if (response === "User Cannot be deleted") {
            // Handle error condition if needed
          } else {
            unblockButton.html('<i class="fa-solid fa-lock"></i>');
          }
          confirmationModal.modal("hide");
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
});
