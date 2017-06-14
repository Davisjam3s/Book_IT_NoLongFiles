// this code uses jquery, and it changes the size of the header, when the page has scrolled
$(document).on("scroll", function() //wait for the user to scroll
{

	if($(document).scrollTop()>1) //when the scroll bar has moved 1px from the top
	{
		$("header").removeClass("large").addClass("small"); // change the class name of header
	} 
	else 
	{
		$("header").removeClass("small").addClass("large"); // change the class name of the header
	}
	});

function HomeClick() // i made this and i dont acctually need it, if you read the code you will know why
{
	$("Title").text("BookIT"); // lol what
}

$(document).ready(function()
{
   	$(".all").click(function()
   		{
        	$(".mainnav").show();
          $(".catnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Catalog|All Items");
          $(".holder").show();
          $(".holder").load("ajax/Pages/items/all_items.php"); // load this page
    	});
	});
function BookingNav() // for showing the booking navagation
{
	$(".mainnav").hide();
	$(".booknav").show();
	$(".invnav").hide();
	$(".catnav").hide();
	$(".adminnav").hide();
}
function InventoryNav() // for showing the inventory navagation menu
{
	$(".mainnav").hide();
	$(".booknav").hide();
	$(".invnav").show();
	$(".catnav").hide();
	$(".adminnav").hide();
}
function AdminNav() // show the admin navagation 
{
	$(".mainnav").hide();
	$(".booknav").hide();
	$(".invnav").hide();
	$(".catnav").hide();
	$(".adminnav").show();
}
$(document).ready(function() // make the back button work
{
    $(".back").click(function() // the back button
      {
          $(".mainnav").show(); // show the main navagation and hide the others
          $(".catnav").hide();
          $(".booknav").hide();
          $(".invnav").hide();
          $(".adminnav").hide();
      });
  });
// above is just to change the menu back to the orginal