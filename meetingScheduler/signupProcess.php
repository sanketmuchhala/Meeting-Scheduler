<?php
require_once('process/dbh.php');

$Name = $_POST['Name'];
$Email = $_POST['mailId'];
$username = $_POST['userName'];
$password = $_POST['pwd'];

$query = "INSERT INTO user (Name, Email, UserName, Passwd) VALUES ('$Name', '$Email', '$username', '$password')";
echo $query;
$execute = mysqli_query($conn, $query);
if($execute){
    header("Location: login.html");
    die;
}
else{
    header("Location: signUp.html");
}
  	
?>