<?php

  //connect to mysql database
include_once 'database/dbconnect.php';
require_once 'database/dbconfig.php';

//Session Start
session_start();
$reg=new USER($DBcon);


//Check Login
if($reg->is_loggedin())
{
$reg->redirect('homepage/homepage.php');
}

//Select Category
$sql = "select category from category";
$result = mysqli_query($con, $sql) or die("Error " . mysqli_error($con));

//Select Area Name
$area_drop = "select area_name from area";
$result_area = mysqli_query($con, $area_drop) or die("Error " . mysqli_error($con));

$location="Share location";

//Get Area Name
if(isset($_POST['get_area']))
{
$location=$_POST['give_area'];
$_SESSION['location']=$location;
}

//Get Location
if(isset($_SESSION['location']))
{
$location= $_SESSION['location'];
}

//Login
if(isset($_POST['login']))
{
$email=$_POST['lname'];
$pass=$_POST['lpass'];

  if($reg->login($email,$pass))
  {
    if(true)
    {
      $_SESSION['email']=$email;
  header("Location:homepage/homepage.php");
   exit;
  
}
  }
  else
  {
    echo "<script type='text/javascript'>alert('Login not Done..!');</script>"; 
  }
}

//Registration
if(isset($_POST['register']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
try 
{

if($reg->signup($email,$password,$mobile))
{
if(true)
{
  $_SESSION['email']=$email;
   header("Location:homepage/homepage.php");
    exit;
}

  // echo "<script type='text/javascript'>alert('Registration Done..!');</script>"; 
} 
  }

catch (PDOException $e) 
{
   echo $e->getMessage();
}
}
?>
<html lang="en">
<head>
  <title>DD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/js/common/modernizr.js"></script>

     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/modal.css">

   

  <script type="text/javascript">function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("dd-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}</script>

  <script type="text/javascript">function openNav1() {
    document.getElementById("upnav").style.width = "20%";
    // document.getElementById("dd-navbar").style.width = "50%";
    //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav1() {
    document.getElementById("upnav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}</script>

<style type="text/css">

  ul#ui-id-1 {
    overflow-x: hidden !important;
    height: 224px !important;
}

.w3-teal, .w3-hover-teal:hover {
    color: #fff!important;
    background-color: #2562c5 !important;
}

body {
    top: 0px !important;
    font: normal 400 14px 'Roboto', Arial, Helvetica, sans-serif;
}
</style>
<style>
.button {
              background-color: #4CAF50;
    border: none;
    color: white;
    padding: 14px 29px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: -14px 559px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
    z-index: 2;
    position: relative;
    top: -36px;
    width: 56px;
    height: 50px;
    position: relative;
    left: -24px;
    top: -86px;
}
.button5 {
      background-color: rgba(255, 255, 255, 0);
    color: #e47931;
   
}

.button5:hover {
    background-color: #ffffff;
    color: #e47931;
}

.button5:focus {

  outline: none;
}

#return-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.7);
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: rgba(0, 0, 0, 0.9);
}
#return-to-top:hover i {
    color: #fff;
    top: 5px;
}

ul#ui-id-1 {
    overflow-x: hidden !important;
    height: 224px !important;
    left: 331px !important;
    width: 498px !important;
        padding-left:10px;
}

.dd-navbar-button:focus
{
  outline: none;
}
</style>
</head>
<body >
<a href="javascript:" id="return-to-top"><i class="fa fa-hand-o-up" style="font-size:20px"></i></a>
<nav class="navbar navbar-default" style="margin-bottom: 0;border-radius: 0;background-color:#fff; margin-top: -11px; height:0px; ">
  <div class="container-fluid">
    <div class="navbar-header">
    <div style="
        background-color: #636363;
    width: 44px;
    padding: 3px;
    margin: 2px;
    position: relative;
    right: 20px;
    padding-right: 16px;
    padding-left: 13px;
    margin-top: 1.5px;
    ">
<div style="padding-top: 14px;"><span id="nav_side" onclick="openNav1()">&#9776;</span></div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="margin: 5px; font-size: 13px; font-weight: 500; margin-left: -8px;">
        <li><a class="nav_size_text" href="#">ABOUT</a></li>
        <li><a class="nav_size_text" href="#">CONTACT</a></li>
        <li><a class="nav_size_text" href="#">FAQ</a></li>
          <li><a class="nav_size_text" href="#">NEWS</a></li>
        <li><a href="#" class="nav_size_text text" >SPECIAL OFFERS</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="margin: 5px;margin-right: -20px;font-size: 13px;font-weight: 500;">
        <li><a href="#" class="nav_size_text s_location" onclick="document.getElementById('id01').style.display='block'"><?php echo $location; ?></a></li>
        <li><a href="#" class="nav_size_text" >FREELISTING</a></li>
        <li><a href="#" class="nav_size_text" >ADVERTISE</a></li>
        <li><a href="#" class="nav_size_text" >OFFERS</a></li>
        <li><a href="#" class="nav_size_text text" >SUPPORT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="dd-navbar" style="margin-bottom: -50px;">
    <div class="container">
        <div class="row row1">
           
        </div>
        <div class="row">
            <div class="col-sm-2">
           
                <h1 style="margin:0px;"><span class="largenav" style="margin-left: -45px;margin-top: 3px; font-size: 25px">Diagnodesk</span></h1>
            </div>
            <div class="dd-navbar-search smallsearch col-sm-8 col-xs-11" style="width: 55.666667%;     margin: -7px;">
                <div class="row">
                   <button class="dd-navbar-button col-xs-1" style="width: 19.333333%;border-radius: 0;    padding-left: 0px;">
<div class="menu_button">
                   <ul>
<li><a href="#"><img src="img/placeholder2.png"></a></li>
<li><a style="position: relative;right: 6px;top: 2px;" >DELHI</a></li>
<li><a href="#"><img src="img/down-arrow2.png" style="width: 15px;"></a></li>
</ul>
</div>

            
                     
                    </button>

                     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search1.php'
    });
  });
  </script>
                    <form action="result/result.php" method="GET">
                    <input class="dd-navbar-input col-xs-11" type="" name="query" placeholder="Search for Products, Brands and more"  id="skills" style="width: 95.666667%;border-radius: 0;position: relative;top: -50px;" required="required">
                      
                    <button type="submit" class="button button5"> <i class="fa fa-search" aria-hidden="true" style="margin-left : -8px;"></i> </button>  

                    <input type="hidden" name="city" value="delhi">

                   <input type="hidden" name="area" value="<?php echo $location; ?>">

                    </form>

                </div>
            </div>

            <div class="menu_simple">
                        <ul>
<li><a href="#" onclick="document.getElementById('id02').style.display='block'">LOGIN</a></li>
<li><a style="color: #e47931;font-weight: bold;">OR</a></li>
<li><a href="#" onclick="document.getElementById('id02').style.display='block'">REGISTER</a></li>
<li><a href="#"><i class="fa fa-user-circle" aria-hidden="true" style="font-size: 20px;margin: -3px;position: relative;left: 4px;"></i></a></li>
</ul> 
</div>

<style type="text/css">
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
  .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active {
    font-size: 12px;
    font-weight: bold;
    color: #444;
    text-decoration: none;
    visibility: hidden  !important; 
}
.goog-te-gadget {
    font-family: arial;
    font-size: 11px;
    color:  #2562c5 !important; 
    white-space: nowrap;
}
.goog-te-gadget .goog-te-combo {
    margin: 4px 79px !important;
    height: 33px !important;
    position: relative;
    top: -2px;
    width: 122px;
    position: relative;
    min-height: 14px;
    background-color: #fff;
    border-radius: 2px;
    margin: -3px 0 0 5px;
    padding: 0;
      border-radius: 3px;
    background: #f9f9f9;
    color: #666;
    font-size: 12px;
    padding: 3px 0px 3px 4px;
     box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
}
    </style>
    <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

     

  
        </div>
    </div>
</div>

<div id="upnav" class="sidenav">
    <div class="container" style="background-color: #2562c5; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">×</a>
    </div>
    <a href="#" >ABOUT</a>
    <a href="#" >CONTACT</a>
    <a href="#" >FAQ</a>
    <a href="#" >NEWS</a>
    <a href="#" >SPECIAL OFFERS</a>

</div>

<div class="container">
  
<div class="row">
  <div class="col-md-12 mad" >
  <div class="soxline">
  <div id="remove" >
  <div class="soxer"  style="float: left" >
  <div class="icons">
    <img src="img/smartphone.png" class="img-responsive">
    <img src="img/smartphones.png" class="img-responsive img-top">
  </div>
  <div class="description ">
  <span class="span_color1"><b>Mobiles And Laptops</b></span>
  <ul>   
    <li>Doorstep</li>
    <li>Services</li>
  </ul>  
  </div>
   </div>
   </div>

  <div id="remove" >
  <div class="soxer" id="remove1" style="float: left">
    <div class="icons">
    <img src="img/window.png" class="img-responsive">
  </div>
  <div class="description ">
  <span class="span_color1"><b>Furniture And Decore</b></span>
  <ul>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove">
  <div class="soxer"  " style="float: left">
    <div class="icons">
    <img src="img/house.png" class="img-responsive">
  </div>
  <div class="description">

  <ul>
    <li><b>House </b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer"   style="float: left">
    <div class="icons">
    <img src="img/car.png" class="img-responsive">
  </div>
  <div class="description ">
  <ul>
    <li><b>jobs</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer"  style="float: left">
    <div class="icons">
    <img src="img/businessman.png" class="img-responsive">
  </div>
  <div class="description ">
  <ul>
    <li><b>cars</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="" >
  <div class="soxer" style="float: left">
    <div class="icons">
    <img src="img/settings.png" class="img-responsive">
  </div>
  <div class="description ">
  <ul>
    <li><b>Sevices</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>
  
  
</div>
  </div>
  
</div>

<div class="row lift">
  <div class="col-md-12 mad" >
  <div class="soxline">

  <div id="remove" >
  <div class="soxer"  style="float: left" >
      <div class="icons">
    <img src="img/mortarboard.png" class="img-responsive">
  </div>
  <div class="description ">
  <span class="span_color1"><b>Education And Training</b></span>
  <ul>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer" style="float: left">
     <div class="icons">
    <img src="img/blocks.png" class="img-responsive">
  </div>
  <div class="description ">
  <ul>
    <li><b>Kids & Toys</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer" style="float: left">
     <div class="icons">
    <img src="img/apartment.png" class="img-responsive">
  </div>
  <div class="description ">
  <span class="span_color1"><b style="margin-left: 33px;">Real Estate</b></span>
  <ul>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer" style="float: left"> 
  <div class="icons">
    <img src="img/bicycle.png" class="img-responsive">
  </div>
  <div class="description ">
  <ul>
    <li><b>Bikes</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>
  </div>
  </div>

  <div id="remove" >
  <div class="soxer" style="float: left">
    
  <div class="icons">
    <img src="img/basketball-jersey.png" class="img-responsive">
  </div>
  <div class="description ">
  <span class="span_color1"><b >Sports and Hobbies</b></span>
  <ul>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>

  </div>
  </div>

  <div id="" >
  <div class="soxer" style="float: left">
     <div class="icons">
    <img src="img/more.png" class="img-responsive">
  </div>
  <div class="description ">
  
  <ul>
  <li><b>More</b></li>
    <li>Doorstep</li>
    <li>Services</li>
  </ul>
  
  </div>

  </div>
  </div>
  
</div>
  </div>
</div>

</div>

<div class="container-fluid feature">
<div class="container">
	<div class="heading"><h2>Feature Services</h2>
	</div><!--heading-->
<div class="row">
<div class="col-md-12" >
<div class="row">
<div class="col-sm-6">
	
<div class="row">
	<div class="col-xs-6">
		<div class="card a">
          <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
         <div class="card-block">
         	 <span class="card-text span_color">Hcl Technologies</span> 
         	 <button type="button" class="btn btn-secondary btn-xs side">Take Service</button>  
         	 <p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Nirman Vihar</p> 
         	 <div class="starimage"><img src="img/5star.png" class="img-responsive" width="165px" height="100px"></div>

        </div>
	</div>
</div>

<div class="col-xs-6">
    <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="card-block">
           <span class="card-text span_color">Hcl Technologies</span> 
           <button type="button" class="btn btn-secondary btn-xs side">Take Service</button>  
           <p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Nirman Vihar</p> 
           <div class="starimage"><img src="img/5star.png" class="img-responsive" width="165px" height="100px"></div>

        </div>
  </div>
</div>
</div><!--row-->
<div class="row">
  <div class="col-xs-6">
    <div class="card a">
          <img class="card-img-top" src="img/3.jpg" alt="Card image cap">
         <div class="card-block">
           <span class="card-text span_color">Hcl Technologies</span> 
           <button type="button" class="btn btn-secondary btn-xs side">Take Service</button>  
           <p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Nirman Vihar</p> 
           <div class="starimage"><img src="img/5star.png" class="img-responsive"  width="165px" height="100px"></div>

        </div>
  </div>
</div>

<div class="col-xs-6">
    <div class="card a">
          <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
         <div class="card-block">
           <span class="card-text span_color">Hcl Technologies</span> 
           <button type="button" class="btn btn-secondary btn-xs side">Take Service</button>  
           <p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Nirman Vihar</p> 
           <div class="starimage"><img src="img/5star.png" class="img-responsive" width="165px" height="100px"></div>

        </div>
  </div>
</div>
</div><!--col-->
</div><!--row-->
<div class="col-sm-6">
  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/Chrysanthemum.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="img/Desert.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="img/Hydrangeas.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="img/Jellyfish.jpg" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div><!--innerrow-->
</div><!--col-->
</div><!--row-->
</div><!--container-->
	
</div><!--container-fluid-->
<!--special section-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="saleimg">
        <img class="img-responsive" src="img/imagesale.jpg" alt="Chania">
      </div>
    </div>
  </div>
</div>
<!--special section-->
<!--container-->
<div class="container">
  <div class="heading2">
  <h2>Popular Services</h2>
  <span class="span_color">Your Daily Download</span>
  </div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>

<div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>




<div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>





      <div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>




      <div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>


      <div class="col-sm-2">
          <div class="card a">
          <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
         <div class="summery">
           <span class="card-text">RESTAURANT</span> 
           <div class="listo">
             <ul>
               <li> <a href="#"> Order online </a></li>
               <li><a href="#">Book Table </a></li>
               <li><a href="#">pay online</a></li>
             </ul>
             <p class="more"><a href="#">More...</a></p>
           </div>
           

           
           
        </div>
      </div>
      </div>


    </div>



  </div>
</div>
<!--end-container-->

</div><!--CONTAINER-->

<div class="container">
<div class="row">
  <div class="col-md-12 "> 
  <div class="heading3">
    <h2>Choose Popular cities</h2>
  </div><!--heading-->
  </div><!--col-->
  </div><!--row-->
  </div><!--container-->


<!--start-container-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
      <div class="col-md-10">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                

  <div class="boxline">
  <div class="boxer" style="float: left" >
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1">
  <span>Used Item in</span><br>
  <span><b>Ahemdabad </b></span>

  
  </div>

  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/temple.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Banglore </b></span>

  
  </div>

  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/city-hall.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Channai </b></span>

  
  </div>

  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/sailboat.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Cochin </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/carousel.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Ghaziabad </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/qutb-minar-in-new-delhi.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Hydrabad </b></span>

  
  </div>
  </div>
</div>


















              </div>
              <div class="col-sm-12">
                  <div class="boxline">
  <div class="boxer" style="float: left" >
    <div class="icons1">
    <img src="img/taj-mahal.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Jaipur </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Kolkata </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Mumbai </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>New Delhi </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Noida </b></span>

  
  </div>
  </div>
  <div class="boxer" style="float: left">
    <div class="icons1">
    <img src="img/jama-masjid.png" class="img-responsive">
  </div>
   <div class="description1 ">
  <span >Used Item in</span><br>
  <span><b>Bihar </b></span>

  
  </div>
  </div>
   
</div>





              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"><img class="img-responsive dam" src="img/saleimage.jpg" alt="saleimage"></div>
       </div>
    </div>
  </div>
</div>
<!--end-container-->
<!--start-container-->
<div class="container">

<div class="row">
  <div class="col-md-12">
    <div class="semi-buton"> 
    <button type="button" class="btn btn-default btn-lg center sizer">View More Used Items</button>
    </div>
  </div>
</div>
  
</div><!--end-container-->

<!--start-container-->

<div class="container">
  <div class="row fotter">
    
      <div class="col-md-4">
      <div class="headr">
      <h4>HELP</h4>
      </div>
      <div class="listr">
        <ul>
          <li><a href="#"> Payment </a></li>
          <li><a href="#"> Saved Cards </a></li>
          <li><a href="#"> shipping </a></li>
          <li><a href="#"> Cancellation and Return </a></li>
          <li><a href="#">FAQ </a></li>
          <li><a href="#">Report Infrigment</a></li>
        </ul>
      </div>






      </div>
      <div class="col-md-4">
        
 <div class="headr">
      <h4>dd</h4>
      </div>
      <div class="listr">
        <ul>
          <li><a href="#">Contact Us </a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">dd Stories</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Sell on dd</a></li>
        </ul>
      </div>


      </div>
      <div class="col-md-4">
        

       
 <div class="headr">
      <h4>MSIC</h4>
      </div>
      <div class="listr">
        <ul>
          <li><a href="#">Online Shopping</a></li>
          <li><a href="#">Affiliate Program</a></li>
          <li><a href="#">Gift Cards</a></li>
          <li><a href="#">dd First Subscription</a></li>
         
        </ul>
      </div>

      </div>
   
  </div>
</div>
<!--end-container-->
<!--start-container-->
<div class="container">
  <div class="row tr">
  <div class="track">
    <div class="col-md-4 divid1">

        <i class="fa fa-map-marker abx" aria-hidden="true" style="font-size: 40px;"></i>
        <div class="pa"><span class="span_color"> Track your order </span></div>


    </div>



     <div class="col-md-4 divid1">
  
        <i class="fa fa-refresh abx" aria-hidden="true" style="font-size: 40px;"></i>
        <div class="pa"><span class="span_color"> Track your order </span></div>
      </div>


      <div class="col-md-4 divid1">
     
       <i class="fa fa-ban abx" aria-hidden="true" style="font-size: 40px;"></i>
        <div class="pa"><span class="span_color"> Track your order </span></div>

      </div>
      </div>
  </div>
</div>
<!--end-container-->


<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="row colw">
      <div class="col-sm-8 ">
        <div class="textp">
          <span>Policies: </span>
          <a  class="spacem" href="#">Return Policy</a>  |  
          <a  class="spacem" href="#">Terms of use</a>  |  
          <a  class="spacem" href="#">Security</a>  |  
          <a  class="spacem" href="#">Privacy</a>  |  
          <a  class="spacem" href="#">Infringment</a>

  <span class="textcenter">© 2007-2017 Gsvt.com</span>

          </div>



      </div>
      <div class="col-sm-4">
        <div class="textf">
          <span>Keep In Touch</span>
          <div class="social">
    <ul>
        <li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-lg fa-youtube-play"></i></a></li>
        </ul>
        </div>
        </div>

      </div>
    </div>
     </div>
     
  </div>

</div>




<!--end-container-->
<!--start-container-->
<div class="container">
  <div class="row colwh">
    <div class="col-sm-12">
      <div class="textpr">
        <span class="span_color">Top Stories:Brand Directory</span>
      </div>
    </div>
  </div>
</div>
<!--end-container-->

<!--start-container-->
<div class="container">
  <div class="row fullr">
  <div class="col-md-12 fulc">
    <div class="row r1">
      <div class="col-sm-12 c1">
      <strong> <span class="span_color">MOST SEARCHED FOR ON dd:</span> </strong>
       <a  class="vlist" href="#">Redmi Note 4</a>  |  
       <a  class="vlist" href="#">Google Pixel</a>  |  
       <a  class="vlist" href="#">Offers</a>  |  
       <a  class="vlist" href="#">Blurtooth Speakers</a>  |  
       <a  class="vlist" href="#">Blurtooth Headphones</a>  |  
       <a  class="vlist" href="#">Printers</a>  |  
       <a  class="vlist" href="#">Car Sterio</a>  |  
       <a  class="vlist" href="#">Jbl Speakers</a>  |  
       <a  class="vlist" href="#">Home Theaters</a>  |  
       <a  class="vlist" href="#">Gold Jwellarry</a>  |  
       <a  class="vlist" href="#">MI Power banks</a>  |  
       <a  class="vlist" href="#">Lenovo K6 Power</a>  |  
       <a  class="vlist" href="#">Swipe elite Power</a> <br>
    <strong><span class="span_color">MOBILES:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   
          <strong><span class="span_color">HOME:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   
          <strong><span class="span_color">CAMERA:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   
          <strong><span class="span_color">LAPTOPS:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   
          <strong><span class="span_color">CLOTHING:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   
          <strong><span class="span_color">LIFESTYLE ACCESSORIES:</span> </strong>
       <a  class="vlist" href="#">Apple iphone Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Mobiles</a>  |  
       <a  class="vlist" href="#">Lenovo Mobiles</a>  |  
       <a  class="vlist" href="#">Motorola Mobiles</a>  |  
       <a  class="vlist" href="#">Asus Mobiles</a>  |  
       <a  class="vlist" href="#">Xiaomi/Mi Mobiles</a>  |  
       <a  class="vlist" href="#">Micromax Mobiles</a>  |  
       <a  class="vlist" href="#">HTC Mobiles</a>  |  
       <a  class="vlist" href="#">Samsung Galaxy On Nxt</a>  |  
       <a  class="vlist" href="#">LeEco Mobiles</a>  |  
       <a  class="vlist" href="#">Moto Z/ Z Play</a>  |  
       <a  class="vlist" href="#">Intex Mobiles</a>  |  
       <a  class="vlist" href="#">Lava Mobiles</a> <br>   <br>
    </div>
    </div>
      </div>
    </div>
    </div>

<hr>
<!--end-container-->
<div class="container">
  <div class="row row2">
    <div class="col-md-12">
      <div class="headabout">
        <h3>About</h3>
        <div class="con_about">
          <p>Welcome to Justdial, your 'one stop shop' where you are assisted with day-to-day and exclusive planning and purchasing activities. We take pride in our iconic customer support number, 8888888888 and the fact that we own a strong hold on local business information pan India</p>

          <p>Our service extends from providing address and contact details of business establishments around the country, to making orders and reservations for leisure, medical, financial, travel and domestic purposes. We enlist business information across varied sectors like Hotels, Restaurants, Auto Care, Home Decor, Personal and Pet Care, Fitness, Insurance, Real Estate, Sports, Schools, etc. from all over the country. Holding information right from major cities like Mumbai, Delhi, Bangalore, Hyderabad, Chennai, Ahmedabad and Pune our reach stretches out to other smaller cities across the country too.</p>

          <p>Our 'Free Listing' feature gives a platform to showcase varied specialities. We then furnish you with the information via phone, SMS, web, App and WAP as well as, create a space for you to share your experiences through our 'Rate & Review' feature. Through the 'Best Deals', 'Last Minute Deals' and 'Live Quotes', we make sure that you are offered the best bargains in the market.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row row3">
    <div class="col-md-12">

      <div class="row row3_1">

        <div class="col-sm-2">
          <div class="headr1">
            <h4>Buyer central</h4>
            <div class="listdetail">
              <ul>
                <li> <a href=""> Sign In </a></li>
                <li> <a href=""> Register </a></li>
                <li> <a href=""> Terms & Conditions </a></li>
                <li> <a href=""> Buyer Protection </a></li>
                <li> <a href=""> Payment Options </a></li>
                <li> <a href=""> EMI Payment </a></li>
                <li> <a href=""> Shipping Policy </a></li>
                <li> <a href=""> Return Policy </a></li>
                <li> <a href=""> Cancellation Policy </a></li>
                <li> <a href=""> Clues Bucks </a></li>
                <li> <a href=""> Wishlist </a></li>
                <li> <a href=""> Buyer Guides </a></li>
                <li> <a href=""> Gift Certificate </a></li>
                <li> <a href=""> What’s New </a></li>
                <li> <a href=""> Help </a></li>
                <li> <a href=""> Service Centre </a></li>
              </ul>
            </div>
            </div>
        </div>


        <div class="col-sm-3">
          <div class="headr1">
            <h4>Merchant Central</h4>
            <div class="listdetail">
              <ul>
                <li> <a href=""> Merchant Sign In </a></li>
                <li> <a href=""> Merchant Register </a></li>
                <li> <a href=""> How Does It Work </a></li>
                <li> <a href=""> Pricing </a></li>
                <li> <a href=""> Fulfillment by ShopClues </a></li>
                <li> <a href=""> Merchant Tools </a></li>
                <li> <a href=""> Best Practice </a></li>
                <li> <a href=""> Policies & Rules </a></li>
                <li> <a href=""> User Agreement </a></li>
                <li> <a href=""> Testimonials </a></li>
                <li> <a href=""> Merchant Ratings </a></li>
                
              </ul>
            </div>
            </div>
        </div>

<div class="col-sm-2">
         <div class="headr1">
            <h4>About Us</h4>
            <div class="listdetail">
              <ul>
                <li> <a href=""> Band of Trust </a></li>
                <li> <a href=""> ShopClues History </a></li>
                <li> <a href=""> Brand Guidelines </a></li>
                <li> <a href=""> TV Commercials </a></li>
                <li> <a href=""> News </a></li>
                <li> <a href=""> In the Press </a></li>
                <li> <a href=""> Awards </a></li>
                <li> <a href=""> Careers </a></li>
                <li> <a href=""> Seller Summit </a></li>
                <li> <a href=""> Blog </a></li>
               
              </ul>
            </div>
            </div>


      </div>


<div class="col-sm-2">
         
 
  <div class="headr1">
            <h4>Contact Us</h4>
            <div class="listdetail">
              <ul>
                <li> <a href=""> Customer Support </a></li>
                <li> <a href=""> Merchant Support </a></li>
                <li> <a href=""> Merchant Inquiries </a></li>
                <li> <a href=""> Product Reviews </a></li>
                <li> <a href=""> Bulk Orders </a></li>
                <li> <a href=""> Press</a></li>
               
              </ul>
            </div>
            </div>
 

      </div>


<div class="col-sm-2">
          <div class="headr1">
            <h4>Advertise With Us</h4>
            <div class="listdetail">
              <ul>
                <li> <a href=""> Ad Unit </a></li>
                <li> <a href=""> Inserts </a></li>
                <li> <a href=""> Advertising Contact </a></li>
                <li> <a href=""> Become an Affiliate </a></li>
                
              </ul>
            </div>
            </div>
 


      </div>





      </div>
      </div>


  </div><!--row 3-->
</div>
<div class="container">
  <div class="row foot">
    <div class="col-md-12">
      <div class="footer">
        <div class="row">
          <div class="col-md-6">
            <div class="Policy">
              <span> <a href="#">Privacy Policy</a> | </span>    
              <span> <a href="#">User Agreement</a> | </span>  
              <span> <a href="#">Notes to Security Practices</a> | </span>
              <span> <a href="#">Labor Compliance</a> </span> 
            </div>
          </div>
          <div class="col-md-6">
          <div class="Policy">
            <span class="pull-right">Copyright © 2011-2017 Digno Network Pvt. Ltd</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-container-->

<!--modal popup -->
 <div id="id01" class="w3-modal">

    <div class="w3-modal-content w3-animate-zoom w3-card-8 curve_body" id="modal_pos" style="box-shadow: 0 0 0 0 !important; */">
 <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-closebtn"><i class="closee hairline"></i></span>
      <header class="w3-container teal curve_head"> 
       
        <i class="location"></i>
        <span class="hi">Hi, Select Your Zone</span>
        <p class="share">Share area name for better search exerience</p>
      </header>
      <div class="w3-container">
        <form  method="post" id="form">
                    <span id="pincode_input"><input type="text" placeholder="enter your area name" id="pin_code_popup" name="give_area" required="required"></span>
                    <!-- <span class="btn_effect"> -->
                    <input class="btnn orange" type="submit" name="get_area" id="get_pincode_popup" value="Submit"><!-- </span> -->
                </form>
      </div>
    </div>
  </div>

<!--<script type="text/javascript">
  window.onload = function(){

  if(localStorage.getItem('popState') != 'shown'){
        $("#id01").delay(2000).fadeIn();
        localStorage.setItem('popState','shown')
    }
    else
    {
    document.getElementById('id01').style.display='block';
  }
}
</script>-->

 <div id="id02" class="w3-modal">

    <div class="w3-modal-content w3-animate-zoom w3-card-8 curve_body"  style="box-shadow: 0 0 0 0 !important; background: aliceblue;background-color: rgba(138, 43, 226, 0);    margin: 0px;">
 <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-closebtn"><i class="closee hairline" style="z-index: 1;top: 13px;left: 335px;"></i></span>
   <?php include('login1.php'); ?>  
   
    </div>
  </div>

  <script type="text/javascript">
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

    </script>
    <!--page top end-->





</body>
</html>
