$(document).ready(function() {
    
    console.log('document loaded');
    
    $("#hide__edit_buttons_box").click(function() {
//        $("#edit_buttons_box").hide(); 
    });
    
    $("#show_user_nav").click(function() {
        $("#user_nav").toggleClass("d-block");
//        console.log('got this far');
    });
    
/*    function run() {
        var box = document.getElementById("select-box");
        var selection = box.options[box.selectedIndex].text;
        console.log('Value should come');
        console.log(box);
//        console.log(selection);
    }*/
    
//    $('.grid').masonry({
//      // options...
//      itemSelector: '.grid-item',
//      columnWidth: 200
////      percentPosition: true,
////      columnWidth: '.col',
////      percentPosition: true
//    });
    
});