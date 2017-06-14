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
$(document).ready(function()
{
   	$(".lego").click(function()
   		{
          $(".mainnav").show();
          $(".catnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Catalog|Lego");
          $(".holder").show();
        	$(".holder").load("ajax/Pages/items/items_lego.php"); //load this page
    	});
	});
$(document).ready(function()
{
   	$(".pi").click(function()
   		{
        	$(".mainnav").show();
          $(".catnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Catalog|Pi");
          $(".holder").show();
          $(".holder").load("ajax/Pages/items/items_pi.php"); // load this page
    	});
	});
$(document).ready(function()
{
   	$(".t4").click(function()
   		{
        	$(".mainnav").show();
          $(".catnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Catalog|Type 4");
          $(".holder").show();
          $(".holder").load("ajax/Pages/items/items_3.php"); // load this page
    	});
	});
$(document).ready(function()
{
   	$(".Books").click(function()
   		{
        	$(".mainnav").show();
          $(".catnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Catalog|Type 5");
          $(".holder").show();
          $(".holder").load("ajax/Pages/items/items_books.php"); //load this page
    	});
	});
