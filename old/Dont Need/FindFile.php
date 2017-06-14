<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
$servername = "dragon.kent.ac.uk"; //server name
$username   = "m04_bookit"; // username for server
$password   = "b*asiis"; // password for server
$dbname     = "m04_bookit"; // name of the database on the server
// Create connection
$conn       = mysqli_connect($servername, $username, $password, $dbname); // we're using sqli plz
// Check connection
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error()); // check for connection error
}
?>



<button class="buttontest"  value="30">should be 30</button>
<button class="buttontest" value="31">should be 31</button>
<div id="result">
    Blank
</div>


<script>
    $('.buttontest').click(function() {

        var jamjam = $(this).val(); 
        var val1 = jamjam;
        $.ajax({ 
        type: 'POST', 
        url: 'getfilestuff.php', 
        data: { Fullname: val1}, 
        success: function(response) {
            $('#result').html(response);
        }
        });
});
</script>



<script>
    
</script>





