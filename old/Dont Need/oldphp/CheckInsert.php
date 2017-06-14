<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
if ($userType = 'ugtstudent') // this is checking what type the user is
{
  $databaseUT = 1; // set it to this
}
elseif ($userType = 'staff') 
{
  $databaseUT = 3;
}
elseif ($userType = 'pgrstudent')
{
	$databaseUT = 4;
}
elseif ($userType = 'pgtstudent')
{
	$databaseUT = 4;
} // we have 2 4's is this intennded? 

$sql = "SELECT * FROM User WHERE UserUID ='$user'"; // does this user already exist
$result = mysqli_query($conn,$sql); // get the result
if(mysqli_num_rows($result)>=1) // if it already exists
  {
    $row = mysqli_fetch_assoc($result); // if it does exist let me get the rows
    $DBUserType = $row["UserTypeUID"]; // i only want this for now
    $DBUserAgreed = $row["UserAgreed"];
    if ($DBUserType == 1) {
      $DBUserType ="Student";
    }
    if ($DBUserAgreed == 0) {
      sleep(0.5);
      //$DBUserAgreed = "Not Agreed";
      echo "<div class='menu_container_background'></div> 
      <div class='menu_container'> 
        <div class='agreement'> 
          <h1 class='agreeTitle'>User Agreement</h1>
          <div class='agreementText'> 
            <div class='agreeHolder'><h2>
  Web Site Terms and Conditions of Use
</h2>

<h3>
  As a user of the BookIT system you must agree to the following terms and conditions 
  before you may book items.
</h3>

<ol>
  <li>1. You understand that the items available to loan via this system 
  are not loaned to you by the University but by the individual that the item belongs to.   
  The items in this library are all personal belongings that have been kindly allowed for loan by individuals.  
  You agree that you will treat items with the same respect as you 
  would expect if the items were loaned by yourself.</li>


  <li>2.  Any breakages or damage to items must be paid for by you (the borrower) to the lender directly.  
  An inventory will be performed before loan and again on receipt of the returned 
  item to ensure the item is in good condition before and after the loan period.</li>


  <li>3.  You agree that we may keep track of your borrowing and lending.
  In order to assist your loans we will provide you with email confirmation of your loans.  
  It is your responsibility to return items on time and in good order, 
  we do not provide a guaranteed reminder service therefore you must make a note of return dates.</li>


  <li>4.  You must agree to any individual terms and conditions that are for specific items.  
  Failure to agree to these terms will result in you not being able to book the item.</li>


  <li>5.  Some items in this library are for use under supervision only, 
  you agree that you will adhere to all rules set by the item owner during these supervised loan  
  sessions and will not attempt to take the item out of the session.</li>


  <li>6.  If you are booking an item for use during a group project, the lead booker will be held
  responsible for the item.  This person will be expected to take responsibility for the item 
  and keep it safe when the group is not using it.  
  The lead booker will be responsible for any damages that occur during the loan period.</li>

</ol>   


<h4> By ticking the box below you are accepting the terms and conditions for use of the BookIT system.  If you do not accept the agreement you will not be permitted to book or loan anything from the BookIT library.

</h4>
      </div> 
          </div> 
          <div class='formAgree'> 
            <Form class='agreeForm'> 
              <button id='AgreeButton' class='FormItems'> I agree </button>
            </Form> 
          </div> 
        </div>
      </div>";
    }

      
  }
  else // oh no a new users
  {
    $sql = "INSERT INTO User (UserUID, UserTypeUID, UserEmail, UserAgreed, UserBanned, IsOwner) VALUES ('$user','$databaseUT','$email',0,0,0)"; // better put them into the db

if (mysqli_query($conn, $sql)) { // thats right, we will let them give us more info




    echo "<div class='phpechoback'></div>
<div class='phpechofront'>
    <h1 class='agreeTitle'>Welcome New User</h1>
    <h2>Please fill out the form below</h2>
    <form class='infoFormArea'>
        <input type='text' id='Fullname' required class='FormItems' placeholder='Fullname'>
     
        <select class='FormItems' id='Campus' required>
            <option value='' selected disabled >Campus</option>
            <option value='Canterbury'>Canterbury</option>
            <option value='Medway'>Medway</option>
        </select>
        <select class='FormItems' id='YearGroup' required>
            <option value='' selected disabled >Year Group</option>
            <option value='1'>year 1</option>
            <option value='2'>year 2</option>
            <option value='3'>year 3</option>
            <option value='4'>Post Grad</option>
        </select>
        <span id='error'></span>
        <button id='Infobutton' class='FormItems'> Submit </button>
    </form>
</div>"; // form will need editing
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); // is there an error?
}
  }
mysqli_close($conn); // close our connection
?>
<!--below is the ajax that will will work for adding a new student into the database-->
<script>
	$('#Infobutton').click(function() { //wait for the button to be pressed, this will need a name change 
    var val1 = $('#Fullname').val(); // set val1 to the value in fullname
	  var val2 = $('#Campus').val(); // set val 2 to the value in campus
	  var val3 = $('#YearGroup').val(); // set val3 to the value in yeargroup
    if (val2 == 'Medway' || val2 =='Canterbury' && val1 !== '') //check the values
    {
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        url: 'php/InsertUserInfo.php', // this is where we're posting 
        data: { Fullname: val1,Campus: val2, YearGroup: val3}, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
        }
        });
    }
     else
     {
      $('#error').html("You are Missing a Value");
     };

});
</script>
<script>
  $('#AgreeButton').click(function() { //wait for the button to be pressed, this will need a name change 
        
        var val1 = 1; 
        $.ajax({ // now the ajax
        type: 'POST', // we are posting it 
        async: false,
        cache: false,
        timeout: 1000,
        url: 'php/agreeInsert.php', // this is where we're posting 
        data: { AgreeResult: val1 }, // set the php values
        success: function(response) { // this wont work lol, it does not need to, 
            $('#result').html(response);
        }
        });


});
</script>