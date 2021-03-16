<!DOCTYPE html>
<html>
<head>
	<title>Meeting Scheduler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="myStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body background="bgimg3.jpg">
	<header>
		<nav>
			<h1>Meeting Scheduler</h1>
			<ul id="navli">
				<li><a class="homeblack" href="index.html">HOME</a></li>
				<li><a class="homered" href="meeting_Scheduler.html">Forum</a></li>
				<li><a class="homeblack" href="login.html">Log Out</a></li>
			</ul>
		</nav>
	</header>



<div class="container">
  <div class="jumbotron">
  <?php

require_once ('process/dbh.php');
$Name = $_COOKIE['user'];


echo "<h3>Welcome ".$Name."</h3>";


?> 
    <p>Schedule your way to the new generation of meetings..</p> 
  </div>


	<div class="row">
		<div class="col-xs-6 col-md-4">
			<img src="img/hand.png" width="200px" height="200px"></br>
			<a href="Schedule.php">
		  	<button type="button" class="btn btn-primary btn-lg">SCHEDULE</button></a>
		</div>
		<div class="col-xs-6 col-md-4">
			<img src="img/upcoming.jpg" width="200px" height="200px"></br>
			<a href="upcomingMeet.php">
		  	<button type="button" class="btn btn-primary btn-lg">UPCOMING MEETINGS</button></a>
		</div>
		  <div class="">
		  <img src="img/clock.png" width="200px" height="200px"></br>
		  <a href="pastMeetings.php">
		  	<button type="button" class="btn btn-primary btn-lg">PAST MEETINGS</button></a>
		  </div>
	  </div>
</div>
</body>
</html>