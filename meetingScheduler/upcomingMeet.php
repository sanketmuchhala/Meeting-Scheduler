<html>
<head>
<title>Upcoming Meetings</title>
<meta charset="utf-8">
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 15px;
text-align: left;
}
th {
background-color: #588c7e;
color: black;
}
tr:nth-child(even) {background-color: #f2f2f2}
td{color: black}
</style>
    <link rel="stylesheet" type="text/css" href="styleScheduler.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body background="../bgimg3.jpg">
<header>
      <nav>
        <h1>Meeting Scheduler</h1>
        <ul id="navli">
          <li><a class="homeblack" href="index.html">HOME</a></li>
          <li><a class="homeblack" href="meeting_Scheduler.php">Forum</a></li>
          <li><a class="homered" href="upcomingMeet.php">Upcoming Meeting</a></li>
          <li><a class="homeblack" href="login.html">Log Out</a></li>
        </ul>
      </nav>
    </header>

<?php

require_once ('process/dbh.php');


$today = (new DateTime())->format('Y-m-d');


$userName = $_COOKIE['user'];

$query = "SELECT UID FROM user WHERE UserName = '$userName'";

$uid = mysqli_query($conn,$query);

$query_executed = mysqli_fetch_assoc($uid);

$UID = $query_executed['UID'];


$query = "SELECT Name, MID, M_Passwd, topic, Date, startTime,endTime FROM user, meeting where Date >= '$today' 
          AND user.UID = meeting.UID  ORDER BY Date";

$result = mysqli_query($conn,$query);

?>

    
    <div class="container">
    <div class="field">
    <h3><?php echo "Welcome ".$userName ?></h3>
    <fieldset>
    <p>Upcoming Meetings</p><hr>

    
    <table>
    <tr>
    <th>Scheduled By</th>
    <th>Meeting Topic</th>
    <th>Meeting ID</th>
    <th>Meeting Password</th>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    </tr>
    <?php
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "</td><td>" . $row["Name"] . "</td><td>" . $row["topic"] . "</td><td>"
    . $row["MID"]. "</td><td>". $row["M_Passwd"]. "</td><td>". $row["Date"]. "</td><td>". $row["startTime"]. "</td><td>"
    . $row["endTime"]. "</td></tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
    ?>
    </table>

    <br>
    </button>
    <a href="meeting_Scheduler.php">
    <button type="button" class="btn btn-primary btn-lg">Back</button></a>
  
  </fieldset>
  
</div>

</form> 

</div> 

</body>
</html>
