<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}

$servername = "localhost";
$username = "social_media";
$password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root",$password, $username,"3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");

$queryid = "select * from  `user` where email = '" . $_SESSION['user_email'] . "'";
$resultid = $conn->query($queryid);
$user_id = "";
if ($resultid->num_rows > 0) {
    $row = $resultid->fetch_assoc();
    $user_id = $row["id"];
}

$id = $_POST['id'];

$query2 = "UPDATE `friends` SET `status`=1 WHERE user_id1 = ". $id ." and user_id2 = ". $user_id ."";

$result2 = mysqli_query($conn,$query2);
if($result2) {

    echo 'request approved successfully';
}
else {
    echo "Failed to update";
}