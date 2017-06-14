<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/InfoFrom.css"/>



<div class='phpechoback'></div>
<div class='phpechofront'>
    <h1 class='agreeTitle'>Welcome New User</h1>
    <h2>Please fill out the form below</h2>
    <form class='infoFormArea'>
		<input type='text' id='Fullname' class='FormItems' placeholder='Fullname'>
		<button id='button' class='FormItems'> Submit </button>
    </form>
</div>
<script>
	$('#button').click(function() {
    var val1 = $('#Fullname').val();
    $.ajax({
        type: 'POST',
        url: 'process2.php',
        data: { Fullname: val1},
        success: function(response) {
            $('#result').html(response);
        }
    });
});
</script>