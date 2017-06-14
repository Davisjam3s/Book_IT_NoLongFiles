$(document).ready(function(){
    $(".item_overlay").hover(function(){
        $(this).slideUp(500);
    });
    $("body").hover(function(){
        $(".item_overlay").slideDown();
    });
});
// pay no attention to this code, as it is not used for anything 