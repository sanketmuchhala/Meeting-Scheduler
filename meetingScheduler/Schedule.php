<html>
 <head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleScheduler.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  
  <body>
   <body background="bgimg3.jpg">
    <header>
      <nav>
        <h1>Schedule Meeting</h1>
        <ul id="navli">
          <li><a class="homeblack" href="index.html">HOME</a></li>
          <li><a class="homeblack" href="meeting_Scheduler.php">Forum</a></li>
          <li><a class="homered" href="Schedule.php">Schedule</a></li>
          <li><a class="homeblack" href="login.html">Log Out</a></li>
        </ul>
      </nav>
    </header>
  <?php
require_once ('process/dbh.php');

$userName = $_COOKIE['user'];

// $userName = $_POST['userName'];
// $password = $_POST['pwd'];




?>

   <div class="container">


    <form action="process/scheduleProcess.php" method="POST">

    <div class="field">
    <h3><?php echo "Welcome ".$userName ?></h3>
      
      <fieldset>
        <p>Enter the meeting details below</p><hr>
        
        <h4>Meeting Topic:</h4> <input type="text" name="topic"  placeholder="Meeting Topic" required="required"> 

        <h4>Date:</h4> <input type="date" name="date" required="required"><br>

        <h4>Start Time:</h4> <input type="time" name="startTime" required="required"><br>

        <h4>End Time:</h4> <input type="time" name="endTime" required="required"><br>

        <br>
        <button type="button" class="btn btn-primary btn-lg">
        <div class="Schedulebox" >
        <input type="submit" name="schedule" value="Schedule">
        </div>
        </button>
        <a href="Schedule.php">
        <button type="button" class="btn btn-primary btn-lg">Reset</button></a>
        <a href="meeting_Scheduler.php">
        <button type="button" class="btn btn-primary btn-lg">Back</button></a>
      
      </fieldset>
      
    </div>
    
    </form> 

    </div> 

  </body>  
</html>