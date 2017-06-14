<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<button class="Status" value="171">172</button>
<script>
    $('.Status').click(function() {

        var val1 = $(this).val();
        alert(val1);
		var val2 = $(this).attr('class');
		alert(val2);
        $.ajax({ 
        type: 'POST', 
        url: '../ajax/Pages/bookings/confirmsql.php', 
        data: { Status: val1, LoanID: val2}, 
        success: function(response) {
            $('#result').html(response);
			
        }
        });
});
</script>
