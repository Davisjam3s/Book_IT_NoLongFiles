<?php
sleep(0.5);
echo "<div class='phpechoback'></div>
<div class='phpechofront'>
    <h1 class='agreeTitle'>Welcome New User</h1>
    <h2>Please fill out the form below</h2>
    <form class='infoFormArea'>
        <input type='text' id='Fullname' required class='FormItems' placeholder='Fullname'>
     
        <select class='FormItems' id='Campus' required>
            <option value='' selected disabled >Campus</option>
            <option value='1'>Canterbury</option>
            <option value='2'>Medway</option>
        </select>
        <select class='FormItems' id='YearGroup' required>
            <option value='' selected disabled >Year Group</option>
            <option value='1'>year 1</option>
            <option value='2'>year 2</option>
            <option value='3'>year 3</option>
            <option value='4'>Post Grad</option>
        </select>
        <span id='error'></span>
        <button class='FormItems submit'> Submit </button>
    </form>
</div>"; 

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $('.submit').click(function() { //wait for the button to be pressed, this will need a name change 
        
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
      var val2 = $('#Campus').val(); // set val 2 to the value in campus
      var val3 = $('#YearGroup').val(); // set val3 to the value in yeargroup
    if (val2 == '1' || val2 =='2' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'php/InsertUserInfo.php', // this is where we're posting 
        data: { Fullname: val1,Campus: val2, YearGroup: val3}, // set the php values
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