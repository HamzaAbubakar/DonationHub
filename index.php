<?php
session_start();
$con = mysqli_connect("localhost","root","","1316441");


if(isset($_POST['submit'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$date = date("Y-m-d");
	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$note = $_POST['note'];
	$reference_key = rand(00000,99999);

	if($image_type == "image/jpeg" or $image_type == "image/png" or $image_type == "image/gif"){
		if($image_size <= 100000000){
			move_uploaded_file($image_tmp,"img/$image_name");
		}else{
			echo "<script>alert('Image is larger')</script>";
		}
	}else{
		echo "<script>alert('Invalid image type')</script>";
	}

	$query = mysqli_query($con,"insert into user_donation(first_name,last_name,email,phone,address,image,note,reference_key,date,status)
							values('$first_name','$last_name','$email','$phone','$address','$image_name','$note','$reference_key','$date','new')");

	if($query > 0){
		echo "<script>alert('Thank you for your donation.To check your details your reference key is $reference_key')</script>";
	}
}if(isset($_POST['track'])){
				$reference = $_SESSION['reference'] = $_POST['reference'];

				$query2 = mysqli_query($con,"select * from user_donation where reference_key = '$reference'");

				if(mysqli_num_rows($query2) > 0){
					header('location:user_details.php');
				}
			}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DonationHub</title>
    <link rel="stylesheet" type="text/css" href="css/jn.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Slideshow -->
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
<!-- EndSlideShow -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
  var my_posts = $("[rel=tooltip]");
  for(i=0;i<my_posts.length;i++){
      the_post = $(my_posts[i]);
      if(the_post.hasClass('invert')){
          the_post.tooltip({ placement: 'left'});
          the_post.css("cursor","pointer");
      }else{
          the_post.tooltip({ placement: 'rigt'});
          the_post.css("cursor","pointer");
      }
  }
});

%social buttons
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </script>
  </head>
  <body >
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DonationHub</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="#">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
				<li><a href="track.php">Track</a></li>
        <li><a href="volunteer_login.php"><span class="glyphicon glyphicon-user"></span> Volunteer Login </a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Slideshow -->
<div class="row">

<div class="container">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img\img1.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img\img2.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img\img3.png" style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<!-- </div> -->
<!-- EndSlideshow -->



  <div class="row">
    <nav class="col-sm-2" id="myScrollspy" style="background-color:grey;">
      <p><img src="img/Logo1.png" style="width:170px; height:150px; "> <br> DonationHub is a platform that provides people all aspects of donation with minimul effort and high efficiency</p>
      <div class="track" style="border:2px;">
        <h2>Track</h2>
		<form method="post" action="">
        <p>Enter your reference number below to get details of your donations</p>
        <input type="text" name="reference" id="reference" value="" class="form-control input-sm" required>
        <br>
        <input type="submit" name="track" value="Track" class="btn btn-info btn-block" style="margin:5px; size:30px">
		</form>
        <i class="fa fa-facebook-official"></i>
        <i class="fa fa-facebook-official" style="font-size:48px;color:red"></i>
      </div>
    </nav>


    <div class="col-sm-10" style="background-color:lightgrey;">
      <div class="container" >
              <div class="row centered-form">
              <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
              	<div class="panel panel-default">
              		<div class="panel-heading">
      			    		<h3 class="panel-title">Please Enter your Donations Details Below</h3>
      			 			</div>
      			 			<div class="panel-body">
      			    		<form role="form" action="" method="post" enctype="multipart/form-data">
      			    			<div class="row">
      			    				<div class="col-xs-6 col-sm-6 col-md-6">
      			    					<div class="form-group">
      			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required>
      			    					</div>
      			    				</div>
      			    				<div class="col-xs-6 col-sm-6 col-md-6">
      			    					<div class="form-group">
      			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" required>
      			    					</div>
      			    				</div>
      			    			</div>

      			    			<div class="form-group">
      			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
      			    			</div>

                      <div class="form-group">
      			    				<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number" required>
      			    			</div>
								 <div class="form-group">
      			    				<input type="text" name="address" id="addres" class="form-control input-sm" placeholder="Your Address" required>
      			    			</div>

      			    			<div class="row">
      			    				<div class="col-xs-12 col-sm-12 col-md-12">
      			    					<div class="form-group">
      			    						<input type="file" name="image" id="address" class="form-control input-sm" required>
      			    					</div>
      			    				</div>
      			    			</div>

                      <div class="form-group">
												<p>Donations Pickup Time </p>
      			    				<input type="date" min="2018-02-20"name="note" id="note" class="form-control input-sm" placeholder="Pickup date">
      			    			</div>

      			    			<input type="submit" name="submit" value="Donate" class="btn btn-info btn-block">

      			    		</form>
      			    	</div>
      	    		</div>
          		</div>
          	</div>
          </div>
            </div>
          </div>
        </li>
    </ul>

      </div>
    </div>
  </div>



  </body>
</html>
