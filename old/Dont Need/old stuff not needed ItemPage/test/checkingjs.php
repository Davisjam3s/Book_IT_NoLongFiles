<script>
//this runs each time the selected date is changed and calls checkdate.php (just in case you wondered where it came from! ;) Marie)  
  $('#advanced').change(function() {   
    //sends the values from the date selector and the book button (the AssetUID) as variables to checkdate.php
	var date = $(this).val(); 
    var val1 = date;
	var val2 = $('.BookBook').val();
	$.ajax({ 
    type: 'POST', 
        url: 'ItemPage/CheckDate.php', 
        data: { date: val1, asset:val2}, 
		
        success: function(data)
		{
		$( "#inputId" ).val(data);
		var myValnew = 	$('#inputId').val(); 
		if (myValnew == 1)
		{
			$(".BookBook").attr("disabled", true).css("background-color", "grey").text("Not available");
		}
		else
		{
			$(".BookBook").attr("disabled", false).css("background-color", "#05345C").text("Available");
		}

			
		}
        
		
			});
});

</script>