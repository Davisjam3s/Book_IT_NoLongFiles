<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <div class='phpechoback'></div>
            <div class='phpechofront'>
                <h1 class='agreeTitle'>Welcome New User</h1>
                <h2>Please fill out the form below</h2>
                <form class='infoFormArea'>
                    <input type='text' id='Fullname' required class='FormItems' placeholder='Fullname'>
     
                <button id='Infobutton' class='FormItems'> Submit </button>
                </form>
            </div>



<script>
    $('#Infobutton').click(function() { //wait for the button to be pressed, this will need a name change 
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
    
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'addItem.php', // this is where we're posting 
        data: { Fullname: val1}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
        }
        });
});
</script>