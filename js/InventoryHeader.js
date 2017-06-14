$(document).ready(function() // when the document is ready
    {
    	$(".addi").click(function() // when has this div been pressed?
            {
            	$(".mainnav").show(); // show the orginal menu
            	$(".invnav").hide(); // hede the menu we just used
            	$("p").hide(); // for the love of god, remember to hide this
                $("Title").text("BookIT|Add Inventory"); // change the title
            	$(".holder").show(); // show the hidden div
            	$(".holder").load("ajax/Pages/Inventory/add_inventoryImage.php"); // fill the hidden div
            });
    });
$(document).ready(function() // when the document is ready
    {
        $(".UploadAgree").click(function() // when has this div been pressed?
            {
                $(".mainnav").show(); // show the orginal menu
                $(".invnav").hide(); // hede the menu we just used
                $("p").hide(); // for the love of god, remember to hide this
                $("Title").text("BookIT|Upload Agreement Form"); //change the title of the page
                $(".holder").show(); // show the hidden div
                $(".holder").load("ajax/Pages/Inventory/AgreeUploadForm.php"); // fill the hidden div
            });
    });
$(document).ready(function() // when the document is ready
    {
        $(".CurrentInventory").click(function() // when has this div been pressed?
            {
                $(".mainnav").show(); // show the orginal menu
                $(".invnav").hide(); // hede the menu we just used
                $("p").hide(); // for the love of god, remember to hide this
                $("Title").text("BookIT|Current Inventory"); // chnage the page title
                $(".holder").show(); // show the hidden div
                $(".holder").load("ajax/Pages/Inventory/current_inventory.php"); // fill the hidden div
            });
    });
$(document).ready(function() // when the document is ready
    {
        $(".CurrentAgreement").click(function() // when has this div been pressed?
            {
                $(".mainnav").show(); // show the orginal menu
                $(".invnav").hide(); // hede the menu we just used
                $("p").hide(); // for the love of god, remember to hide this
                $("Title").text("BookIT|Current Agreement"); // chnage the page title
                $(".holder").show(); // show the hidden div
                $(".holder").load("ajax/Pages/Inventory/current_agreement.php"); // fill the hidden div
            });
    });

$(document).ready(function() // when the document is ready
    {
        $(".phpechoback").click(function() // this is for the page that loads on first login
            {
                $(".phpechofront").animate({height:'0em'},"800").hide("slow");
                
                $(".phpechoback").hide(); // for now hide it when the user clicks this
            });
    });
$(document).ready(function() // when the document is ready
    {
        $(".ManageBookings").click(function() // when has this div been pressed?
            {
                $(".mainnav").show(); // show the orginal menu
                $(".invnav").hide(); // hede the menu we just used
                $("p").hide(); // for the love of god, remember to hide this
                $("Title").text("BookIT|Manage Bookings"); //change the title of the page
                $(".holder").show(); // show the hidden div
                $(".holder").load("ajax/Pages/Inventory/manage_bookings.php"); // fill the hidden div
            });
    });