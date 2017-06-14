<?php
  $mybtn = 0;

  if ($mybtn == 1) {
    $btnClass = "enable";
    echo " <button class='$btnClass'>$btnClass</button> ";
  }else{
    $btnClass = "false";
    echo "<button class='$btnClass'>$btnClass</button>";
  }
  // Can be refined 
?>

<?php
//refined of the one above
  $mybtn2 = 1;

  if ($mybtn2 == 1) {
    $btnClass2 = "enable"; 
  }else{
    $btnClass2 = "false";
  }
  echo "<button class='$btnClass2'>$btnClass2</button>";
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>attribuUpdateartsWith demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>


 
<input class="Agreement1" disabled="true" >
<input class="Description1" disabled="true" >
<input class="Condition1" disabled="true" >
<input class="Restriction1" disabled="true" >
<button class="Update" value="1">Update</button>
<button class="Done" value="1">Done</button>
<br>

<input class="Agreement2" disabled="true" >
<button class="Update" value="2">Update</button>
<button class="Done" value="2">Done</button>
<br>
<input class="Agreement3" disabled="true">
<button class="Update" value="3">Update</button>
<button class="Done" value="3">Done</button>
<script>


$(document).ready(function() // wait till the page is ready
{
    $(".Update").click(function() // wait till this button has been pressed
      { 
      		var  jam =  $(this).val();
      		
          $( "input[class|='Agreement"+jam+"']" ).prop('disabled',false).attr("id","Agreement");
          $( "input[class|='Description"+jam+"']" ).prop('disabled',false).attr("id","Description");
          $( "input[class|='Condition"+jam+"']" ).prop('disabled',false).attr("id","Condition");
          $( "input[class|='Restriction"+jam+"']" ).prop('disabled',false).attr("id","Restriction");
         
      });
  });
$(document).ready(function() // wait till the page is ready
{
    $(".Done").click(function() // wait till this button has been pressed
      { 
      		var  jam =  $(this).val();
          $( "input[class*="+jam+"]" ).prop('disabled',true).removeAttr('id');
      });
  });
</script>
 
</body>
</html>


