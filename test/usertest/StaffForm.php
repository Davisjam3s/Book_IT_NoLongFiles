<?php
sleep(0.5);
echo "<div class='phpechoback'></div>
<div class='phpechofront'>
    <h1 class='agreeTitle'>Welcome New staff</h1>
    <h2>Please fill out the form below</h2>
    <form class='infoFormArea'>
        <input type='text' id='Fullname' required class='FormItems' placeholder='Fullname'>
        <select class='FormItems' id='Campus' required>
            <option value='' selected disabled >Campus</option>
            <option value='1'>Canterbury</option>
            <option value='2'>Medway</option>
        </select>
        <span id='error'></span>
        <button id='Infobutton' class='FormItems'> Submit </button>
    </form>
</div>"; 

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$('#Infobutton').click(function() { //wait for the button to be pressed, this will need a name change 
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
	var val2 = $('#Campus').val(); // set val 2 to the value in campus
	var val3 = '4';
    if (val2 == '2' || val2 =='1' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'php/InsertUserInfo.php', // this is where we're posting 
        data: { Fullname: val1,Campus: val2, YearGroup: val3 }, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
            $(".submit").attr("disabled", true);
            $(".submit").html('Please Wait');
        }
        });
    }
     else
     {
      $('#error').html("You are Missing a Value");
     };

});
</script>