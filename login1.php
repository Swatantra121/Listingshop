<html>
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">


  	span#pincode_input1 , span#pincode_input2 , span#pincode_input3
{
	padding: 0px 0px 6px 25px;
    margin-right: 10px;
    position: relative;
    border-bottom: #ddd solid 1px;
}

span#pincode_input1 input[type="text"]  , span#pincode_input1 input[type="email"] , span#pincode_input2 input[type="password"] , span#pincode_input3 input[type="number"]
{
outline: none;
}

#pincode_input1:before
{
        content: '';
    width: 16px;
    height: 18px;
    background: url(img/mail.png) no-repeat;
    position: absolute;
    left: 0;
    top: 0;
}

#pincode_input2:before
{
        content: '';
    width: 16px;
    height: 18px;
    background: url(img/pass.png) no-repeat;
    position: absolute;
    left: 0;
    top: 0;
}

#pincode_input3:before
{
        content: '';
    width: 16px;
    height: 18px;
    background: url(img/phone.png) no-repeat;
    position: absolute;
    left: 0;
    top: 0;
}
.ul li{
       list-style: circle;
           padding-bottom: 5px;
       
}

.ul
{
	 float: left;
    text-align: justify;   
    padding-bottom: 32px;
}

#nav_ul>li>a:focus, #nav_ul>li>a:hover {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0) !important;
    outline: none; 
}
 #nav_ul>li>a{
    padding: 10px 10px !important;
}

 #nav_ul>li>a:focus
{
    font-weight: 600;
}

.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: rgba(51, 122, 183, 0) !important;
}


#mynv li a.text::after
{
	content: '';
    display: inline-block;
    position: absolute;
    height: 1px;
    background: #9E9E9E !important;   
left: 0px;
right:  0px;     
    top: 85%;
     -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(-65deg);
}

#or::after 
{
        content: '';
    display: inline-block;
    position: relative;
    height: 1px;
    background: #dddddd !important;
    width: 30%;
    top: -5px;
    left: 9px;

}


#or::before
{
          content: '';
    display: inline-block;
    position: relative;
    height: 1px;
    background: #dddddd !important;
    width: 30%;
    top: -5px;
    right: 9px;


}

.btn_login
{
	    border: none;
    outline: none;
    background-color: #d1c289;
    font-size: 14px;
    font-weight: 400;
    text-align: center;
    width: 84px;
    padding: 5px 15px;
}


@media (min-width: 992px)
.col-md-12 {
    width: 100%;
}
  </style>

<script type="text/javascript">
function checkemail()
{
 var email=document.getElementById("email_verify").value;
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'ajax/checkdata.php',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="Available") 
   {   
    var elem=document.getElementById("email_status"); 
    elem.style.color = "green"; 
    return true;
   }
     else
   {
    var elem1=document.getElementById("email_status"); 
    elem1.style.color = "red";
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function checkmobile()
{
 var mobile=document.getElementById("mobile_verify").value;
  
 if(mobile)
 {
  $.ajax({
  type: 'post',
  url: 'ajax/checkdata.php',
  data: {
   user_mobile:mobile,
  },
  success: function (response) {
   $( '#mobile_status' ).html(response);
   if(response=="Available") 
   {
    var elem=document.getElementById("mobile_status"); 
    elem.style.color = "green";
    return true;  
   }
    else
   {
    var elem1=document.getElementById("mobile_status"); 
    elem1.style.color = "red";
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#mobile_status' ).html("");
  return false;
 }
}

function checkall()
{
   var mobilehtml=document.getElementById("mobile_status").innerHTML;
 var emailhtml=document.getElementById("email_status").innerHTML;

 if((mobilehtml && emailhtml)=="Available")
 {
  return true;
 }
 else
 {
  return false;
 }
}
</script>

</head>
<body>

<div class="container" style="margin-top: 20px;padding: 0px;">
  <div class="row">
      <div class="col-md-12"  style="width: 55%;margin-left: 300px;">

        <div class="row" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);">

          <div class="col-md-6" style="width: 40%;background: url('brick.jpg'); border-radius: 4px 0px 0px 4px;
background-repeat: round;text-align: center;color: white ">
          <div style="padding: 60px;padding-bottom: 117px;">
          <span><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 59px;color: white"></i></span>
          <h4>WELCOME</h4>
              <p style="font-size: 12px;">LOGIN / SIGNUP</p>
             </div>
                 <ul class="ul">
    <li class="">First item</li>
    <li class="">Second item</li>
    <li class="">Third item</li>
  </ul>
          </div>

  		 <div class="col-md-6" id="mynv" style="width: 60%;background: white;
    height: 410px;border-radius: 0px 4px 4px 0px;"> 

  		 <div class="row">
  		 <ul class="nav nav-pills" id="nav_ul" style="padding: 27px 0 0 0;margin-left: 20px;position: relative;top: 3px;">
    <li><a data-toggle="pill" href="#home"   style="color: #9E9E9E;">LOGIN</a></li>
    <li><a class="text" ></a></li>
    <li><a data-toggle="pill" href="#menu1" style="color: #9E9E9E;">SIGNUP</a></li>
  </ul>

   <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <form style="padding: 50px;padding-bottom: 25px;padding-top: 25px" method="post">
      	   <span id="pincode_input1"><input type="email" name="lname" placeholder="Your Email"  style="border: 0px;    margin-bottom: 30px;width: 95%;    color: black;" required="required"  ></span><br>
     <span id="pincode_input2"><input type="password" name="lpass" placeholder="Your Password" style="border: 0px;margin-bottom: 30px;width: 95%;    color: black;" required="required"></span>
     <span><input type="submit" name="login" value="LOGIN" class="btn_login" style="color: #6b6464;"></span>
            
      </form>

<div style="text-align: -webkit-center;"> <span style="color: #9E9E9E;font-size: 15px;/* text-align: -webkit-center; */margin-left: 15px;" id="or">or</span>
<span><img src="fb.png" alt="facebook" style="width: 45%;margin-top: 7px;"></span>
<span><img src="fb.png" alt="google" style="width: 45%;margin-top: 7px;"></span></div>
       
  
 
    </div>

    <div id="menu1" class="tab-pane fade">
     <?php 
    if(isset($error_email))
      echo $error_email; ?>
         <form style="padding: 50px;padding-top: 25px;padding-bottom: 25px;" method="post" onsubmit="return checkall();">
   
     <span id="pincode_input1"><input type="email" name="email" placeholder="Your Email" style="border: 0px;margin-bottom: 25px;width: 95%; color: black;" required="required" id="email_verify" onkeyup="checkemail();"></span>
      <span id="email_status" style="color:red;position: relative;bottom: 12px;font-size: 12px"></span><br>
      	   <span id="pincode_input3"><input type="number" name="mobile" placeholder="Your Number" style="border: 0px;    margin-bottom: 25px;width: 95%; color: black;" id="mobile_verify" required="required" onkeyup="checkmobile();"></span>
                 <span id="mobile_status"  style="color: red;position: relative;bottom: 12px;font-size: 12px"></span><br>
     <span id="pincode_input2"><input type="password" name="password" placeholder="Create Password" style="border: 0px;margin-bottom: 30px;width: 95%; color: black;" required="required"></span>
     <span><input type="submit" name="register" value="Sign up" class="btn_login" style="color: #6b6464;"></span>

    
      </form>
   <div style="text-align: -webkit-center;"> <span style="color: #9E9E9E;font-size: 15px;/* text-align: -webkit-center; */margin-left: 5px;" id="or">or</span>
<span><img src="fb.png" alt="facebook" style="width: 45%;margin-top: 7px;"></span>
<span><img src="fb.png" alt="google" style="width: 45%;margin-top: 7px;"></span></div>
    </div>
    </div>
  		 </div>

  		  
          </div>

      </div>

      </div>
  </div>
  </div>

</body>
</html>