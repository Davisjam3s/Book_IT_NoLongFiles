$(document).ready(function()
{
   	$(".currentBookings").click(function()
   		{
          $(".mainnav").show();
          $(".booknav").hide();
          $("p").hide();
          $("Title").text("BookIT|Bookings|Current Bookings");
          $(".holder").show();
        	$(".holder").load("ajax/Pages/bookings/currentBookings.php"); //load this page
    	});
	});
$(document).ready(function()
{
    $(".pastBookings").click(function()
      {
          $(".mainnav").show();
          $(".booknav").hide();
          $("p").hide();
          $("Title").text("BookIT|Bookings|Past Bookings");
          $(".holder").show();
          $(".holder").load("ajax/Pages/bookings/PastBookings.php"); // load this page
      });
  });