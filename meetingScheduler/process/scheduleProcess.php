<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../styleScheduler.css">
    <link rel="stylesheet" type="text/css" href="../Style.css">
</head>
<body background="../bgimg3.jpg">
<header>
      <nav>
        <h1>Meeting</h1>
        <ul id="navli">
          <li><a class="homeblack" href="index.html">HOME</a></li>
          <li><a class="homeblack" href="meeting_Scheduler.php">Forum</a></li>
          <li><a class="homered" href="Schedule.php">Schedule</a></li>
          <li><a class="homeblack" href="login.html">Log Out</a></li>
        </ul>
      </nav>
    </header>

<?php

require_once ('dbh.php');

function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function generateMID() {
    global $conn;
    $mid = abs( crc32( uniqid() ) );
    $query = "SELECT MID FROM `meeting` WHERE MID = '$mid'";

    $id = mysqli_query($conn, $query);

    $query_executed = mysqli_fetch_assoc($id);
    while($query_executed){

        if($query_executed['MID'] == $mid){
            generateMID($conn);
        }
    }
    return $mid;   
}
$pwd = password_generate(6);

$today = (new DateTime())->format('Y-m-d');
$mTopic = $_POST['topic'];
$date = $_POST['date'];
$sTime = $_POST['startTime'];
$eTime = $_POST['endTime'];

if($today > $date){
    
    header("Location: ..//schedule.php" ); 
    die;
}

$userName = $_COOKIE['user'];

$query = "SELECT UID FROM user WHERE UserName = '$userName'";

$uid = mysqli_query($conn,$query);

$query_executed = mysqli_fetch_assoc($uid);

$UID = $query_executed['UID'];

$mid = generateMID();
$insert = "INSERT INTO meeting VALUES ('$mid','$pwd','$mTopic','$date','$sTime','$eTime','$UID')";

$execute = mysqli_query($conn,$insert);
if($execute){
    echo "Meeting Created";
}
else{
    echo "unsuccess";
}

$query = "SELECT * from meeting, user where user.UID='$UID' AND MID = '$mid'";
$disp = mysqli_query($conn,$query);
$display = mysqli_fetch_assoc($disp);



?>

    
    <div class="container">


    <div class="field">
  
    <fieldset>
    <p>Meeting Scheduled</p><hr>

    <h4><?php echo $display['UserName'] ?></h4><br>
    
    <h4>Meeting Topic:</h4> <p><?php echo $display['topic'] ?></p></br>

    <h4>Meeting ID:</h4> <p><?php echo $display['MID'] ?></p></br>

    <h4>Meeting Password:</h4> <p><?php echo $display['M_Passwd'] ?></p></br>

    <h4>Date:</h4> <p><?php echo $display['Date'] ?> </p><br>

    <h4>Start Time:</h4> <p><?php echo $display['startTime'] ?> </p><br>

    <h4>End Time:</h4> <p><?php echo $display['endTime'] ?> </p><br>

    <br>
    </button>
    <a href="../meeting_Scheduler.php">
    <button type="button" class="btn btn-primary btn-lg">OK</button></a>
  
  </fieldset>
  
</div>

</form> 

</div> 





</body>
</html>
