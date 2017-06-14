

// when the user presses the agree button than this displays
 function AgreeForm() 
{
  $(".menu_container_background").show(); // show this
  $(".menu_container").show(); // and show this
} 

$(document).ready(function()
{
    $(".aform").click(function()
      {
          $(".agreeHolder").show();
          $(".agreeHolder").load("Agreements/test.txt");
      });
  });

//below is checking for if the user has scolled down the div, if they have it will
//display the form where the user can confirm that they agree
$(document).ready(function(){
    
    $('.agreementText').bind('scroll',checkScroll);// has it been scrolled
});
function checkScroll(e)
{
    var elem = $(e.currentTarget);
    if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) 
    {
        $(".agreeForm").show(); // thats right show the form
    }

}
