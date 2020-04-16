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


$name = $_POST['name'];
$desc = $_POST['desc'];

$query2 = "INSERT INTO `group`( `name`, `description`) VALUES('$name', '$desc')";

$result2 = mysqli_query($conn,$query2);
if($result2) {
    $_SESSION['group_added'] = "The ".$name." added successfully";

    header('Location: ../groups.php');
}
else {
    echo "Failed to add group";
}
