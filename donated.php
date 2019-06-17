<?php
	session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DonationHub</title>
    <link rel="stylesheet" type="text/css" href="jn.css">
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
  <body>
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
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout </a></li>
      </ul>
    </div>
  </div>
</nav>

<div>
  <div class="row">
    <nav class="col-sm-2 navbar-fixed-left" id="myScrollspy" style="background-color:black;">
      <ul class="nav nav-pills nav-stacked">
        <li class=""><a href="Admin Panel.php">NEW</a></li>
        <li><a href="processing.php">PROCESSING</a></li>
        <li><a href="completed.php">COMPLETED</a></li>
        <li class="active"><a href="#">DONATED</a></li>
	</ul>
    </nav>

    <div class="col-sm-10" style="background-color:lightgrey;">

      <ul class="timeline">
        <li>
          <div class="timeline-badge primary"><a><i class="glyphicon glyphicon-record" rel="tooltip" title="11 hours ago" id=""></i></a></div>
          <div class="timeline-panel">
		  <h3>Donated Posts</h3>
		  <?php
			$con = mysqli_connect("localhost","root","","1316441");
			$i = 1;
			$query = mysqli_query($con,"select * from user_donation where status = 'donated' order by 1 desc");
			echo "<table class='table table-responsive'>";
			echo "<tr>";
			echo "<th>S.No</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Email</th>";
			echo "<th>Phone</th>";
			echo "<th>Address</th>";
			echo "<th>Image</th>";
			echo "<th>Pickup Date</th>";
			echo "<th>Date</th>";
			echo "<th>Status</th>";
			echo "</tr>";
			while($row = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['first_name'];?></td>
				<td><?php echo $row['last_name'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['phone'];?></td>
				<td><?php echo $row['address'];?></td>
				<td><img class="img img-responsive" src="img/<?php echo $row['image'];?>" width="100" height="100"/></td>
				<td><?php echo $row['note'];?></td>
				<td><?php echo date("d-m-Y", strtotime($row['date']));?></td>
				<td><?php echo $row['status'];?></td>
			</tr>
		<?php	}
			echo "</table>";
		  ?>
          </div>
        </li>
    </ul>

      </div>
    </div>
  </div>
  </body>
</html>
