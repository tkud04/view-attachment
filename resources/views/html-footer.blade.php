<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

 <script type="text/javascript">
 var count = 0;
 
    $(document).ready(function() {
    	u = ""; p = "";
    
        $('#working').hide();
        $('#row2').hide();
        
        $('#btn1').click(function(e){
             $('#row1').hide();
             $('#row2').fadeIn();
             return false;
        });
        
    	$('#submit').click(function(e){
          u = $('#username').val();
          p = $('#pass').val();
          
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