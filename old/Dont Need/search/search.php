<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<input type="text" name="search" id="search">

<select name="search2" id="search2">
	<option value="0" selected="true" disabled="true" >Filter</option>
	<option value="1">Book</option>
	<option value="3">PI</option>
	<option value="4">All</option>
</select>
<div id="result">
	
</div>


<script>
	$('#search').keypress(function() {
		var jamjam = $(this).val(); 
		var val1 = jamjam;
		$.ajax({ 
		type: 'POST', 
        url: 'searchphp.php', 
        data: { Fullname: val1}, 
        success: function(response) {
            $('#result').html(response);
        }
        });
});
</script>
<script>
	$('#search2').change(function() {
		var jamjamjam = $(this).val(); 
		var val1 = jamjamjam;
		$.ajax({ 
		type: 'POST', 
        url: 'searchtype.php', 
        data: { Fullname: val1}, 
        success: function(response) {
            $('#result').html(response);
        }
        });
});
</script>