<?php
session_start();
$con = mysqli_connect("localhost","root","","1316441");

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['pass'];

	if($email and $password){
	$query = mysqli_query($con,"select * from registration where email = '$email' and password = '$password'");

	if(mysqli_num_rows($query) > 0){
		header("location:Admin Panel.php");
	}
	}else{
		echo "<script>alert('Fields are Empty')</script>";
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
      <a class="navbar-brand" href="index.php">DonationHub</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
				<li><a href="track.php">Track</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Volunteer Login </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <nav class="col-sm-2" id="myScrollspy" style="background-color:grey;">
      <p><img src="img/Logo1.png" style="width:170px; height:150px; "> <br> Janesar is a platform that provides people all aspects of donation with minimul effort</p>

    </nav>


    <div class="col-sm-10" style="background-color:lightgrey;">
      <div class="container" >
              <div class="row centered-form">
              <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
              	<div class="panel panel-default">
              		<div class="panel-heading">
      			    		<h3 class="panel-title">Please Login here</h3>
      			 			</div>
      			 			<div class="panel-body">
      			    		<form role="form" action="" method="post">
      			    			<div class="row">
      			    				<div class="col-xs-12 col-sm-12 col-md-12">
      			    					<div class="form-group">
      			                <input type="email" name="email" id="first_name" class="form-control input-sm" placeholder="Enter your Email" required>
      			    					</div>
      			    				</div>
      			    				<div class="col-xs-12 col-sm-12 col-md-12">
      			    					<div class="form-group">
      			    						<input type="password" name="pass" id="last_name" class="form-control input-sm" placeholder="***********" required>
      			    					</div>
      			    				</div>
      			    			</div>
      			    			<input type="submit" name="submit" value="Login" class="btn btn-info btn-block">
      			    		</form>
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
