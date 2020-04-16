<?php
session_start();
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
$age = $_POST['age'];
$email = $_POST['username'];
$pwd = $_POST['pwd'];
$user_type = $_POST['user_type'];



$query = "INSERT INTO user(`name`, `email`, `password`, `age`, `type`) VALUES('$name', '$email', '$pwd', '$age', '$user_type')";
$result = mysqli_query($conn,$query);
if($result) {
    session_start();
    $_SESSION['user_email'] = $email;
     $_SESSION['user_type'] = $user_type;
    echo "Succesfully registered";
    header('Location: ../home.php');
}
else {
    $_SESSION['Error'] = "Something went wrong !";
    header('Location: ../sign_up.php');
}

?>
