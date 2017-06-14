<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div id="holder">a</div>
<script>
$(document).ready(function (e) {

   setInterval ( RunUpdate, 3000 ); // Run once every 3 seconds

});

function RunUpdate() {
   $("#holder").load('new.php');
}
</script>