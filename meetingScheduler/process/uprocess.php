<?php

require_once ('dbh.php');

$userName = $_POST['userName'];
$password = $_POST['pwd'];
setcookie('user',$userName,time()+2*24*60*60,'/'); 
// $_COOKIE['user'] = $user;

$sql = "SELECT * from `user` WHERE UserName = '$userName' AND Passwd = '$password'";
//$sqlid = "SELECT UID from `user` WHERE userName = '$UID' AND passwd = '$password'";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1){
	header("Location: ..//meeting_scheduler.php");
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid User Name or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}


?>
