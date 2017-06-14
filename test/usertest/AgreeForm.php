<?php
sleep(0.5);
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
          
              <button id='AgreeButton' class='FormItemsFirsLogin'> I agree </button>

        </div>
      </div>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
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
            $('.menu_container_background').hide("slow");
            $('.menu_container').hide("slow");
        }
        });


});
</script>