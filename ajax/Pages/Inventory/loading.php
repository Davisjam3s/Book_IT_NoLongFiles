
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Uploading</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>

  .ui-progressbar {
    position: relative;
  }
  .progress-label {
    position: absolute;
    left: 0%;
    top: 7px;
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );
      progressDone = $( ".back" );
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete! " );
        progressDone.show();
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 5 );
 
      if ( val < 99 ) {
        setTimeout( progress, 80 );
      }
    }
 
    setTimeout( progress, 500 );
	//send user back to home page
	$(location).delay(300).attr('href','../../../index.php');
  } );
  </script>
</head>
<body>
 
<div id="progressbar"><div class="progress-label">Uploading</div></div>

 <!--<div class="back" style="display: none"><a href="../../../index.php">Click here to return</a></div>-->
 
</body>
</html>
