<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<button class="Infobutton2">Test</button>
<div id="result"></div>
<div id="result2"></div>

<script>

    $('.Infobutton2').click(function() { //wait for the button to be pressed, this will need a name change 
        alert("ok");
        var val1 = $('#ItemName').val();
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'ok.php', // this is where we're posting 
        data: {AssetUID: val1}, // set the php values
        success: function(response) {$('#result').html(response);} 
        });
});
</script>