$(document).ready(function() {
    
    console.log('document loaded');
    
    $("#hide__edit_buttons_box").click(function() {
       $("#edit_buttons_box").hide(); 
    });
    
    $('.grid').masonry({
      // options...
      itemSelector: '.grid-item',
      columnWidth: 200
    });
    
});