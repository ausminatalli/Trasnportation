function ApplicationDelete() {
    let modal = $(".modal-container");
    let  btn = $(".btn-delete4");
   
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
  ApplicationDelete();
  console.log('lol')